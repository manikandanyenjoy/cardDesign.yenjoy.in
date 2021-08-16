@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Customer - ') . $buyer->first_name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('buyers.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">buyers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                <tr>
                                        <td><strong>{{ __('Company Name') }}</strong></td>
                                        <td>{{ $buyer->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Company Phone Number') }}</strong></td>
                                        <td>{{ $buyer->company_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('First Name') }}</strong></td>
                                        <td>{{ $buyer->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Last Name') }}</strong></td>
                                        <td>{{ $buyer->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Email') }}</strong></td>
                                        <td>{{ $buyer->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Secondary Email') }}</strong></td>
                                        <td><?php $s_email= explode(",",$buyer->secondary_email);
                                        foreach($s_email as $email){
                                         echo $email."<br>";
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Sales Rep') }}</strong></td>
                                        <td>{{ $salesrep->name }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>{{ __('Phone') }}</strong></td>
                                        <td>{{ $buyer->mobile_number }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Bank Name') }}</strong></td>
                                        <td>{{ $buyer->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Account Number') }}</strong></td>
                                        <td>{{ $buyer->account_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('IFSC Code') }}</strong></td>
                                        <td>{{ $buyer->IFSCCode }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Opening Balance') }}</strong></td>
                                        <td>{{ $buyer->opening_balance }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Credit Period') }}</strong></td>
                                        <td>{{ $buyer->credit_period }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Grade') }}</strong></td>
                                        <td>{{ $buyer->grade }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Billing Address') }}</strong></td>
                                        <td>{{ $buyer->billing_address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Shipping Address') }}</strong></td>
                                        <td>{{ $buyer->shipping_address }}</td>
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
