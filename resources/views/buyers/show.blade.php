@extends('adminlte::page')

@section('title', 'Customer Detail')

@section('content_header')
    <div class="row mb-1">
        <div class="offset-md-1 col-md-10">
            <h1 class="float-left ml-2 font-weight-bold">
                {{ __('Customer - ') . ucfirst($buyer->full_name)}}
            </h1>
            <div class="float-right">
                <a href="{{ route('buyers.edit',$buyer->id) }}" class="btn bg-gradient-success btn-md mr-2">{{ __('Edit') }}</a>
                <a href="{{ route('buyers.index') }}" class="btn bg-gradient-danger btn-md mr-2">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Customer Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ __('Company Name') }}</strong></td>
                                        <td>{{ ucwords($buyer->company_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Company Phone Number') }}</strong></td>
                                        <td>{{ $buyer->company_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Full Name') }}</strong></td>
                                        <td>{{ ucwords($buyer->full_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Category') }}</strong></td>
                                        <td>{{ $buyer->categoryMasterDetail ? ucwords($buyer->categoryMasterDetail->category_name) : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{ __('Primary Email') }}</strong></td>
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
                                        <td>{{ $salesrep ? $salesrep->name : '-' }}</td>
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
                                        <td><strong>{{ __('GST NO') }}</strong></td>
                                        <td>{{ $buyer->GST }}</td>
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
