@extends('adminlte::page')

@section('title', 'View Design Card')
<style> 
    .table_wrp input {
        width: 100%;
        border: 0;
        outline: none;
    }
    input.input_hlf {
        width: 40px;
        padding: 0;
    }
</style>
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-12 pr-4 d-flex justify-content-end">
            <a href="{{ route('woven.edit',$viewDesignCard->id) }}" class="btn col-1 bg-gradient-primary mr-3">Edit</a>
            <a href="{{ route('woven.index') }}" class="btn col-1 bg-gradient-danger">Back</a>
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
                            <h3 class="card-title">{{ __('View Design Card - ')}} <span class="font-weight-bold">{{ucfirst($viewDesignCard->label)}}</span></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap">
                                            <tr>
                                                <th>Customer</th>
                                                <td>{{ ucwords($viewDesignCard->customerDetail->full_name ) }}</td>
                                                <th>Label</th>
                                                <td>{{ ucwords($viewDesignCard->label ) }}</td>
                                                <th>Date</th>
                                                <td>{{ $viewDesignCard->date }}</td>
                                            </tr>

                                            <tr>
                                                <th>Designer</th>
                                                <td>{{ ucwords($viewDesignCard->designerDetail->name ) }}</td>
                                                <th>Sales Rep</th>
                                                <td>{{ ucwords($viewDesignCard->salesRepDetail->name ) }}</td>
                                                <th>Weaver</th>
                                                <td width="150px">
                                                    {{ isset($viewDesignCard->weaver[0]) ? $viewDesignCard->weaver[0] : '' }}{{ isset($viewDesignCard->weaver[1]) ? $viewDesignCard->weaver[1] : '' }}{{ isset($viewDesignCard->weaver[2]) ? $viewDesignCard->weaver[2] : '' }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Warp</th>
                                                <td>{{ ucwords($viewDesignCard->warpDetail->name ) }}</td>
                                                <th>Finishing</th>
                                                <td>{{ ucwords($viewDesignCard->finishing ) }}</td>
                                                <th>Notes</th>
                                                <td>{{ $viewDesignCard->description }}</td>
                                            </tr>
                                        </table>
                                                
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th></th>
                                                        <th>Main Label</th>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Design No</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[0]) ? $viewDesignCard->main_label[0] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <th width="200px">Quality</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[1]) ? $viewDesignCard->main_label[1] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <th width="200px">Picks/Cm</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[2]) ? $viewDesignCard->main_label[2] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Total Picks</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[3]) ? $viewDesignCard->main_label[3] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Total Repeat</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[4]) ? $viewDesignCard->main_label[4] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Wastage</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[5]) ? $viewDesignCard->main_label[5] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Width</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[6]) ? $viewDesignCard->main_label[6] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Length</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[7]) ? $viewDesignCard->main_label[7] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Sq mm</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[8]) ? $viewDesignCard->main_label[8] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Sq inch</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label[9]) ? $viewDesignCard->main_label[9] : '' }}</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Tab Label</th>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[0]) ? $viewDesignCard->tab_label[0] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[1]) ? $viewDesignCard->tab_label[1] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[2]) ? $viewDesignCard->tab_label[2] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[3]) ? $viewDesignCard->tab_label[3] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[4]) ? $viewDesignCard->tab_label[4] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[5]) ? $viewDesignCard->tab_label[5] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[6]) ? $viewDesignCard->tab_label[6] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[7]) ? $viewDesignCard->tab_label[7] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[8]) ? $viewDesignCard->tab_label[8] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label[9]) ? $viewDesignCard->tab_label[9] : '' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Size Label</th>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[0]) ? $viewDesignCard->size_label[0] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[1]) ? $viewDesignCard->size_label[1] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[2]) ? $viewDesignCard->size_label[2] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[3]) ? $viewDesignCard->size_label[3] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[4]) ? $viewDesignCard->size_label[4] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[5]) ? $viewDesignCard->size_label[5] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[6]) ? $viewDesignCard->size_label[6] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[7]) ? $viewDesignCard->size_label[7] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[8]) ? $viewDesignCard->size_label[8] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label[9]) ? $viewDesignCard->size_label[9] : '' }}</td>
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
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[0]) ? $viewDesignCard->add_on_main_cost[0] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[1]) ? $viewDesignCard->add_on_main_cost[1] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[2]) ? $viewDesignCard->add_on_main_cost[2] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[3]) ? $viewDesignCard->add_on_main_cost[3] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[4]) ? $viewDesignCard->add_on_main_cost[4] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[5]) ? $viewDesignCard->add_on_main_cost[5] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[6]) ? $viewDesignCard->add_on_main_cost[6] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost[7]) ? $viewDesignCard->add_on_main_cost[7] : '-' }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Tab</th>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[0]) ? $viewDesignCard->add_on_tab_cost[0] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[1]) ? $viewDesignCard->add_on_tab_cost[1] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[2]) ? $viewDesignCard->add_on_tab_cost[2] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[3]) ? $viewDesignCard->add_on_tab_cost[3] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[4]) ? $viewDesignCard->add_on_tab_cost[4] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[5]) ? $viewDesignCard->add_on_tab_cost[5] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[6]) ? $viewDesignCard->add_on_tab_cost[6] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost[7]) ? $viewDesignCard->add_on_tab_cost[7] : '-' }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Size</th>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[0]) ? $viewDesignCard->add_on_size_cost[0] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[1]) ? $viewDesignCard->add_on_size_cost[1] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[2]) ? $viewDesignCard->add_on_size_cost[2] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[3]) ? $viewDesignCard->add_on_size_cost[3] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[4]) ? $viewDesignCard->add_on_size_cost[4] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[5]) ? $viewDesignCard->add_on_size_cost[5] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[6]) ? $viewDesignCard->add_on_size_cost[6] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost[7]) ? $viewDesignCard->add_on_size_cost[7] : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

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
                                                </tr>
                                            </thead>
                                            <tbody id="add_new_row">
                                                @forelse($viewDesignCard->needle as $needle)
                                                    <tr id="inputFormRow">
                                                        <td>{{ $needle['needle_no_pantone'] ?? '-' }}</td>
                                                        <td>{{ $needle['column'] ?? '-' }}</td>
                                                        <td style="background:{{ $needle['color'] ?? '' }};"></td>
                                                        <td style="background:{{ $needle['color_shade'] ?? '' }};"></td>
                                                        <td>{{ $needle['denier'] ?? '-' }}</td>
                                                        <td>{{ $needle['a'] ?? '-' }}</td>
                                                        <td>{{ $needle['b'] ?? '-' }}</td>
                                                        <td>{{ $needle['c'] ?? '-' }}</td>
                                                        <td>{{ $needle['d'] ?? '-' }}</td>
                                                        <td>{{ $needle['e'] ?? '-' }}</td>
                                                    </tr>
                                                @empty
                                                   <tr>
                                                       <td colspan="9"></td>
                                                   </tr>
                                                @endforelse
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
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
