@extends('adminlte::page')

@section('title', 'fold')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('fold - ') . $fold->fold_name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('folds.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">fold</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('Type of Fold') }}</strong></td>
                                        <td>{{ $fold->type_of_fold }}</td>

                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Image') }}</strong></td>
                                        <td><img src="http://127.0.0.1:8000/storage/app/folds/{{ $fold->image }}" alt="image" width="500" height="600"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Minimum mm	') }}</strong></td>
                                        <td>{{ $fold->minimum_mm }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Notes') }}</strong></td>
                                        
                                        <td>{{ $fold->notes }}</td>
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
