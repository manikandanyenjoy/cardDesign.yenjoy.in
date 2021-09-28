@extends('adminlte::page')

@section('title', 'yarn')

@section('content_header')
    <!-- <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('yarn - ') . $ink->yarn_name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('yarns.index') }}" class="btn bg-gradient-primary float-right">Back</a>
        </div>
    </div> -->
    <div class="row mb-1">
        <div class="offset-md-3 col-md-6">
            <h1 class="float-left ml-2 font-weight-bold">
               {{ __('INK')}}
            </h1>
            <div class="float-right">
                <a href="{{ route('ink.edit',$ink->id) }}" class="btn bg-gradient-success btn-md mr-2">{{ __('View') }}</a>
                <a href="{{ route('ink.index') }}" class="btn bg-gradient-danger btn-md mr-2">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ink</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    
                                    <tr>
                                        <td><strong>{{ __(' Color') }}</strong></td>
                                        
                                        <td>{{ $ink->color }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Shade No') }}</strong></td>
                                        <td>{{ $ink->shade_no }}</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td><strong>{{ __('Make') }}</strong></td>
                                        <td>{{ $ink->make }}</td>
                                    </tr>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
