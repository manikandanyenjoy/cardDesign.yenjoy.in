@extends('adminlte::page')

@section('title', 'wovenquality')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('wovenquality ')}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('wovenqualitys.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">wovenquality</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('Quality') }}</strong></td>
                                        <td>{{ $wovenquality->quality }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Material') }}</strong></td>
                                        <td>{{ $wovenquality->material }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Notes') }}</strong></td>
                                        <td>{{ $wovenquality->notes }}</td>
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
