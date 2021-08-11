@extends('adminlte::page')

@section('title', 'Seller')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Seller - ') . $seller->first_name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('sellers.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">Sellers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table class="table table-bordered table-sm">
                                <tbody>
                                
                                    <tr>
                                        <td><strong>{{ __('First Name') }}</strong></td>
                                        <td>{{ $seller->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Last Name') }}</strong></td>
                                        <td>{{ $seller->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Email') }}</strong></td>
                                        <td>{{ $seller->email }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td><strong>{{ __('Phone') }}</strong></td>
                                        <td>{{ $seller->mobile_number }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Bank Name') }}</strong></td>
                                        <td>{{ $seller->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Account Number') }}</strong></td>
                                        <td>{{ $seller->account_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('IFSC Code') }}</strong></td>
                                        <td>{{ $seller->IFSCCode }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Opening Balance') }}</strong></td>
                                        <td>{{ $seller->opening_balance }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Credit Period') }}</strong></td>
                                        <td>{{ $seller->credit_period }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Grade') }}</strong></td>
                                        <td>{{ $seller->grade }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Billing Address') }}</strong></td>
                                        <td>{{ $seller->billing_address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Shipping Address') }}</strong></td>
                                        <td>{{ $seller->shipping_address }}</td>
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
