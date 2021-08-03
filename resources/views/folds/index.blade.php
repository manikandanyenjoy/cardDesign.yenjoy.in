@extends('adminlte::page')

@section('title', 'folds')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('folds') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('folds.create') }}" class="btn bg-gradient-primary float-right">Add folds</a>
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
                        <h3 class="card-title">folds</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Type of Fold</th>
                                <th>Image</th>
                                <th>Minimum mm</th>
                                <th>Notes</th>
                                
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($folds as $index => $fold)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $fold->type_of_fold }}</td>
                                    <td><img src="http://127.0.0.1:8000/storage/app/folds/{{ $fold->image }}" alt="image" width="500" height="600"></td>
                                    <td>{{ $fold->minimum_mm }}</td>
                                    <td>{{ $fold->notes }}</td>
                                    
                                    <td>
                                        <a href="{{ route('folds.show',$fold->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$fold->deleted_at)
                                        <a href="{{ route('folds.edit',$fold->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('folds.destroy', $fold->id) }}"
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
                            {!! $folds->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
