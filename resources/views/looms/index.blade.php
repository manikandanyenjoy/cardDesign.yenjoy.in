@extends('adminlte::page')

@section('title', 'looms')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('looms') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('looms.create') }}" class="btn bg-gradient-primary float-right">Add looms</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @foreach (['danger', 'warning', 'success', 'info'] as $message)
                    @if(Session::has($message))
                        <div class="alert alert-{{ $message }}">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session($message) }}
                        </div>
                    @endif
                @endforeach
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">looms</h3>
                      <form class="float-right">
                          <input class="" type="text" name="search" >
                          <button class="btn btn-sm btn-info" type="submit">
                            search
                          </button>
                      </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">S.No</th>
                                <th>Loom Name</th>
                                <th>Weaving</th>
                                <th>Sections</th>
                                <th>Speed</th>
                                <th>Year</th>
                                <th>Notes</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = ($looms->currentpage()-1)* $looms->perpage() + 1; @endphp
                                @forelse ($looms as $loom)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $loom->loom_name }}</td>
                                        <td>{{ $loom->weaving_width_Meter }}</td>
                                        <td>{{ $loom->sections }}</td>
                                        <td>{{ $loom->speed }}</td>
                                        <td>{{ $loom->year }}</td>
                                        <td>{{ $loom->notes }}</td>
                                        <td>
                                            <a href="{{ route('looms.show',$loom->id) }}" class="btn btn-sm btn-warning">View</a>
                                            @if(!$loom->deleted_at)
                                            <a href="{{ route('looms.edit',$loom->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form method="POST" action="{{ route('looms.destroy', $loom->id) }}"
                                                accept-charset="UTF-8"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Are you sure do you want to delete?');">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="8" class="text-center">No Data Found...</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {!! $looms->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
