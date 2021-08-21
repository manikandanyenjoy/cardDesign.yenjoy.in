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
        overflow:hidden;
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
    tr input {

        width:70px
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
                        <form method="POST" action="{{ $editdesignCard ? route('woven.update', $editdesignCard->id) : route('woven.store')  }}" enctype="multipart/form-data" novalidate>
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
                                                        <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id">
                                                            <option value="">Select Customer</option>
                                                            @foreach( $data['customerMaster'] as $customer) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$customer['id']}}" {{ old('customer_id') == $customer['id'] ? 'selected' : ($customer['id'] == $editdesignCard->customer_id ? 'selected' : '') }}>{{ucfirst($customer['first_name'])}} </option>
                                                                @else
                                                                    <option value="{{$customer['id']}}" {{ old('customer_id') == $customer['id'] ? 'selected' : '' }}>{{ucfirst($customer['first_name'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('customer_id') 
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
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
                                                            <select style="width: 50%;"  class="form-control" name="weaver[]">
                                                                <option value="">Select</option>
                                                                @foreach( $data['loomMaster'] as $loom) 
                                                                    @if($editdesignCard)
                                                                        <option value="{{$loom['id']}}" {{ old('wever[]') == $loom['id'] ? 'selected' : ($loom['id'] == (isset($editdesignCard->weaver[0]) ? $editdesignCard->weaver[0] : '')? 'selected' : '') }}>{{ucfirst($loom['loom_name'])}} </option>
                                                                        @else
                                                                        <option value="{{$loom['id']}}" {{ old('wever[]') == $loom['id'] ? 'selected' : '' }}>{{ucfirst($loom['loom_name'])}} </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <select style="width: 50%;" class="form-control" name="weaver[]">
                                                                <option value="">Select</option>
                                                                @foreach( $data['loomMaster'] as $loom) 
                                                                    @if($editdesignCard)
                                                                        <option value="{{$loom['id']}}" {{ old('wever[]') == $loom['id'] ? 'selected' : ($loom['id'] == (isset($editdesignCard->weaver[1]) ? $editdesignCard->weaver[1] : '')? 'selected' : '') }}>{{ucfirst($loom['loom_name'])}} </option>
                                                                        @else
                                                                        <option value="{{$loom['id']}}" {{ old('wever[]') == $loom['id'] ? 'selected' : '' }}>{{ucfirst($loom['loom_name'])}} </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
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
                                                         <select name="finishing" class="form-control">
                                                            <option value="">Select finishing</option>
                                                            @foreach( $data['finishingMaster'] as $finishing) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$finishing['id']}}" {{ old('finishing') == $finishing['id'] ? 'selected' : ($warp['id'] == $editdesignCard->finishing ? 'selected' : '') }}>{{ucfirst($finishing['machine'])}} </option>
                                                                @else
                                                                    <option value="{{$finishing['id']}}" {{ old('finishing') == $finishing['id'] ? 'selected' : '' }}>{{ucfirst($finishing['machine'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
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
                                                    <table class="table table-bordered text-nowrap">
                                                        <tr>
                                                            <th></th>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="main_label" checked disabled>
                                                                    <label class="custom-control-label" for="main_label">Main Label</label>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Design No</th>
                                                            <td width="200px"><input type="text" name="main_label[design_no]" value="{{ $editdesignCard && isset($editdesignCard->main_label['design_no']) ? $editdesignCard->main_label['design_no'] : '' }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th width="200px">Quality</th>
                                                            <td width="200px">
                                                         <select name="main_label[quality]" class="form-control">
                                                            <option value="">Select Quality</option>
                                                            @foreach( $data['wovenQuality'] as $quality) 
                                                                @if($editdesignCard)
                                                                    <option value="{{$quality['id']}}" {{ old('finishing') == $quality['id'] ? 'selected' : ($quality['id'] == ($editdesignCard && isset($editdesignCard->main_label['quality']) ? $editdesignCard->main_label['quality'] : '')? 'selected' : '') }}>{{ucfirst($quality['quality'])}} </option>
                                                                @else
                                                                    <option value="{{$quality['id']}}" {{ old('finishing') == $quality['id'] ? 'selected' : '' }}>{{ucfirst($quality['quality'])}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                                </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th width="200px">Picks/Cm</th>
                                                            <td width="200px"><input type="text" name="main_label[picks]" value="{{ $editdesignCard && isset($editdesignCard->main_label['picks']) ? $editdesignCard->main_label['picks'] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Total Picks</th>
                                                            <td width="200px"><input type="text" name="main_label[total_picks]" value="{{ $editdesignCard && isset($editdesignCard->main_label['total_picks']) ? $editdesignCard->main_label['total_picks'] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Total Repeat</th>
                                                            <td width="200px">
                                                                <div class="form-group row">
                                                                    @if($editdesignCard)
                                                                        <input type="text" name="main_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->main_label['total_repeat'][0]) ? $editdesignCard->main_label['total_repeat'][0] : '' }}" class="form-control col">
                                                                        <input type="text" name="main_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->main_label['total_repeat'][1]) ? $editdesignCard->main_label['total_repeat'][1] : '' }}" class="form-control col">
                                                                        <input type="text" name="main_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->main_label['total_repeat'][2]) ? $editdesignCard->main_label['total_repeat'][2] : '' }}" class="form-control col">
                                                                    @else
                                                                        <input type="text" name="main_label[total_repeat][]" class="form-control col">
                                                                        <input type="text" name="main_label[total_repeat][]" class="form-control col">
                                                                        <input type="text" name="main_label[total_repeat][]" class="form-control col">
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Wastage</th>
                                                            <td width="200px">
                                                                <div class="form-group d-flex">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="yes" name="main_label[wastage]" {{ $editdesignCard && isset($editdesignCard->main_label['wastage']) ? $editdesignCard->main_label['wastage'] == 'yes' ? 'checked' : '' : '' }}>
                                                                        <label class="form-check-label ml-4">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="no" name="main_label[wastage]" {{ $editdesignCard && isset($editdesignCard->main_label['wastage']) ? $editdesignCard->main_label['wastage'] == 'no' ? 'checked' : '' : 'checked' }}>
                                                                        <label class="form-check-label ml-4">No</label>
                                                                    </div>
                                                                </div>                                                                
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Width</th>
                                                            <td width="200px"><input type="text" name="main_label[width]" value="{{ $editdesignCard && isset($editdesignCard->main_label['width']) ? $editdesignCard->main_label['width'] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Length</th>
                                                            <td width="200px"><input type="text" name="main_label[length]" value="{{ $editdesignCard && isset($editdesignCard->main_label['length']) ? $editdesignCard->main_label['length'] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Sq mm</th>
                                                            <td width="200px"><input type="text" name="main_label[sq_mm]" value="{{ $editdesignCard && isset($editdesignCard->main_label['sq_mm']) ? $editdesignCard->main_label['sq_mm'] : '' }}" class="form-control"></td>
                                                        </tr>

                                                        <tr>
                                                            <th width="200px">Sq inch</th>
                                                            <td width="200px"><input type="text" name="main_label[sq_inch]" value="{{ $editdesignCard && isset($editdesignCard->main_label['sq_inch']) ? $editdesignCard->main_label['sq_inch'] : '' }}" class="form-control"></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="col">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    @if($editdesignCard)
                                                                        <input type="checkbox" name="tab_label[label]"  value="{{ (isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'yes') ? 'yes' : 'no') : 'no') }}" {{ (isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'yes') ? 'checked' : '') : '') }} class="custom-control-input" id="tab_label">
                                                                    @else
                                                                        <input type="checkbox" name="tab_label[label]"  value="{{ old('tab_label.label') == 'yes' ? 'yes' : 'no' }}" {{ old('tab_label.label') == 'yes' ? 'checked' : '' }} class="custom-control-input" id="tab_label">
                                                                    @endif
                                                                    <label class="custom-control-label" for="tab_label">Tab Label</label>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="tab_label[design_no]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['design_no']) ? old('tab_label.design_no',$editdesignCard->tab_label['design_no']) : old('tab_label.design_no') }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <select name="tab_label[quality]" class="form-control">
                                                                    <option value="">Select Quality</option>
                                                                    @foreach( $data['wovenQuality'] as $quality) 
                                                                        @if($editdesignCard)
                                                                            <option value="{{$quality['id']}}" {{ old('finishing') == $quality['id'] ? 'selected' : ($quality['id'] == ($editdesignCard && isset($editdesignCard->tab_label['quality']) ? $editdesignCard->tab_label['quality'] : '')? 'selected' : '') }}>{{ucfirst($quality['quality'])}} </option>
                                                                        @else
                                                                            <option value="{{$quality['id']}}" {{ old('finishing') == $quality['id'] ? 'selected' : '' }}>{{ucfirst($quality['quality'])}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        
                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                          <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="tab_label[picks]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['picks']) ? old('tab_label.picks', $editdesignCard->tab_label['picks']) : old('tab_label.picks') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="tab_label[total_picks]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['total_picks']) ? old('tab_label.total_picks', $editdesignCard->tab_label['total_picks']) : old('tab_label.total_picks') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <div class="form-group row">
                                                                    @if($editdesignCard)
                                                                        <input type="text" name="tab_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['total_repeat'][0]) ? old('tab_label.total_repeat.0',$editdesignCard->tab_label['total_repeat'][0]) : ''  }}" class="form-control col">
                                                                        <input type="text" name="tab_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['total_repeat'][1]) ? old('tab_label.total_repeat.1',$editdesignCard->tab_label['total_repeat'][1]) : ''  }}" class="form-control col">
                                                                        <input type="text" name="tab_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['total_repeat'][2]) ? old('tab_label.total_repeat.2',$editdesignCard->tab_label['total_repeat'][2]) : ''  }}" class="form-control col">
                                                                    @else
                                                                        <input type="text" name="tab_label[total_repeat][]" value="{{ old('tab_label.total_repeat.0') }}" class="form-control col">
                                                                        <input type="text" name="tab_label[total_repeat][]" value="{{ old('tab_label.total_repeat.1') }}" class="form-control col">
                                                                        <input type="text" name="tab_label[total_repeat][]" value="{{ old('tab_label.total_repeat.2') }}" class="form-control col">
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <div class="form-group d-flex">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="yes" name="tab_label[wastage]" {{ $editdesignCard && isset($editdesignCard->tab_label['wastage']) ? $editdesignCard->tab_label['wastage'] == 'yes' ? 'checked' : '' : '' }}>
                                                                        <label class="form-check-label ml-4">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="no" name="tab_label[wastage]" {{ $editdesignCard && isset($editdesignCard->tab_label['wastage']) ? $editdesignCard->tab_label['wastage'] == 'no' ? 'checked' : '' : 'checked' }}>
                                                                        <label class="form-check-label ml-4">No</label>
                                                                    </div>
                                                                </div>  
                                                            </td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <input type="text" name="tab_label[width]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['width']) ? old('tab_label.width', $editdesignCard->tab_label['width']) :  old('tab_label.width') }}" class="form-control">
                                                            </td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="tab_label[length]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['length']) ? old('tab_label.length', $editdesignCard->tab_label['length']) : old('tab_label.length') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="tab_label[sq_mm]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['sq_mm']) ? old('tab_label.sq_mm', $editdesignCard->tab_label['sq_mm']) : old('tab_label.sq_mm') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="tab_label_input {{ isset($editdesignCard->tab_label['label']) ? (($editdesignCard->tab_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="tab_label_input @if(old('tab_label.label') == 'no') d-none @elseif(old('tab_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="tab_label[sq_inch]" value="{{ $editdesignCard && isset($editdesignCard->tab_label['sq_inch']) ? old('tab_label.sq_inch', $editdesignCard->tab_label['sq_inch']) : old('tab_label.sq_inch') }}" class="form-control"></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="col">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="size_labels" {{ old('size_labels') == 'on' ? 'checked' : ''}} class="custom-control-input" id="size_label">
                                                                    <label class="custom-control-label" for="size_label">Size Label</label>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[design_no]" value="{{ $editdesignCard && isset($editdesignCard->size_label['design_no']) ? old('size_label.design_no',$editdesignCard->size_label['design_no']) : old('size_label.design_no') }}" class="form-control"></td>
                                                        </tr>
                                                        
                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <select name="size_label[quality]" class="form-control">
                                                                    <option value="">Select Quality</option>
                                                                    @foreach( $data['wovenQuality'] as $quality) 
                                                                        @if($editdesignCard)
                                                                            <option value="{{$quality['id']}}" {{ old('finishing') == $quality['id'] ? 'selected' : ($quality['id'] == ($editdesignCard && isset($editdesignCard->size_label['quality']) ? $editdesignCard->size_label['quality'] : '')? 'selected' : '') }}>{{ucfirst($quality['quality'])}} </option>
                                                                        @else
                                                                            <option value="{{$quality['id']}}" {{ old('finishing') == $quality['id'] ? 'selected' : '' }}>{{ucfirst($quality['quality'])}} </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        
                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[picks]" value="{{ $editdesignCard && isset($editdesignCard->size_label['picks']) ? old('size_label.picks',$editdesignCard->size_label['picks']) : old('size_label.picks') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[total_picks]" value="{{ $editdesignCard && isset($editdesignCard->size_label['total_picks']) ? old('size_label.total_picks',$editdesignCard->size_label['total_picks']) : old('size_label.total_picks') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <div class="form-group row">
                                                                    @if($editdesignCard)
                                                                        <input type="text" name="size_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->size_label['total_repeat'][0]) ? old('size_label.total_repeat.0',$editdesignCard->size_label['total_repeat'][0]) : old('size_label.total_repeat.0') }}" class="form-control col">
                                                                        <input type="text" name="size_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->size_label['total_repeat'][1]) ? old('size_label.total_repeat.1',$editdesignCard->size_label['total_repeat'][1]) : old('size_label.total_repeat.1') }}" class="form-control col">
                                                                        <input type="text" name="size_label[total_repeat][]" value="{{ $editdesignCard && isset($editdesignCard->size_label['total_repeat'][2]) ? old('size_label.total_repeat.2',$editdesignCard->size_label['total_repeat'][2]) : old('size_label.total_repeat.2') }}" class="form-control col">
                                                                    @else
                                                                        <input type="text" name="size_label[total_repeat][]" value="{{ old('size_label.total_repeat.0') }}" class="form-control col">
                                                                        <input type="text" name="size_label[total_repeat][]" value="{{ old('size_label.total_repeat.1') }}" class="form-control col">
                                                                        <input type="text" name="size_label[total_repeat][]" value="{{ old('size_label.total_repeat.2') }}" class="form-control col">
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px">
                                                                <div class="form-group d-flex">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="yes" name="size_label[wastage]" {{ $editdesignCard && isset($editdesignCard->size_label['wastage']) ? $editdesignCard->size_label['wastage'] == 'yes' ? 'checked' : '' : '' }}>
                                                                        <label class="form-check-label ml-4">Yes</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" value="no" name="size_label[wastage]" {{ $editdesignCard && isset($editdesignCard->size_label['wastage']) ? $editdesignCard->size_label['wastage'] == 'no' ? 'checked' : '' : 'checked' }}>
                                                                        <label class="form-check-label ml-4">No</label>
                                                                    </div>
                                                                </div>                                                                
                                                            </td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[width]" value="{{ $editdesignCard && isset($editdesignCard->size_label['width']) ? old('size_label.width', $editdesignCard->size_label['width']) : old('size_label.width') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[length]" value="{{ $editdesignCard && isset($editdesignCard->size_label['length']) ? old('size_label.length', $editdesignCard->size_label['length']) : old('size_label.length') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[sq_mm]" value="{{ $editdesignCard && isset($editdesignCard->size_label['sq_mm']) ? old('size_label.sq_mm', $editdesignCard->size_label['sq_mm']) : old('size_label.sq_mm') }}" class="form-control"></td>
                                                        </tr>

                                                        @if($editdesignCard)
                                                            <tr class="size_label_input {{ isset($editdesignCard->size_label['label']) ? (($editdesignCard->size_label['label'] == 'no') ? 'd-none' : '') : 'd-none' }}">
                                                        @else
                                                            <tr class="size_label_input @if(old('size_label.label') == 'no') d-none @elseif(old('size_label.label') == 'yes')) @else d-none @endif">
                                                        @endif
                                                            <td width="200px"><input type="text" name="size_label[sq_inch]" value="{{ $editdesignCard && isset($editdesignCard->size_label['sq_inch']) ? old('size_label.sq_inch', $editdesignCard->size_label['sq_inch']) : old('size_label.sq_inch') }}" class="form-control"></td>
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
                                                        <th>Total</th>
                                                        <th>Offered</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="main_table_row">
                                                        <th>Main</th>
                                                        <td><input type="text" name="main_cost[basic]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['basic']) ? $editdesignCard->add_on_main_cost['basic'] : '' }}" class="form-controls main_txt_cal"></td>
                                                        <td><input type="text" name="main_cost[cut_fold]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['cut_fold']) ? $editdesignCard->add_on_main_cost['cut_fold'] : '' }}" class="form-controls main_txt_cal"></td>
                                                        <td><input type="text" name="main_cost[diecut]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['diecut']) ? $editdesignCard->add_on_main_cost['diecut'] : '' }}" class="form-controls main_txt_cal"></td>
                                                        <td><input type="text" name="main_cost[nonwoven]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['nonwoven']) ? $editdesignCard->add_on_main_cost['nonwoven'] : '' }}" class="form-controls main_txt_cal"></td>
                                                        <td><input type="text" name="main_cost[iron_on_back]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['iron_on_back']) ? $editdesignCard->add_on_main_cost['iron_on_back'] : '' }}" class="form-controls main_txt_cal"></td>
                                                        <td><input type="text" name="main_cost[extra]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['extra']) ? $editdesignCard->add_on_main_cost['extra'] : '' }}" class="form-controls main_txt_cal"></td>
                                                        <td><input type="text" name="main_cost[total]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['total']) ? $editdesignCard->add_on_main_cost['total'] : '' }}" class="form-controls" readonly id="main_total_value"></td>
                                                        <td><input type="text" name="main_cost[offered]" value="{{ $editdesignCard && isset($editdesignCard->add_on_main_cost['offered']) ? $editdesignCard->add_on_main_cost['offered'] : '' }}" class="form-controls"></td>
                                                    </tr>

                                                    <tr id="tab_table_row">
                                                        <th>Tab</th>
                                                        <td><input type="text" name="tab_cost[basic]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['basic']) ? $editdesignCard->add_on_tab_cost['basic'] : '' }}" class="form-controls tab_txt_cal"></td>
                                                        <td><input type="text" name="tab_cost[cut_fold]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['cut_fold']) ? $editdesignCard->add_on_tab_cost['cut_fold'] : '' }}" class="form-controls tab_txt_cal"></td>
                                                        <td><input type="text" name="tab_cost[diecut]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['diecut']) ? $editdesignCard->add_on_tab_cost['diecut'] : '' }}" class="form-controls tab_txt_cal"></td>
                                                        <td><input type="text" name="tab_cost[nonwoven]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['nonwoven']) ? $editdesignCard->add_on_tab_cost['nonwoven'] : '' }}" class="form-controls tab_txt_cal"></td>
                                                        <td><input type="text" name="tab_cost[iron_on_back]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['iron_on_back']) ? $editdesignCard->add_on_tab_cost['iron_on_back'] : '' }}" class="form-controls tab_txt_cal"></td>
                                                        <td><input type="text" name="tab_cost[extra]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['extra']) ? $editdesignCard->add_on_tab_cost['extra'] : '' }}" class="form-controls tab_txt_cal"></td>
                                                        <td><input type="text" name="tab_cost[total]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['total']) ? $editdesignCard->add_on_tab_cost['total'] : '' }}" class="form-controls" readonly id="tab_total_value"></td>
                                                        <td><input type="text" name="tab_cost[offered]" value="{{ $editdesignCard && isset($editdesignCard->add_on_tab_cost['offered']) ? $editdesignCard->add_on_tab_cost['offered'] : '' }}" class="form-controls"></td>
                                                    </tr>

                                                    <tr id="size_table_row">
                                                        <th>Size</th>
                                                        <td><input type="text" name="size_cost[basic]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['basic']) ? $editdesignCard->add_on_size_cost['basic'] : '' }}" class="form-controls size_txt_cal"></td>
                                                        <td><input type="text" name="size_cost[cut_fold]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['cut_fold']) ? $editdesignCard->add_on_size_cost['cut_fold'] : '' }}" class="form-controls size_txt_cal"></td>
                                                        <td><input type="text" name="size_cost[diecut]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['diecut']) ? $editdesignCard->add_on_size_cost['diecut'] : '' }}" class="form-controls size_txt_cal"></td>
                                                        <td><input type="text" name="size_cost[nonwoven]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['nonwoven']) ? $editdesignCard->add_on_size_cost['nonwoven'] : '' }}" class="form-controls size_txt_cal"></td>
                                                        <td><input type="text" name="size_cost[iron_on_back]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['iron_on_back']) ? $editdesignCard->add_on_size_cost['iron_on_back'] : '' }}" class="form-controls size_txt_cal"></td>
                                                        <td><input type="text" name="size_cost[extra]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['extra']) ? $editdesignCard->add_on_size_cost['extra'] : '' }}" class="form-controls size_txt_cal"></td>
                                                        <td><input type="text" name="size_cost[total]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['total']) ? $editdesignCard->add_on_size_cost['total'] : '' }}" class="form-controls" readonly id="size_total_value"></td>
                                                        <td><input type="text" name="size_cost[offered]" value="{{ $editdesignCard && isset($editdesignCard->add_on_size_cost['offered']) ? $editdesignCard->add_on_size_cost['offered'] : '' }}" class="form-controls"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <button type="button" class="btn btn-success font-weight-bold m-2 text-white" id="addRow">Add Row</button>
                                            <table class="table table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Needle No</th>
                                                        <th>Pantone</th>
                                                        <th>Color</th>
                                                        <th>Shade</th>
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
                                                        <input type="hidden" id="form_row_count" value="{{ count($editdesignCard->needle) }}">
                                                        @forelse($editdesignCard->needle as $index => $needle)
                                                            <tr id="inputFormRow">
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][needle_no]" value="{{ $needle['needle_no'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][pantone]" value="{{ $needle['pantone'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][color]" value="{{ $needle['color'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" name="needle[{{$index}}][color_shade]" value="{{ $needle['color_shade'] }}"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][denier]"  value="{{ $needle['denier'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][a]" value="{{ $needle['a'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][b]" value="{{ $needle['b'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][c]" value="{{ $needle['c'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][d]" value="{{ $needle['d'] }}" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[{{$index}}][e]" value="{{ $needle['e'] }}" placeholder="Enter the value"></td>
                                                                <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                            </tr>
                                                        @empty
                                                            <tr id="inputFormRow">
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][needle_no]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][pantone]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][color]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="color" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][color_shade]" value=""></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][denier]"  value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][a]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][b]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][c]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][d]" value="" placeholder="Enter the value"></td>
                                                                <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][e]" value="" placeholder="Enter the value"></td>
                                                                <td><button id="removeRow" class="btn btn-danger" type="button">remove</button></td>
                                                            </tr>
                                                        @endforelse
                                                    @else
                                                        <tr id="inputFormRow">
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][needle_no]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][pantone]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][color]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle[0][color_shade]" value=""></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][denier]"  value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][a]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][b]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" name="needle[0][c]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][d]" value="" placeholder="Enter the value"></td>
                                                            <td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle[0][e]" value="" placeholder="Enter the value"></td>
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
                                                @if($editdesignCard)
                                                    @if($editdesignCard->front_image)
                                                        <img class="object-fit-cover" src="{{ $editdesignCard ? $editdesignCard->front_image : '' }}" id="result" />
                                                    @else
                                                        <img class="object-fit-cover" id="result" />
                                                    @endif
                                                @else
                                                    <img class="object-fit-cover" id="result" />                                                  
                                                @endif
                                            </div>
                                            <div class="mt-4">
                                                <label for="file">Front Image</label>
                                                <input type="hidden" name="front_image" id="front_crop_image">
                                                <input type="file" id="file" name="front_crop_image" accept="image/*">
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <div class="object-fit-container">  
                                                @if($editdesignCard)
                                                    @if($editdesignCard->back_image)
                                                        <img class="object-fit-cover" src="{{ $editdesignCard ? $editdesignCard->back_image : '' }}" id="result1" />
                                                    @else
                                                        <img class="object-fit-cover" id="result1" />
                                                    @endif
                                                @else
                                                    <img class="object-fit-cover" id="result1" />
                                                @endif 
                                            </div>
                                            <div class="mt-4">
                                                <label for="file">Back Image</label>
                                                <input type="hidden" name="back_image" id="back_crop_image">
                                                <input type="file" id="file1" accept="image/*" name="back_crop_image">
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <div class="object-fit-container">   
                                                @if($editdesignCard)
                                                    @if($editdesignCard->all_view_image)
                                                        <img class="object-fit-cover" src="{{ $editdesignCard ? $editdesignCard->all_view_image : '' }}" id="result2" />
                                                    @else
                                                        <img class="object-fit-cover" id="result2" />
                                                    @endif
                                                @else
                                                    <img class="object-fit-cover" id="result2" />
                                                @endif 
                                            </div>
                                            <div class="mt-4">
                                                <label for="file">All View Image</label>
                                                <input type="hidden" name="all_view_image" id="all_view_crop_image">
                                                <input type="file" id="file2" accept="image/*" name="all_view_crop_image">                                               
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group">
                                            <div class="mt-4">
                                                <label for="document_name">Design File</label>
                                                <input type="file" id="document_name" multiple name="design_files[]">
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
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pixelarity.css')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
            $("#main_table_row").on('input', '.main_txt_cal', function () {
                var calculated_total_sum = 0;
                
                $("#main_table_row .main_txt_cal").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }                  
                });
                $("#main_total_value").val(calculated_total_sum);
                console.log(calculated_total_sum);
            });

            $("#tab_table_row").on('input', '.tab_txt_cal', function () {
                var calculated_total_sum = 0;
                
                $("#tab_table_row .tab_txt_cal").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }                  
                });
                $("#tab_total_value").val(calculated_total_sum);
                console.log(calculated_total_sum);
            });

            $("#size_table_row").on('input', '.size_txt_cal', function () {
                var calculated_total_sum = 0;
                
                $("#size_table_row .size_txt_cal").each(function () {
                    var get_textbox_value = $(this).val();
                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }                  
                });
                $("#size_total_value").val(calculated_total_sum);
                console.log(calculated_total_sum);
            });

         
        });
        // var index = $("#form_row_count").val() || 0;
        var index = 0;
        $("#addRow").click(function () {
            index++;
            var html = '';
            html +='<tr id="inputFormRow">';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" name="needle['+index+'][needle_no]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" name="needle['+index+'][pantone]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="color" style="border-radius:.25rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" class="form-controls" name="needle['+index+'][color]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle['+index+'][color_shade]" value=""></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle['+index+'][denier]"  value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" name="needle['+index+'][a]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;" name="needle['+index+'][b]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle['+index+'][c]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle['+index+'][d]" value="" placeholder="Enter the value"></td>';
            html +='<td><input type="text" style="border-radius:.25rem; padding:.375rem .75rem; color: #495057; background-color: #fff;  border: 1px solid #ced4da;"  name="needle['+index+'][e]" value="" placeholder="Enter the value"></td>';
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
            var tablabel_val = $(this).val() == 'no' ? 'yes' : 'no';
            $("#tab_label").val(tablabel_val);
            $(".tab_label_input").toggleClass("d-none");
        });

        $("#size_label").on("change",function(){
            $(".size_label_input").toggleClass("d-none");
        });
    </script>
@stop
