@extends('adminlte::page')

@section('title', 'Design Card')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Design Card') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('woven.create') }}" class="btn bg-gradient-primary float-right">Add Design Card</a>
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
                        <h3 class="card-title">Design Card</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>name</th>
                                
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($wovens as $index => $woven)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $woven->name }}</td>
                                    
                                    <td>
                                        <a href="{{ route('woven.show',$woven->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$woven->deleted_at)
                                        <a href="{{ route('woven.edit',$woven->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('woven.destroy', $woven->id) }}"
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
                            {!! $wovens->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
