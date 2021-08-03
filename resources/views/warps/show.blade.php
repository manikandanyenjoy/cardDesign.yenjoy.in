@extends('adminlte::page')

@section('title', 'warp')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('warp - ') . $warp->colour}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('warps.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">warp</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                <tr>
                                        <td><strong>{{ __('Name') }}</strong></td>
                                        <td>{{ $warp->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Colour') }}</strong></td>
                                        <td style="background-color: {{ $warp->colour }};"></td>
                                        
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
