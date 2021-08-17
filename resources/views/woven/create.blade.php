@extends('adminlte::page')

@section('title', 'Edit Woven')

<style type="text/css">
    .face{
        position: absolute;
        height: 0px;
        width: 0px;
        background-color: transparent;;
        border: 4px solid rgba(10,10,10,0.5);
    }
    .object-fit-container {
        border: 2px solid;
        padding: 10px;
    
    height: 230px; /*any size*/
    }

    .object-fit-cover {
    width: auto;
    height: 100%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    object-fit: cover; /*magic*/
    }
</style>

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="pl-2">{{ $editdesignCard ? "Edit Woven - ".$editdesignCard->label : "Create Woven" }}</h1>
        </div>

        <div class="col-sm-6 pr-4 d-flex justify-content-end">
            @if($editdesignCard)
                <a href="{{ route('woven.edit',$editdesignCard->id) }}" class="btn col-2 bg-gradient-primary mr-3">Edit</a>
            @endif
            <a href="{{ route('woven.index') }}" class="btn col-2 bg-gradient-danger">Back</a>
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

                    <!-- /.card -->
                    <div class="card card-primary" >
                        <!-- card-header -->
                        <div class="card-header">
                            <h3 class="card-title">{{$editdesignCard ? 'Edit' : 'Create'}} Design Card</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ $editdesignCard ? route('woven.update', $editdesignCard->id) : route('woven.store')  }}" novalidate>
                            @csrf
                            @if($editdesignCard) @method('PUT') @endif
                            <div class="card-body row"  style=" overflow: scroll;margin: 15px;" >
                                <div class="table_forms">
                                    <div class="table_wrp table-responsive">
                                        <table style="width: 1000px; margin: auto;" class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="padding:0;">
                                                        <table width="100%">
                                                            <tr>
                                                                <th width="150px">Customer <span>*</span></th>
                                                                <td width="300px">
                                                                    <select class="form-control col-6 @error('customer_id') is-invalid @enderror" id="customer" name="customer_id">
                                                                        <option value="">Please Select Customer</option>
                                                                        @foreach( $data['customerMaster'] as $customer) 
                                                                            @if($editdesignCard)
                                                                                <option value="{{$customer['id']}}" {{ old('customer_id') == $customer['id'] ? 'selected' : ($customer['id'] == $editdesignCard->customer_id ? 'selected' : '') }}>{{ucfirst($customer['first_name'])}} </option>
                                                                            @else
                                                                                <option value="{{$customer['id']}}" {{ old('customer_id') == $customer['id'] ? 'selected' : '' }}>{{ucfirst($customer['first_name'])}} </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @error('customer_id')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </td>
                                                               
                                                                <th width="150px">Label <span>*</span></th>
                                                                <td width="300px">
                                                                    <input type="text" class="form-control col-6 @error('label') is-invalid @enderror" id="label" name="label" value="{{ $editdesignCard ? old('label',$editdesignCard->label) : old('label') }}" placeholder="label">
                                                                    @error('label')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </td>
                                                              
                                                                <th width="150px" >Date <span>*</span></th>
                                                                <td width="150px" >
                                                                    <input type="date" class="form-control col-9 @error('date') is-invalid @enderror" id="date" name="date" value="{{ $editdesignCard ? old('date',$editdesignCard->date) : old('date') }}" placeholder="">
                                                                    @error('date')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th width="150px">Designer <span>*</span></th>
                                                                <td>
                                                                    <select class="form-control col-9 @error('designer_id') is-invalid @enderror" id="designer" name="designer_id">
                                                                        <option value="">Please Select Designer</option>
                                                                        @foreach( $data['designerMaster'] as $designer) 
                                                                            @if($editdesignCard)
                                                                                <option value="{{$designer['id']}}" {{ old('designer_id') == $designer['id'] ? 'selected' : ($designer['id'] == $editdesignCard->designer_id ? 'selected' : '') }}>{{ucfirst($designer['name'])}} </option>
                                                                            @else
                                                                                <option value="{{$designer['id']}}" {{ old('designer_id') == $designer['id'] ? 'selected' : '' }}>{{ucfirst($designer['name'])}} </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @error('designer_id')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </td>

                                                                <th width="150px">Sales Rep <span>*</span></th>
                                                                <td>
                                                                    <select class="form-control col-5 @error('salesrep_id') is-invalid @enderror" id="sales_rep" name="salesrep_id">
                                                                        <option value="">Please Select Sales Rep</option>
                                                                        @foreach( $data['salesrepMaster'] as $salesrep) 
                                                                            @if($editdesignCard)
                                                                                <option value="{{$salesrep['id']}}" {{ old('salesrep_id') == $salesrep['id'] ? 'selected' : ($salesrep['id'] == $editdesignCard->salesrep_id ? 'selected' : '') }}>{{ucfirst($salesrep['name'])}} </option>
                                                                                @else
                                                                                <option value="{{$salesrep['id']}}" {{ old('salesrep_id') == $salesrep['id'] ? 'selected' : '' }}>{{ucfirst($salesrep['name'])}} </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @error('salesrep_id')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </td> 
                                                                
                                                                  <th width="150px">Weaver <span>*</span></th>
                                                                <td>
                                                                    <div class="form-group row">

                                                                        <select class="form-control col-5 @error('weaver_id') is-invalid @enderror" id="sample_weaver" name="weaver[]">
                                                                            <option value="">Please Weaver</option>
                                                                            @foreach( $data['designerMaster'] as $designer) 
                                                                                @if($editdesignCard)
                                                                                    <option value="{{$designer['id']}}" {{ in_array($designer['id'], $editdesignCard->weaver_id) ? 'selected' : '' }}>{{$designer['name']}} </option>
                                                                                    @else
                                                                                    <option value="{{$designer['id']}}">{{$designer['name']}} </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @error('weaver')
                                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror

                                                                        <select class="form-control col-5 @error('weaver_id') is-invalid @enderror" id="sample_weaver" name="weaver[]">
                                                                            <option value="">Please Weaver</option>
                                                                            @foreach( $data['designerMaster'] as $designer) 
                                                                                @if($editdesignCard)
                                                                                    <option value="{{$designer['id']}}" {{ in_array($designer['id'], $editdesignCard->weaver_id) ? 'selected' : '' }}>{{$designer['name']}} </option>
                                                                                    @else
                                                                                    <option value="{{$designer['id']}}">{{$designer['name']}} </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @error('weaver')
                                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                        <select class="form-control col-5 @error('weaver_id') is-invalid @enderror" id="sample_weaver" name="weaver[]">
                                                                            <option value="">Please Weaver</option>
                                                                            @foreach( $data['designerMaster'] as $designer) 
                                                                                @if($editdesignCard)
                                                                                    <option value="{{$designer['id']}}" {{ in_array($designer['id'], $editdesignCard->weaver_id) ? 'selected' : '' }}>{{$designer['name']}} </option>
                                                                                    @else
                                                                                    <option value="{{$designer['id']}}">{{$designer['name']}} </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @error('weaver')
                                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </td>
                                                               
                                                              
                                                            </tr>
                                                            <tr>
                                                                <th>Warp</th>
                                                                <td><input type="text" class="form-control"></td>
                                                                <th>Finishing</th>
                                                                <td><input type="text" class="form-control"></td>
                                                                <th>Note</th>
                                                                <td><textarea name="" id="" cols="30" rows="3" class="form-control"></textarea></td>
                                                            </tr>
                                                        </table>
                                                        <!-- design details  -->
                                                        <table width="100%">
                                                          
                                                            <tr>
                                                                                                                            
                                                            </tr>
                                                            <tr>
                                                              
                                                            </tr>
                                                        </table>
                                                        <!-- design details  -->
                                                        <table width="100%">
                                                            <tr>
                                                                <!-- <th>Label Name</th> -->
                                                                <th width="150px"></th>
                                                                <th>Main Label</th>
                                                                <th>Tab Label</th>
                                                                <th>Size Label</th>
                                                            </tr>

                                                            <tr>
                                                                <th>Design No</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Quality</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Picks/Cm</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Total Picks</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Total Repeat</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Wastage</th>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input ml-3" type="radio" value="0" name="main_label">
                                                                        <label class="form-check-label ml-5">Yes</label>
                                                                        <input class="form-check-input ml-3" type="radio" value="0" name="main_label" checked>
                                                                        <label class="form-check-label ml-5">NO</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input ml-3" type="radio" value="0" name="tab_lable">
                                                                        <label class="form-check-label ml-5">Yes</label>
                                                                        <input class="form-check-input ml-3" type="radio" value="0" name="tab_lable" checked>
                                                                        <label class="form-check-label ml-5">NO</label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input ml-3" type="radio" value="0" name="size_label">
                                                                        <label class="form-check-label ml-5">Yes</label>
                                                                        <input class="form-check-input ml-3" type="radio" value="0" name="size_label" checked>
                                                                        <label class="form-check-label ml-5">NO</label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Width</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Length</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>
                                                          
                                                            <tr>
                                                                <th>Sq mm</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>

                                                            <tr>
                                                                <th>Sq inch</th>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                                <td><input type="text" class="form-control col-6"></td>
                                                            </tr>
                                                        </table>
                                                    </td>

                                                    <td style="padding:0;" width="300px">
                                                        <div class="form-group">
                                                            <div class="object-fit-container">   
                                                                <img class="object-fit-cover"  id="result" />
                                                            </div>
                                                            <div class="mt-4 ml-4">
                                                                <label for="file">Design Image</label>
                                                                <input type="file" class=" @error('crap_image') is-invalid @enderror" id="file" name="crap_image">
                                                                @error('crap_image')
                                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div> 
                                                        
                                                        @if($editdesignCard)
                                                            <div><img width="100%" src="./img.jpg" alt=""></div>
                                                        @endif

                                                        <div class="form-group">
                                                            <div class="mt-4 ml-4">
                                                                <label for="document_name">Design File</label>
                                                                <input type="file" class="@error('document_name') is-invalid @enderror" id="document_name" name="document_name" value="{{ old('document_name') }}">
                                                                @error('document_name')
                                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0;" colspan="2">
                                                        <table width="100%">
                                                            <tr>
                                                                <th>Add ons</th>
                                                                <th>Basic</th>
                                                                <th>Cut fold</th>
                                                                <th>Diecut</th>
                                                                <th>Nonwoven</th>
                                                                <th>Iron on back</th>
                                                                <th>Extras</th>
                                                                <th>Offered </th>
                                                                <th>TOTAL</th>
                                                            </tr>
                                                            <tr id="table_row">
                                                                <th style="width:150px;">Main</th>
                                                                @if($editdesignCard)
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['0']) ?  $editdesignCard->add_on_cast['0'] : '' }}" placeholder="Enter the basic value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['1']) ?  $editdesignCard->add_on_cast['1'] : '' }}" placeholder="Enter the cut fold value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['2']) ?  $editdesignCard->add_on_cast['2'] : '' }}" placeholder="Enter the deicut value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['3']) ?  $editdesignCard->add_on_cast['3'] : '' }}" placeholder="Enter the nonwoven value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['4']) ?  $editdesignCard->add_on_cast['4'] : '' }}" placeholder="Enter the iron on back value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['5']) ?  $editdesignCard->add_on_cast['5'] : '' }}" placeholder="Enter the extras value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['6']) ?  $editdesignCard->add_on_cast['6'] : '' }}" placeholder="Enter the offered value"></td>
                                                                    <td><input type="text" class="form-control" id="total_value" readonly name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['7']) ?  $editdesignCard->add_on_cast['7'] : '' }}" placeholder="Enter the total value"></td>
                                                                @else
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter basic value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter cut fold value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter deicut value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter nonwoven value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter iron on back value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter extras value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter offered value"></td>
                                                                    <td><input type="text" class="form-control" id="total_value" name="add_on_cast[]" readonly value="" placeholder="Enter total value"></td>
                                                                @endif
                                                            </tr>
                                                            <tr id="table_row">
                                                                <th style="width:150px;">Tab</th>
                                                                @if($editdesignCard)
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['0']) ?  $editdesignCard->add_on_cast['0'] : '' }}" placeholder="Enter the basic value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['1']) ?  $editdesignCard->add_on_cast['1'] : '' }}" placeholder="Enter the cut fold value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['2']) ?  $editdesignCard->add_on_cast['2'] : '' }}" placeholder="Enter the deicut value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['3']) ?  $editdesignCard->add_on_cast['3'] : '' }}" placeholder="Enter the nonwoven value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['4']) ?  $editdesignCard->add_on_cast['4'] : '' }}" placeholder="Enter the iron on back value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['5']) ?  $editdesignCard->add_on_cast['5'] : '' }}" placeholder="Enter the extras value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['6']) ?  $editdesignCard->add_on_cast['6'] : '' }}" placeholder="Enter the offered value"></td>
                                                                    <td><input type="text" class="form-control" id="total_value" readonly name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['7']) ?  $editdesignCard->add_on_cast['7'] : '' }}" placeholder="Enter the total value"></td>
                                                                @else
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter basic value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter cut fold value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter deicut value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter nonwoven value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter iron on back value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter extras value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter offered value"></td>
                                                                    <td><input type="text" class="form-control" id="total_value" name="add_on_cast[]" readonly value="" placeholder="Enter total value"></td>
                                                                @endif
                                                            </tr>
                                                            <tr id="table_row">
                                                                <th style="width:150px;">Size</th>
                                                                @if($editdesignCard)
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['0']) ?  $editdesignCard->add_on_cast['0'] : '' }}" placeholder="Enter the basic value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['1']) ?  $editdesignCard->add_on_cast['1'] : '' }}" placeholder="Enter the cut fold value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['2']) ?  $editdesignCard->add_on_cast['2'] : '' }}" placeholder="Enter the deicut value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['3']) ?  $editdesignCard->add_on_cast['3'] : '' }}" placeholder="Enter the nonwoven value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['4']) ?  $editdesignCard->add_on_cast['4'] : '' }}" placeholder="Enter the iron on back value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['5']) ?  $editdesignCard->add_on_cast['5'] : '' }}" placeholder="Enter the extras value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['6']) ?  $editdesignCard->add_on_cast['6'] : '' }}" placeholder="Enter the offered value"></td>
                                                                    <td><input type="text" class="form-control" id="total_value" readonly name="add_on_cast[]" value="{{ isset($editdesignCard->add_on_cast['7']) ?  $editdesignCard->add_on_cast['7'] : '' }}" placeholder="Enter the total value"></td>
                                                                @else
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter basic value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter cut fold value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter deicut value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter nonwoven value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter iron on back value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter extras value"></td>
                                                                    <td><input type="text" class="form-control txtCal" name="add_on_cast[]" value="" placeholder="Enter offered value"></td>
                                                                    <td><input type="text" class="form-control" id="total_value" name="add_on_cast[]" readonly value="" placeholder="Enter total value"></td>
                                                                @endif
                                                            </tr>
                                                        </table>
                                                        <!-- needle table  -->
                                                        <button type="button" class="btn btn-success font-weight-bold m-2 text-white float-right" id="addRow">Add Row</button>
                                                        <table width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Needle No/Pantone</th>
                                                                    <th>Coulmn</th>
                                                                    <th>Color</th>
                                                                    <th>Color Shade</th>
                                                                    <th>Denier</th>
                                                                    <th>A</th>
                                                                    <th>B</th>
                                                                    <th>C</th>
                                                                    <th>D</th>
                                                                    <th>E</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="add_new_row">
                                                                @if($editdesignCard)
                                                                    @forelse($editdesignCard->needle as $needle)
                                                                        <tr id="inputFormRow">
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="{{ $needle['needle_no_pantone'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="{{ $needle['needle_no_pantone'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color]" value="{{ $needle['color'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color_shade]" value="{{ $needle['color_shade'] }}"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[denier]"  value="{{ $needle['denier'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[a]" value="{{ $needle['a'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[b]" value="{{ $needle['b'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[c]" value="{{ $needle['c'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[d]" value="{{ $needle['d'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[e]" value="{{ $needle['e'] }}" placeholder="Enter the value"></td>
                                                                            <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr id="inputFormRow">
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="{{ $needle['needle_no_pantone'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="{{ $needle['needle_no_pantone'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color]" value="{{ $needle['color'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color_shade]" value="{{ $needle['color_shade'] }}"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[denier]"  value="{{ $needle['denier'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[a]" value="{{ $needle['a'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[b]" value="{{ $needle['b'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[c]" value="{{ $needle['c'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[d]" value="{{ $needle['d'] }}" placeholder="Enter the value"></td>
                                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[e]" value="{{ $needle['e'] }}" placeholder="Enter the value"></td>
                                                                            <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                                        </tr>
                                                                    @endforelse
                                                                @else
                                                                    <tr id="inputFormRow">
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color_shade]" value=""></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[denier]"  value="" placeholder="Enter the value"></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[a]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[b]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[c]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[d]" value="" placeholder="Enter the value"></td>
                                                                        <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[e]" value="" placeholder="Enter the value"></td>
                                                                        <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                            
                                                        </table>
                                                        <!-- needle table  -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">{{ $editdesignCard ? 'Update' : 'Save'}}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $("#table_row").on('input', '.txtCal', function () {
                var calculated_total_sum = 0;
                
                $("#table_row .txtCal").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }                  
                });
                $("#total_value").val(calculated_total_sum);
                console.log(calculated_total_sum);
            });
        });

        $("#addRow").click(function () {
            var html = '';
            html +='<tr id="inputFormRow">';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[needle_no_pantone]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[color_shade]" value=""></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[denier]"  value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[a]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[b]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[c]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[d]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[e]" value="" placeholder="Enter the value"></td>';
            html +='<td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>';
            html +='</tr>';
        
            $('#add_new_row').append(html);
        });

        $(document).on('click', '#removeRow', function () {
            let tabl = $("#add_new_row > tr").length;
            if(tabl === 1)
            {
                // $('#add_new_row').html('<tr><td colspan="10" class="text-center">No Needle pantone found...</td></tr>');
                alert("Sorry you can't remove this row");
            }
            else
            {
               $(this).closest('#inputFormRow').remove();
            }
        });
    </script>
@stop
