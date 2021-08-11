@extends('adminlte::page')

@section('title', 'Sales Rep')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Sales Rep - ') . $salesrep->name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('salesreps.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">salesrep</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('First Name') }}</strong></td>
                                        <td>{{ $salesrep->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Email') }}</strong></td>
                                        <td>{{ $salesrep->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Phone') }}</strong></td>
                                        <td>{{ $salesrep->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Qualification') }}</strong></td>
                                        <td>{{ $salesrep->qualification }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Blood Group') }}</strong></td>
                                        <td>{{ $salesrep->blood_group }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Joined On') }}</strong></td>
                                        <td>{{ $salesrep->joined_on }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Left On') }}</strong></td>
                                        <td>{{ $salesrep->left_on }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Document Number') }}</strong></td>
                                        <td>{{ $salesrep->documentID }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Document') }}</strong></td>
                                        <td><a target="_blank" href="{{env('APP_URL')}}/storage/staffs_document/{{ $salesrep->document_name }}">View Document</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Left On') }}</strong></td>
                                        <td>{{ $salesrep->left_on }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Address') }}</strong></td>
                                        <td>{{ $salesrep->address }}</td>
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
