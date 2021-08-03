@extends('adminlte::page')

@section('title', 'loom')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('loom - ') . $loom->loom_name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('looms.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">loom</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('Loom Name') }}</strong></td>
                                        <td>{{ $loom->loom_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Weaving') }}</strong></td>
                                        <td>{{ $loom->weaving_width_Meter }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Sections') }}</strong></td>
                                        <td>{{ $loom->sections }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Speed') }}</strong></td>
                                        
                                    <td>{{ $loom->speed }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Year') }}</strong></td>
                                        <td>{{ $loom->year }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Notes') }}</strong></td>
                                        <td>{{ $loom->notes }}</td>
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
