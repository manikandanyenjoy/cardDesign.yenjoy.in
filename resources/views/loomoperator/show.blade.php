@extends('adminlte::page')

@section('title', 'Loom Operator')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Loom Operator - ') . $loomoperator->name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('loomoperators.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">Loom Operator</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('First Name') }}</strong></td>
                                        <td>{{ $loomoperator->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Email') }}</strong></td>
                                        <td>{{ $loomoperator->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Phone') }}</strong></td>
                                        <td>{{ $loomoperator->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Qualification') }}</strong></td>
                                        <td>{{ $loomoperator->qualification }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Blood Group') }}</strong></td>
                                        <td>{{ $loomoperator->blood_group }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Joined On') }}</strong></td>
                                        <td>{{date("d-m-Y", strtotime($loomoperator->created_at) )  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Left On') }}</strong></td>
                                        <td>@if($loomoperator->deleted_at){{ date("d-m-Y", strtotime($loomoperator->deleted_at) ) }}@endif</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Address') }}</strong></td>
                                        <td>{{ $address->flatno }},{{ $address->apartment }},{{ $address->landmark }},{{ $address->area }},{{ $address->city }},{{ $address->state }},{{ $address->country }}-{{ $address->zipcode }}</td>
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
