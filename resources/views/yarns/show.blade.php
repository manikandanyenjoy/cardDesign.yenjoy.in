@extends('adminlte::page')

@section('title', 'yarn')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('yarn - ') . $yarn->yarn_name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('yarns.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">yarn</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('supplier Name') }}</strong></td>
                                        <td>{{ $yarn->supplier }}</td>

                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Yarn Denier') }}</strong></td>
                                        <td>{{ $yarn->yarn_denier }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Shade No') }}</strong></td>
                                        <td>{{ $yarn->shade_No }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Yarn Color') }}</strong></td>
                                        
                                        <td>{{ $yarn->yarn_color }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Color Shade') }}</strong></td>
                                        <td style="background-color: {{ $yarn->color_shade }};"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Notes') }}</strong></td>
                                        <td>{{ $yarn->notes }}</td>
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
