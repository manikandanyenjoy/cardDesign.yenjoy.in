@extends('adminlte::page')

@section('title', 'Raw Material')

@section('content_header')
    <div class="row mb-1">
        <div class="col-12">
            <h1 class="float-left ml-2 font-weight-bold">
              {{ __('INK Master') }}
            </h1>
            <div class="float-right">
                <a href="{{ route('ink.create') }}" class="btn bg-gradient-primary btn-md mr-2">{{ __('Add Ink') }}</a>
            </div>
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
                        <h3 class="card-title">List of Inks </h3>
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
                                <th style="width: 50px">#</th>
                                <th>Color</th>
                                <th>Shade No</th>
                                <th>Make</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = ($inks->currentpage()-1)* $inks->perpage() + 1; @endphp
                                @forelse ($inks as $ink)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td style="background-color: {{ $ink->color }};"></td>
                                        <td>{{ $ink->shade_no }}</td>
                                        <td>{{ $ink->make }}</td>
                                        <td>
                                            <a href="{{ route('ink.show',$ink->id) }}" class="btn btn-sm btn-warning">View</a>
                                            @if(!$ink->deleted_at)
                                            <a href="{{ route('ink.edit',$ink->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form method="POST" action="{{ route('ink.destroy', $ink->id) }}"
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
                            {!! $inks->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
