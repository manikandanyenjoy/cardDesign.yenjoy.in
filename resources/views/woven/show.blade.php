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
                                                    {{ isset($viewDesignCard->weaver[0]) ? $viewDesignCard->weaver[0] : '' }},{{ isset($viewDesignCard->weaver[1]) ? $viewDesignCard->weaver[1] : '' }},{{ isset($viewDesignCard->weaver[2]) ? $viewDesignCard->weaver[2] : '' }}
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
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['design_no']) ? $viewDesignCard->main_label['design_no'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <th width="200px">Quality</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['quality']) ? $viewDesignCard->main_label['quality'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <th width="200px">Picks/Cm</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['picks']) ? $viewDesignCard->main_label['picks'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Total Picks</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['total_picks']) ? $viewDesignCard->main_label['total_picks'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <th width="200px">Total Repeat</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['total_repeat'][0]) ? $viewDesignCard->main_label['total_repeat'][0] : '' }},{{ $viewDesignCard && isset($viewDesignCard->main_label['total_repeat'][1]) ? $viewDesignCard->main_label['total_repeat'][1] : '' }},{{ $viewDesignCard && isset($viewDesignCard->main_label['total_repeat'][1]) ? $viewDesignCard->main_label['total_repeat'][1] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Wastage</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['wastage']) ? $viewDesignCard->main_label['wastage'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Width</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['width']) ? $viewDesignCard->main_label['width'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Length</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['length']) ? $viewDesignCard->main_label['length'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Sq mm</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['sq_mm']) ? $viewDesignCard->main_label['sq_mm'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <th width="200px">Sq inch</th>
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->main_label['sq_inch']) ? $viewDesignCard->main_label['sq_inch'] : '' }}</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Tab Label</th>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['design_no']) ? $viewDesignCard->tab_label['design_no'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['quality']) ? $viewDesignCard->tab_label['quality'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['picks']) ? $viewDesignCard->tab_label['picks'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['total_picks']) ? $viewDesignCard->tab_label['total_picks'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['total_repeat'][0]) ? $viewDesignCard->tab_label['total_repeat'][0] : '' }},{{ $viewDesignCard && isset($viewDesignCard->tab_label['total_repeat'][1]) ? $viewDesignCard->tab_label['total_repeat'][1] : '' }},{{ $viewDesignCard && isset($viewDesignCard->tab_label['total_repeat'][1]) ? $viewDesignCard->tab_label['total_repeat'][1] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['wastage']) ? $viewDesignCard->tab_label['wastage'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['width']) ? $viewDesignCard->tab_label['width'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['length']) ? $viewDesignCard->tab_label['length'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['sq_mm']) ? $viewDesignCard->tab_label['sq_mm'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->tab_label['sq_inch']) ? $viewDesignCard->tab_label['sq_inch'] : '' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Size Label</th>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['design_no']) ? $viewDesignCard->size_label['design_no'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['quality']) ? $viewDesignCard->size_label['quality'] : '' }}</td>
                                                    </tr>
                                                    
                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['picks']) ? $viewDesignCard->size_label['picks'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['total_picks']) ? $viewDesignCard->size_label['total_picks'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['total_repeat'][0]) ? $viewDesignCard->size_label['total_repeat'][0] : '' }},{{ $viewDesignCard && isset($viewDesignCard->size_label['total_repeat'][1]) ? $viewDesignCard->size_label['total_repeat'][1] : '' }},{{ $viewDesignCard && isset($viewDesignCard->size_label['total_repeat'][1]) ? $viewDesignCard->size_label['total_repeat'][1] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['wastage']) ? $viewDesignCard->size_label['wastage'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['width']) ? $viewDesignCard->size_label['width'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['length']) ? $viewDesignCard->size_label['length'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['sq_mm']) ? $viewDesignCard->size_label['sq_mm'] : '' }}</td>
                                                    </tr>

                                                    <tr class="main_label_input">
                                                        <td width="200px">{{ $viewDesignCard && isset($viewDesignCard->size_label['sq_inch']) ? $viewDesignCard->size_label['sq_inch'] : '' }}</td>
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
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['basic']) ? $viewDesignCard->add_on_main_cost['basic'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['cut_fold']) ? $viewDesignCard->add_on_main_cost['cut_fold'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['diecut']) ? $viewDesignCard->add_on_main_cost['diecut'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['nonwoven']) ? $viewDesignCard->add_on_main_cost['nonwoven'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['iron_on_back']) ? $viewDesignCard->add_on_main_cost['iron_on_back'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['extra']) ? $viewDesignCard->add_on_main_cost['extra'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['total']) ? $viewDesignCard->add_on_main_cost['total'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_main_cost['offered']) ? $viewDesignCard->add_on_main_cost['offered'] : '-' }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Tab</th>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['basic']) ? $viewDesignCard->add_on_tab_cost['basic'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['cut_fold']) ? $viewDesignCard->add_on_tab_cost['cut_fold'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['diecut']) ? $viewDesignCard->add_on_tab_cost['diecut'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['nonwoven']) ? $viewDesignCard->add_on_tab_cost['nonwoven'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['iron_on_back']) ? $viewDesignCard->add_on_tab_cost['iron_on_back'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['extra']) ? $viewDesignCard->add_on_tab_cost['extra'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['total']) ? $viewDesignCard->add_on_tab_cost['total'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_tab_cost['offered']) ? $viewDesignCard->add_on_tab_cost['offered'] : '-' }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Size</th>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['basic']) ? $viewDesignCard->add_on_size_cost['basic'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['cut_fold']) ? $viewDesignCard->add_on_size_cost['cut_fold'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['diecut']) ? $viewDesignCard->add_on_size_cost['diecut'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['nonwoven']) ? $viewDesignCard->add_on_size_cost['nonwoven'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['iron_on_back']) ? $viewDesignCard->add_on_size_cost['iron_on_back'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['extra']) ? $viewDesignCard->add_on_size_cost['extra'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['total']) ? $viewDesignCard->add_on_size_cost['total'] : '-' }}</td>
                                                    <td>{{ $viewDesignCard && isset($viewDesignCard->add_on_size_cost['offered']) ? $viewDesignCard->add_on_size_cost['offered'] : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-bordered text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Needle No</th>
                                                    <th>Pantone</th>
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
                                                        <td>{{ $needle['needle_no'] ?? '-' }}</td>
                                                        <td>{{ $needle['pantone'] ?? '-' }}</td>
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
                                        <label>Front Image</label>
                                        <div class="object-fit-container">   
                                            <img class="object-fit-cover"  id="result" />
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group">
                                        <label>Back Image</label>
                                        <div class="object-fit-container">   
                                            <img class="object-fit-cover"  id="result" />
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group">
                                        <label>All View Image</label>
                                        <div class="object-fit-container">   
                                            <img class="object-fit-cover"  id="result" />
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group">
                                        <div class="mt-4">
                                            <label for="document_name">Design File</label>
                                            @if(count($viewDesignCard->design_file) > 0)
                                                @foreach($viewDesignCard->design_file as $designFile)
                                                    <p>{{ $designFile."," }}</p>
                                                @endforeach
                                            @endif
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
