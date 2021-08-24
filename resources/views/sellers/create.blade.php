@extends('adminlte::page')
@if($editVendor)
@section('title', 'Edit Vendor')
@else
@section('title', 'Create New Vendor')
@endif

@section('content_header')
    <div class="row mb-1">
        <div class="offset-md-1 col-md-10">
            <h1 class="float-left ml-2 font-weight-bold">
                @if($editVendor)
                {{ __('Vendor - ') . ucfirst($editVendor->first_name)}}
                @else
                {{ __('Vendors') }}
                @endif
            </h1>
            <div class="float-right">
                @if($editVendor)
                    <a href="{{ route('sellers.show',$editVendor->id) }}" class="btn bg-gradient-success btn-md mr-2">{{ __('View') }}</a>
                @endif
                <a href="{{ route('sellers.index') }}" class="btn bg-gradient-danger btn-md mr-2">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    @include('shared.errors')
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">{{ __('Create Vendor') }}</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ $editVendor ? route('sellers.update', $editVendor->id) : route('sellers.store')  }}" novalidate>
                                @csrf
                                @if($editVendor) @method('PUT') @endif
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <h5 class="mb-3 font-weight-bold">{{ _('Vendor Details') }}</h5>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="first_name">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $editVendor ? old('first_name',$editVendor->first_name) : old('first_name') }}" placeholder="First Name">
                                                @error('first_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $editVendor ? old('last_name',$editVendor->last_name) : old('last_name') }}" placeholder="Last Name">
                                                @error('last_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $editVendor ? old('email',$editVendor->email) : old('email') }}" placeholder="Email">
                                                @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="mobile_number">Phone <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number" value="{{ $editVendor ? old('mobile_number',$editVendor->mobile_number) : old('mobile_number') }}" placeholder="Phone Number">
                                                @error('mobile_number')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="password">Password @if(!$editVendor)<span class="text-danger">*</span>@endif</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                                @error('password')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                                @error('password_confirmation')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                          

                                            <div class="form-group col-6">
                                                <label for="status">Status</label>
                                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                    @if($editVendor)
                                                        <option value='1' {{ old('status') == '1' ? 'selected' : ($editVendor->status == '1' ? 'selected' : '') }}>Active </option>
                                                        <option value='0' {{ old('status') == '0' ? 'selected' : ($editVendor->status == '0' ? 'selected' : '') }}>InActive </option>
                                                    @else
                                                        <option value='1' {{ old('status') == "1" ? 'selected' : '' }}>Active </option>
                                                        <option value='0' {{ old('status') == "0" ? 'selected' : '' }}>InActive </option>
                                                    @endif
                                                </select>
                                                @error('status')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr/>
                                     

                                        <div class="row mt-3 ">
                                            <div class="form-group col-12">
                                                <label for="billing_address">Billing Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control @error('billing_address') is-invalid @enderror" id="billing_address" name="billing_address">{{ $editVendor ? old('billing_address',$editVendor->billing_address) : old('billing_address') }}</textarea>
                                                @error('billing_address')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12 mt-3">
                                                <div class="form-check">
                                                    <label class="form-check-label font-weight-bold">
                                                        @if($editVendor)
                                                        @php 
                                                            $sameAsBilling = (strcmp($editVendor->billing_address, $editVendor->shipping_address) == 0) ? 1 : 0;
                                                        @endphp
                                                            <input class="form-check-input" type="checkbox" class="form-control @error('same_as') is-invalid @enderror" id="same_as" name="same_as" value=1 {{ old('same_as') == 1 ? 'checked' : ($sameAsBilling == 1 ? 'checked' : '') }}/>
                                                        @else
                                                            <input class="form-check-input" type="checkbox" class="form-control @error('same_as') is-invalid @enderror" id="same_as" name="same_as" value=1 {{ old('same_as') == 1 ? 'checked' : '' }}/>
                                                        @endif
                                                        Same as Billing Address <span class="font-italic">(optional)</span>
                                                    </label>
                                                </div>
                                                @error('same_as')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-12 mt-3">
                                                <label for="shipping_address">Shipping Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control @error('shipping_address') is-invalid @enderror" id="shipping_address" name="shipping_address">{{ $editVendor ? old('shipping_address',$editVendor->shipping_address) : old('shipping_address') }}</textarea>
                                                
                                                @error('shipping_address')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="row">
                                            <h5 class="mt-2 col-12 font-weight-bold">{{ _('Other Details') }}</h5>
                                            <div class="form-group col-6 mt-3">
                                                <label for="bank_name">Bank Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" value="{{ $editVendor ? old('bank_name',$editVendor->bank_name) : old('bank_name') }}" placeholder="Bank Name">
                                                @error('bank_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-6 mt-3">
                                                <label for="account_no">Account Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('account_no') is-invalid @enderror" id="account_no" name="account_no" value="{{ $editVendor ? old('account_no',$editVendor->account_no) : old('account_no') }}" placeholder="Account Number">
                                                @error('account_no')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="IFSCCode">IFSC Code <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('IFSCCode') is-invalid @enderror" id="IFSCCode" name="IFSCCode" value="{{ $editVendor ? old('IFSCCode',$editVendor->IFSCCode) : old('IFSCCode') }}" placeholder="IFSC Code">
                                                @error('IFSCCode')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="opening_balance">Opening Balance <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('opening_balance') is-invalid @enderror" id="opening_balance" name="opening_balance" value="{{ $editVendor ? old('opening_balance',$editVendor->opening_balance) : old('opening_balance') }}" placeholder="Opening Balance">
                                                @error('opening_balance')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="credit_period">Credit Period <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('credit_period') is-invalid @enderror" id="credit_period" name="credit_period" value="{{ $editVendor ? old('credit_period',$editVendor->credit_period) : old('credit_period') }}" placeholder="Credit Period">
                                                @error('credit_period')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="grade">Grade <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ $editVendor ? old('grade',$editVendor->grade) : old('grade') }}" placeholder="Grade">
                                                @error('grade')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="gst_no">GST No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('GST') is-invalid @enderror" id="gst_no" name="GST" value="{{ $editVendor ? old('graGSTde',$editVendor->GST) : old('GST') }}" placeholder="GST">
                                                @error('GST')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12">
                                                <button type="submit" class="btn btn-primary btn-lg col-2 float-right">{{ $editVendor ? 'Update' : 'Save'}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $("#same_as").on("change", function(){
                let billingAddress      = $("#billing_address");
                let shippingAddress     = $("#shipping_address");
                var billingAddressValue = billingAddress.val();
                if(this.checked)
                {
                    $(this).prop('checked',true);
                    billingAddress.val()
                    if(billingAddressValue != "")
                    {
                        shippingAddress.val(billingAddressValue);
                    }
                    else
                    {
                        alert("Sorry Billing address field is empty");
                        billingAddress.focus();
                        $(this).prop('checked', false);
                    }
                }
                else
                {
                    shippingAddress.val("");
                }
            });
        });
    </script>
@stop
