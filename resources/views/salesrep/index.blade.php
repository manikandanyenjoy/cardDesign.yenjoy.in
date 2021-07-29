@extends('adminlte::page')

@section('title', 'Sales Reps')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Sales Reps') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('salesreps.create') }}" class="btn bg-gradient-primary float-right">Add Sales Rep</a>
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
                        <h3 class="card-title">Sales Reps</h3>
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
                            @foreach ($salesreps as $index => $salesrep)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $salesrep->name }}</td>
                                    <td>{{ $salesrep->email }}</td>
                                    <td>{{ $salesrep->phone }}</td>
                                    <td>{{date("d-m-Y", strtotime($salesrep->created_at) )  }}</td>
                                    <td>@if($salesrep->deleted_at){{ date("d-m-Y", strtotime($salesrep->deleted_at) ) }}@endif</td>
                                    <td>
                                        <a href="{{ route('salesreps.show',$salesrep->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$salesrep->deleted_at)
                                        <a href="{{ route('salesreps.edit',$salesrep->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('salesreps.destroy', $salesrep->id) }}"
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
                            {!! $salesreps->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
