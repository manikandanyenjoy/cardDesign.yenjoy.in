@extends('adminlte::page')

@section('title', 'Vendors')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Vendors') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('sellers.index') }}" class="btn bg-gradient-primary float-right">{{ __('Back') }}</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">

                @include('shared.errors')

                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Create Vendor') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                    @error('first_name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                    @error('last_name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="mobile_number">Phone</label>
                                    <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Phone Number">
                                    @error('mobile_number')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="password">Password</label>
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
                                <h5 class="mt-4 mb-2 col-12">{{ _('Other Details') }}</h5>
                                <div class="form-group col-12">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" placeholder="Bank Name">
                                    @error('bank_name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="account_no">Account Number</label>
                                    <input type="text" class="form-control @error('account_no') is-invalid @enderror" id="account_no" name="account_no" value="{{ old('account_no') }}" placeholder="Account Number">
                                    @error('account_no')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="IFSCCode">IFSC Code</label>
                                    <input type="text" class="form-control @error('IFSCCode') is-invalid @enderror" id="IFSCCode" name="IFSCCode" value="{{ old('IFSCCode') }}" placeholder="IFSC Code">
                                    @error('IFSCCode')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="opening_balance">Opening Balance</label>
                                    <input type="text" class="form-control @error('opening_balance') is-invalid @enderror" id="opening_balance" name="opening_balance" value="{{ old('opening_balance') }}" placeholder="Opening Balance">
                                    @error('opening_balance')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="credit_period">Credit Period</label>
                                    <input type="text" class="form-control @error('credit_period') is-invalid @enderror" id="credit_period" name="credit_period" value="{{ old('credit_period') }}" placeholder="Credit Period">
                                    @error('credit_period')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="grade">Grade</label>
                                    <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ old('grade') }}" placeholder="Grade">
                                    @error('grade')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <h5 class="mt-4 mb-2 col-12">{{ _('Shipping Address') }}</h5>
                                <div class="form-group col-6">
                                    <label for="flatno">flat No</label>
                                    <input type="text" class="form-control @error('flatno') is-invalid @enderror" id="flatno" value="{{old('flatno')}}" name="flatno" placeholder="Flatno">
                                    @error('flatno')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="apartment">Apartment</label>
                                    <input type="text" class="form-control @error('apartment') is-invalid @enderror" id="apartment" value="{{old('apartment')}}" name="apartment" placeholder="Apartment">
                                    @error('apartment')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="landmark">Landmark</label>
                                    <input type="text" class="form-control @error('landmark') is-invalid @enderror" id="landmark" value="{{old('landmark')}}" name="landmark" placeholder="Landmark">
                                    @error('landmark')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="area">Area</label>
                                    <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" value="{{old('area')}}" name="area" placeholder="Area">
                                    @error('area')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" value="{{old('city')}}" name="city" placeholder="City">
                                    @error('city')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" value="{{old('state')}}" name="state" placeholder="State">
                                    @error('state')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" value="{{old('country')}}" name="country" placeholder="Country">
                                    @error('country')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="zipcode">Zipcode</label>
                                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" value="{{old('zipcode')}}" name="zipcode" placeholder="zipcode">
                                    @error('zipcode')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <h5 class="mt-4 mb-2 col-12">{{ _('Billing Address') }}</h5>
                                <div class="form-group col-6">
                                    <label for="billing_flatno">flat No</label>
                                    <input type="text" class="form-control @error('billing_flatno') is-invalid @enderror" id="billing_flatno" value="{{old('billing_flatno')}}" name="billing_flatno" placeholder="Flatno">
                                    @error('billing_flatno')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="billing_apartment">Apartment</label>
                                    <input type="text" class="form-control @error('billing_apartment') is-invalid @enderror" id="billing_apartment" value="{{old('billing_apartment')}}" name="billing_apartment" placeholder="Apartment">
                                    @error('billing_apartment')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="billing_landmark">Landmark</label>
                                    <input type="text" class="form-control @error('billing_landmark') is-invalid @enderror" id="billing_landmark" value="{{old('billing_landmark')}}" name="billing_landmark" placeholder="Landmark">
                                    @error('billing_landmark')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="billing_area">Area</label>
                                    <input type="text" class="form-control @error('billing_area') is-invalid @enderror" id="billing_area" value="{{old('billing_area')}}" name="billing_area" placeholder="Area">
                                    @error('billing_area')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="billing_city">City</label>
                                    <input type="text" class="form-control @error('billing_city') is-invalid @enderror" id="billing_city" value="{{old('billing_city')}}" name="billing_city" placeholder="City">
                                    @error('billing_city')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="billing_state">State</label>
                                    <input type="text" class="form-control @error('billing_state') is-invalid @enderror" id="billing_state" value="{{old('billing_state')}}" name="billing_state" placeholder="State">
                                    @error('billing_state')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="billing_country">Country</label>
                                    <input type="text" class="form-control @error('billing_country') is-invalid @enderror" id="billing_country" value="{{old('billing_country')}}" name="billing_country" placeholder="Country">
                                    @error('billing_country')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="billing_zipcode">Zipcode</label>
                                    <input type="text" class="form-control @error('billing_zipcode') is-invalid @enderror" id="billing_zipcode" value="{{old('billing_zipcode')}}" name="billing_zipcode" placeholder="zipcode">
                                    @error('billing_zipcode')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#select2-dropdown').select2();
        });
    </script>
@stop
