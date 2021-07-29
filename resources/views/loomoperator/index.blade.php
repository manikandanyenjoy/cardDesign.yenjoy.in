@extends('adminlte::page')

@section('title', 'Loom Operators')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Loom Operators') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('loomoperators.create') }}" class="btn bg-gradient-primary float-right">Add Loom Operators</a>
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
                        <h3 class="card-title">Loom Operators</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Joined On</th>
                                <th>Left On</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($loomoperators as $index => $loomoperator)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $loomoperator->name }}</td>
                                    <td>{{ $loomoperator->email }}</td>
                                    <td>{{ $loomoperator->phone }}</td>
                                    <td>{{date("d-m-Y", strtotime($loomoperator->created_at) )  }}</td>
                                    <td>@if($loomoperator->deleted_at){{ date("d-m-Y", strtotime($loomoperator->deleted_at) ) }}@endif</td>
                                    <td>
                                        <a href="{{ route('loomoperators.show',$loomoperator->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$loomoperator->deleted_at)
                                        <a href="{{ route('loomoperators.edit',$loomoperator->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('loomoperators.destroy', $loomoperator->id) }}"
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {!! $loomoperators->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
