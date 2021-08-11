@extends('adminlte::page')

@section('title', 'yarns')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('yarns') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('yarns.create') }}" class="btn bg-gradient-primary float-right">Add yarns</a>
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
                        <h3 class="card-title">yarns</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>supplier Name</th>
                                <th>Yarn Denier</th>
                                <th>Shade No</th>
                                <th>Yarn Color</th>
                                <th>Color Shade</th>
                                <th>Notes</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($yarns as $index => $yarn)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $yarn->supplier }}</td>
                                    <td>{{ $yarn->yarn_denier }}</td>
                                    <td>{{ $yarn->shade_No }}{{ $yarn->shade_No_suffix }}</td>
                                    <td>{{ $yarn->yarn_color }}</td>
                                    <td style="background-color: {{ $yarn->yarn_color }};"></td>
                                    <td>{{ $yarn->notes }}</td>
                                    <td>
                                        <a href="{{ route('yarns.show',$yarn->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$yarn->deleted_at)
                                        <a href="{{ route('yarns.edit',$yarn->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('yarns.destroy', $yarn->id) }}"
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
                            {!! $yarns->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
