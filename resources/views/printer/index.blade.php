@extends('adminlte::page')

@section('title', 'Printers')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Printers') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('printers.create') }}" class="btn bg-gradient-primary float-right">Add Printers</a>
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
                        <h3 class="card-title">Printers</h3>
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
                            @foreach ($printers as $index => $printer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $printer->name }}</td>
                                    <td>{{ $printer->email }}</td>
                                    <td>{{ $printer->phone }}</td>
                                    <td>{{date("d-m-Y", strtotime($printer->created_at) )  }}</td>
                                    <td>@if($printer->deleted_at){{ date("d-m-Y", strtotime($printer->deleted_at) ) }}@endif</td>
                                    <td>
                                        <a href="{{ route('printers.show',$printer->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$printer->deleted_at)
                                        <a href="{{ route('printers.edit',$printer->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('printers.destroy', $printer->id) }}"
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
                            {!! $printers->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
