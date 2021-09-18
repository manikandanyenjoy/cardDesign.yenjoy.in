@extends('adminlte::page')

@section('title', 'finishingmachine')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('finishingmachine - ') . $finishingmachine->machine}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('finishingmachines.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">finishingmachine</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('Machine Name') }}</strong></td>
                                        <td>{{ $finishingmachine->machine }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Folds Available') }}</strong></td>
                                        <td>{{ $finishingmachine->folds_available }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Min End Fold') }}</strong></td>
                                        <td>{{ $finishingmachine->min_end_fold }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Max Length mm') }}</strong></td>
                                        <td>{{ $finishingmachine->max_length_mm }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Speed') }}</strong></td>
                                        
                                    <td>{{ $finishingmachine->speed }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Year') }}</strong></td>
                                        <td>{{ $finishingmachine->year }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Serial Nos') }}</strong></td>
                                        <td>{{ $finishingmachine->serial_Nos }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Notes') }}</strong></td>
                                        <td>{{ $finishingmachine->notes }}</td>
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
