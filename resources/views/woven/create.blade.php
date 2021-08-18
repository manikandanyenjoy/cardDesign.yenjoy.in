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

    /* .label_names
    {
        border:none !important;
        color:#000;
        font-weight:bold;
    } */
</style>

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="pl-2">{{ $editdesignCard ? "Edit Woven - ".$editdesignCard->label : "Create Woven" }}</h1>
        </div>

        <div class="col-sm-6 pr-4 d-flex justify-content-end">
            @if($editdesignCard)
                <a href="{{ route('woven.show',$editdesignCard->id) }}" class="btn col-2 bg-gradient-primary mr-3">View</a>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap">
                                                <tr>
                                                    <th>Customer</th>
                                                    <td>
                                                        <select class="form-control" name="customer_id">
                                                            <option value="">Select Customer</option>
                                                            @foreach( $data['customerMaster'] as $customer) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$customer['id']}}" {{ old('customer_id') == $customer['id'] ? 'selected' : ($customer['id'] == $editdesignCard->customer_id ? 'selected' : '') }}>{{ucfirst($customer['first_name'])}} </option>
                                                                @else
                                                                    <option value="{{$customer['id']}}" {{ old('customer_id') == $customer['id'] ? 'selected' : '' }}>{{ucfirst($customer['first_name'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <th>Label</th>
                                                    <td><input type="text" name="label" value="{{ $editdesignCard ? old('label',$editdesignCard->label) : old('label') }}" class="form-control"></td>
                                                    <th>Date</th>
                                                    <td><input type="date" name="date" value="{{ $editdesignCard ? old('date',$editdesignCard->date) : old('date') }}" class="form-control"></td>
                                                </tr>

                                                <tr>
                                                    <th>Designer</th>
                                                    <td>
                                                        <select class="form-control" name="designer_id">
                                                            <option value="">Select Designer</option>
                                                            @foreach( $data['designerMaster'] as $designer) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$designer['id']}}" {{ old('designer_id') == $designer['id'] ? 'selected' : ($designer['id'] == $editdesignCard->designer_id ? 'selected' : '') }}>{{ucfirst($designer['name'])}} </option>
                                                                @else
                                                                    <option value="{{$designer['id']}}" {{ old('designer_id') == $designer['id'] ? 'selected' : '' }}>{{ucfirst($designer['name'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <th>Sales Rep</th>
                                                    <td>
                                                        <select class="form-control" name="salesrep_id">
                                                            <option value="">Select Sales Rep</option>
                                                            @foreach( $data['salesrepMaster'] as $salesrep) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$salesrep['id']}}" {{ old('salesrep_id') == $salesrep['id'] ? 'selected' : ($salesrep['id'] == $editdesignCard->salesrep_id ? 'selected' : '') }}>{{ucfirst($salesrep['name'])}} </option>
                                                                    @else
                                                                    <option value="{{$salesrep['id']}}" {{ old('salesrep_id') == $salesrep['id'] ? 'selected' : '' }}>{{ucfirst($salesrep['name'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <th>Weaver</th>
                                                    <td width="150px">
                                                        <div class="form-group row mx-2">
                                                            @if($editdesignCard)
                                                                <input type="text" name="weaver[]" value="{{ isset($editdesignCard->weaver[0]) ? $editdesignCard->weaver[0] : '' }}" class="form-control col">
                                                                <input type="text" name="weaver[]" value="{{ isset($editdesignCard->weaver[1]) ? $editdesignCard->weaver[1] : '' }}" class="form-control col">
                                                                <input type="text" name="weaver[]" value="{{ isset($editdesignCard->weaver[2]) ? $editdesignCard->weaver[2] : '' }}" class="form-control col">
                                                            @else
                                                                <input type="text" name="weaver[]" class="form-control col">
                                                                <input type="text" name="weaver[]" class="form-control col">
                                                                <input type="text" name="weaver[]" class="form-control col">
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Warp</th>
                                                    <td>
                                                        <select name="warps_id" class="form-control">
                                                            <option value="">Select Warp</option>
                                                            @foreach( $data['warpMaster'] as $warp) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$warp['id']}}" {{ old('warps_id') == $warp['id'] ? 'selected' : ($warp['id'] == $editdesignCard->warps_id ? 'selected' : '') }}>{{ucfirst($warp['name'])}} </option>
                                                                @else
                                                                    <option value="{{$warp['id']}}" {{ old('warps_id') == $warp['id'] ? 'selected' : '' }}>{{ucfirst($warp['name'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <th>Finishing</th>
                                                    <td>
                                                       <input type="text" name="finishing" value="{{ $editdesignCard ? old('finishing',$editdesignCard->finishing) : old('finishing') }}" class="form-control">
                                                    </td>
                                                    <th>Notes</th>
                                                    <td>
                                                       <textarea name="description" cols="30" rows="3" class="form-control">
                                                           {{ $editdesignCard ? old('finishing',$editdesignCard->finishing) : old('finishing') }}
                                                       </textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                                 
                                            <div class="row">
                                                <div class="col">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th></th>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="main_label" checked readonly>
                                                                    <label class="custom-control-label" for="main_label">Main Label</label>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Design No</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[0]) ? $editdesignCard->main_label[0] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr class="main_label_input">
                                                            <th width="200px">Quality</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[1]) ? $editdesignCard->main_label[1] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr class="main_label_input">
                                                            <th width="200px">Picks/Cm</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[2]) ? $editdesignCard->main_label[2] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Total Picks</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[3]) ? $editdesignCard->main_label[3] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Total Repeat</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[4]) ? $editdesignCard->main_label[4] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Wastage</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[5]) ? $editdesignCard->main_label[5] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Width</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[6]) ? $editdesignCard->main_label[6] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Length</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[7]) ? $editdesignCard->main_label[7] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Sq mm</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[8]) ? $editdesignCard->main_label[8] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <th width="200px">Sq inch</th>
                                                            <td width="200px"><input type="text" name="main_lable[]" value="{{ $editdesignCard && isset($editdesignCard->main_label[9]) ? $editdesignCard->main_label[9] : '' }}" class="form-control"></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="col">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="main_label" checked readonly>
                                                                    <label class="custom-control-label" for="main_label">Tab Label</label>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[0]) ? $editdesignCard->tab_label[0] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[1]) ? $editdesignCard->tab_label[1] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[2]) ? $editdesignCard->tab_label[2] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[3]) ? $editdesignCard->tab_label[3] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[4]) ? $editdesignCard->tab_label[4] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[5]) ? $editdesignCard->tab_label[5] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[6]) ? $editdesignCard->tab_label[6] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[7]) ? $editdesignCard->tab_label[7] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[8]) ? $editdesignCard->tab_label[8] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="tab_label[]" value="{{ $editdesignCard && isset($editdesignCard->tab_label[9]) ? $editdesignCard->tab_label[9] : '' }}" class="form-control"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="main_label" checked readonly>
                                                                    <label class="custom-control-label" for="main_label">Size Label</label>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[0]) ? $editdesignCard->size_label[0] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[1]) ? $editdesignCard->size_label[1] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[2]) ? $editdesignCard->size_label[2] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[3]) ? $editdesignCard->size_label[3] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[4]) ? $editdesignCard->size_label[4] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[5]) ? $editdesignCard->size_label[5] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[6]) ? $editdesignCard->size_label[6] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[7]) ? $editdesignCard->size_label[7] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[8]) ? $editdesignCard->size_label[8] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr class="main_label_input">
                                                            <td width="200px"><input type="text" name="size_label[]" value="{{ $editdesignCard && isset($editdesignCard->size_label[9]) ? $editdesignCard->size_label[9] : '' }}" class="form-control"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        
                                            <table class="table table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Add on</th>
                                                        <th>Basic</th>
                                                        <th>Cut fold</th>	
                                                        <th>Diecut</th>	
                                                        <th>Nonwoven</th>		
                                                        <th>Iron on back</th>
                                                        <th>Extras</th>
                                                        <th>Offered</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Main</th>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[0]) ? $editdesignCard->add_on_main_cost[0] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[1]) ? $editdesignCard->add_on_main_cost[1] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[2]) ? $editdesignCard->add_on_main_cost[2] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[3]) ? $editdesignCard->add_on_main_cost[3] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[4]) ? $editdesignCard->add_on_main_cost[4] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[5]) ? $editdesignCard->add_on_main_cost[5] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[6]) ? $editdesignCard->add_on_main_cost[6] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="main_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost[7]) ? $editdesignCard->add_on_main_cost[7] : '' }}" class="form-controls"></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Tab</th>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[0]) ? $editdesignCard->add_on_tab_cost[0] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[1]) ? $editdesignCard->add_on_tab_cost[1] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[2]) ? $editdesignCard->add_on_tab_cost[2] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[3]) ? $editdesignCard->add_on_tab_cost[3] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[4]) ? $editdesignCard->add_on_tab_cost[4] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[5]) ? $editdesignCard->add_on_tab_cost[5] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[6]) ? $editdesignCard->add_on_tab_cost[6] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="tab_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost[7]) ? $editdesignCard->add_on_tab_cost[7] : '' }}" class="form-controls"></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Size</th>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[0]) ? $editdesignCard->add_on_size_cost[0] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[1]) ? $editdesignCard->add_on_size_cost[1] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[2]) ? $editdesignCard->add_on_size_cost[2] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[3]) ? $editdesignCard->add_on_size_cost[3] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[4]) ? $editdesignCard->add_on_size_cost[4] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[5]) ? $editdesignCard->add_on_size_cost[5] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[6]) ? $editdesignCard->add_on_size_cost[6] : '' }}" class="form-controls"></td>
                                                        <td><input type="text" name="size_cost[]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost[7]) ? $editdesignCard->add_on_size_cost[7] : '' }}" class="form-controls"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <button type="button" class="btn btn-success font-weight-bold m-2 text-white" id="addRow">Add Row</button>
                                            <table class="table table-bordered text-nowrap">
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
                                                        <input type="text" id="form_row_count" value="{{ count($editdesignCard->needle) }}">
                                                        @forelse($editdesignCard->needle as $index => $needle)
                                                            <tr id="inputFormRow">
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][needle_no_pantone]" value="{{ $needle['needle_no_pantone'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][column]" value="{{ $needle['column'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][color]" value="{{ $needle['color'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][color_shade]" value="{{ $needle['color_shade'] }}"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][denier]"  value="{{ $needle['denier'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][a]" value="{{ $needle['a'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][b]" value="{{ $needle['b'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][c]" value="{{ $needle['c'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][d]" value="{{ $needle['d'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[{{$index}}][e]" value="{{ $needle['e'] }}" placeholder="Enter the value"></td>
                                                                <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                            </tr>
                                                        @empty
                                                            <tr id="inputFormRow">
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][needle_no_pantone]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][column]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][color]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][color_shade]" value=""></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][denier]"  value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][a]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][b]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][c]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][d]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][e]" value="" placeholder="Enter the value"></td>
                                                                <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                            </tr>
                                                        @endforelse
                                                    @else
                                                        <tr id="inputFormRow">
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][needle_no_pantone]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][column]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][color]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][color_shade]" value=""></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][denier]"  value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][a]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][b]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][c]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][d]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][e]" value="" placeholder="Enter the value"></td>
                                                            <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <div class="object-fit-container">   
                                                <img class="object-fit-cover"  id="result" />
                                            </div>
                                            <div class="mt-4">
                                                <label for="file">Front Image</label>
                                                <input type="file" class=" @error('crap_image') is-invalid @enderror" id="file" name="front_crop_image">
                                                @error('crap_image')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <div class="object-fit-container">   
                                                <img class="object-fit-cover"  id="result" />
                                            </div>
                                            <div class="mt-4">
                                                <label for="file">Back Image</label>
                                                <input type="file" class=" @error('crap_image') is-invalid @enderror" id="file" name="back_crop_image">
                                                @error('crap_image')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <div class="object-fit-container">   
                                                <img class="object-fit-cover"  id="result" />
                                            </div>
                                            <div class="mt-4">
                                                <label for="file">All View Image</label>
                                                <input type="file" class=" @error('crap_image') is-invalid @enderror" id="file" name="all_view_crop_image">
                                                @error('crap_image')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <div class="mt-4">
                                                <label for="document_name">Design File</label>
                                                <input type="file" class="@error('document_name') is-invalid @enderror" id="document_name" name="design_file" value="{{ old('document_name') }}">
                                                @error('document_name')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
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
        // var index = $("#form_row_count").val() || 0;
        var index = 0;
        $("#addRow").click(function () {
            index++;
        alert(index);
            var html = '';
            html +='<tr id="inputFormRow">';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][needle_no_pantone]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][column]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][color]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][color_shade]" value=""></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][denier]"  value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][a]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][b]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][c]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][d]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][e]" value="" placeholder="Enter the value"></td>';
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
                index--;

               $(this).closest('#inputFormRow').remove();
            }
        });


        $("#tab_label").on("change",function(){
            $(".tab_label_input").toggleClass("d-none");
        });
        $("#size_label").on("change",function(){
            $(".size_label_input").toggleClass("d-none");
        });
    </script>
@stop
