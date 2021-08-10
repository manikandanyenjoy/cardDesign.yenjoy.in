@extends('adminlte::page')

@section('title', 'Create Woven Design Card')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Create Woven Design Card') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('woven.index') }}" class="btn bg-gradient-primary float-right">Back</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @foreach (['danger', 'warning', 'success', 'info'] as $message)
                        @if(Session::has($message))
                            <div class="alert alert-{{ $message }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session($message) }}
                            </div>
                    @endif
                @endforeach

                <!-- general form elements -->
                    <div class="card card-primary"  >
                        <div class="card-header">
                            <h3 class="card-title">Create Woven Design Card</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('woven.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="card-body row">

                               <div class="col-md-4" > 
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="Name">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{old('date')}}" placeholder="">
                                    @error('date')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="customer">Customer</label>
                                    <input type="text" class="form-control @error('customer') is-invalid @enderror" id="customer" name="customer" value="{{old('customer')}}" placeholder="customer">
                                  @error('customer')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="label">Label</label>
                                    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label" value="{{old('label')}}" placeholder="label">
                                    @error('label')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="design_no">Design No</label>
                                    <input type="text" class="form-control @error('design_no') is-invalid @enderror" id="design_no" name="design_no" value="{{old('design_no')}}" placeholder="design_no">
    @error('design_no')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="designer">Designer</label>
                                    <input type="text" class="form-control @error('designer') is-invalid @enderror" id="designer" name="designer" value="{{old('designer')}}" placeholder="designer">
    @error('designer')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="sales_rep">Sales Rep</label>
                                    <input type="text" class="form-control @error('sales_rep') is-invalid @enderror" id="sales_rep" name="sales_rep" value="{{old('sales_rep')}}" placeholder="sales_rep">
    @error('sales_rep')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="sample_weaver">Sample Weaver</label>
                                    <input type="text" class="form-control @error('sample_weaver') is-invalid @enderror" id="sample_weaver" name="sample_weaver" value="{{old('sample_weaver')}}" placeholder="sample_weaver">
    @error('sample_weaver')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="total_pick">Total Pick</label>
                                    <input type="text" class="form-control @error('total_pick') is-invalid @enderror" id="total_pick" name="total_pick" value="{{old('total_pick')}}" placeholder="total_pick">
    @error('total_pick')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="loom">Loom</label>
                                    <input type="text" class="form-control @error('loom') is-invalid @enderror" id="loom" name="loom" value="{{old('loom')}}" placeholder="loom">
    @error('loom')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="total_repeats">Total Repeats</label>
                                    <input type="text" class="form-control @error('total_repeats') is-invalid @enderror" id="total_repeats" name="total_repeats" value="{{old('total_repeats')}}" placeholder="total_repeats">
    @error('total_repeats')
                                    <span class="error invalid-feedback">{{ $message }}</span>
@enderror
                                </div>
                                
                                
                                
                               
                                
                                </div>
                                
                                
                                
                                <div class="col-md-4" > 
                                <div class="form-group">
                                    <label for="name">Customer Grade</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="Customer Grade">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Catogery</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="Catogery">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                 <div class="form-group">
                                    <label for="name">Wastage</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Finishings</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Width mm</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Length mm</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="name">Total Area Sq mm</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Sq Inch </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Cost /sq inch </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                
                                </div>
                                <div class="col-md-4" > 
                                
                                        <img width="100%" src="https://pbs.twimg.com/media/Dv69AZUX0AE_WMr.jpg" />
                                
                                </div>
                                
                            </div>
                            
                            
                            <div class="card-body row">
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Add ons </label>
                                </div>
                                <div class="form-group">
                                    <label for="name">Cost</label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Basic </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Cut fold </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Diecut </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Nonwoven </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label for="name">Iron on back </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Extras </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">TOTAL </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Offered  </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                
                            </div>
                            
                            
                            
                             <div class="card-body row">
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Needle No/Pantone </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Color  </label>
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label for="name">Color Shade </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">Denier </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">A </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">B </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">C </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">D </label>
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label for="name">E  </label>
                                </div>
                                </div>
                                
                            </div>
                            
                             <div class="card-body row">
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                
                            </div>
                            
                             <div class="card-body row">
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                
                            </div>
                             <div class="card-body row">
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="type_of_fold" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                
                            </div>
                            
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </section>
@stop
