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
            <a href="{{ route('woven.edit',$woven->id) }}" class="btn col-1 bg-gradient-primary mr-3">Edit</a>
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
                            <h3 class="card-title">{{ __('View Design Card - ')}} <span class="font-weight-bold">{{ucfirst($woven->lable)}}</span></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table_forms">
                                <div class="table_wrp table-responsive">
                                    <table style="width: 95%; margin: auto;" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="padding:0;">
                                                    <table width="100%">
                                                        <tr>
                                                            <th width="150px">Customer</th>
                                                            <td width=400px>{{ucwords($woven->customerDetail->first_name)}}</td>
                                                            <th>Date</th>
                                                        </tr>
                                                        <tr>
                                                            <th width="150px">Label</th>
                                                            <td width=400px>{{ucwords($woven->lable)}}</td>
                                                            <td>{{$woven->date}}</td>
                                                        </tr>
                                                    </table>
                                                    <!-- design details  -->
                                                    <table width="100%">
                                                        <tr>
                                                            <th width="150px">Designer</th>
                                                            <td>{{ucwords($woven->designerDetail->name)}}</td>
                                                            <th>Design No</th>
                                                            <td>{{$woven->design_number}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="150px"><strong>Sales Rep</strong></td>
                                                            <td>{{ucwords($woven->salesRepDetail->name)}}</td>
                                                            <td><strong>Quality</strong></td>
                                                            <td>White</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="150px">Sample Weaver</td>
                                                            <td>
                                                             {{ucwords($woven->weaver_id)}}
                                                            </td>
                                                            <th width="150px">Warp</th>
                                                            <td>{{ucwords($woven->warpDetail->name)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Picks/cm</strong></td>
                                                            <td>
                                                                <div>{{ $woven->picks }}<span>/cm</span></div>
                                                            </td>
                                                            <td><strong>Total Pick</strong></td>
                                                            <td>{{ $woven->total_picks }} </td>
                                                        </tr>
                                                    </table>
                                                    <!-- design details  -->
                                                    <table width="100%">
                                                        <tr>
                                                            <th>Loom</th>
                                                            @foreach($woven->loom_id as $looms)
                                                                <th>{{$looms}}</h>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <th>Total Repeats</th>
                                                            @foreach($woven->total_repet as $totalRepet)
                                                                <td>{{$totalRepet}}</td>
                                                            @endforeach
                                                        </tr>
                                                    </table>
                                                    <table width="100%">
                                                        <tr>
                                                            <th width="150px">Wastage</th>
                                                            <td>{{$woven->wastage}}</td>
                                                            <td>Finishings</td>
                                                            <td>{{ucwords($woven->finishingDetail->machine)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="150px">Width mm</th>
                                                            <td>{{$woven->width}} mm</td>
                                                            <th>Length mm</th>
                                                            <td>{{$woven->length}} mm</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="150px">Total Area Sq mm</th>
                                                            <td>{{$woven->total_cost}}</td>
                                                            <th>Cost in roll</th>
                                                            <td>{{$woven->cost_in_roll}}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                           <th width="150px">Sq Inch</th>  
                                                            <td>{{$woven->sq_inch}}</td>
                                                            <th>Cost /sq inch</th>
                                                            <td>{{$woven->sq_inch}}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:0;" width="300px">
                                                    <div><img width="100%" src="./img.jpg" alt=""></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;" colspan="2">
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="70"><strong>Add ons</strong></td>
                                                            <td width="100"><strong>Basic</strong></td>
                                                            <td><strong>Cut fold</strong></td>
                                                            <td><strong>Diecut</strong></td>
                                                            <td><strong>Nonwoven</strong></td>
                                                            <td><strong>Iron on back</strong></td>
                                                            <td><strong>Extras</strong></td>
                                                            <td><strong>TOTAL</strong></td>
                                                            <td><strong>Offered </strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="70"><strong>Cost</strong></td>
                                                            <td width="100">{{ isset($woven->add_on_cast['0']) ?  $woven->add_on_cast['0'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['1']) ?  $woven->add_on_cast['1'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['2']) ?  $woven->add_on_cast['2'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['3']) ?  $woven->add_on_cast['3'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['4']) ?  $woven->add_on_cast['4'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['5']) ?  $woven->add_on_cast['5'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['6']) ?  $woven->add_on_cast['6'] : '-' }}</td>
                                                            <td>{{ isset($woven->add_on_cast['7']) ?  $woven->add_on_cast['7'] : '-' }}</td>
                                                        </tr>
                                                    </table>
                                                    <!-- needle table  -->
                                                    <table width="100%">
                                                        <tr>
                                                            <th width="70">Needle No/Pantone</th>
                                                            <th width="100">Color</th>
                                                            <th width="100">Color Shade</th>
                                                            <th>Denier</th>
                                                            <th>A</th>
                                                            <th>B</th>
                                                            <th>C</th>
                                                            <th>D</th>
                                                            <th>E</th>
                                                        </tr>
                                                        @forelse($woven->needle as $needle)
                                                            <tr>
                                                                <td>{{ $needle['needle_no_pantone'] }}</td>
                                                                <td><span style="padding:5px 40px; background-color:{{$needle['color']}}"></span></td>
                                                                <td><span style="padding:5px 40px; background-color:{{$needle['color_shade']}}"></span></td>
                                                                <td>{{ $needle['denier'] }}</td>
                                                                <td>{{ $needle['a'] }}</td>
                                                                <td>{{ $needle['b'] }}</td>
                                                                <td>{{ $needle['c'] }}</td>
                                                                <td>{{ $needle['d'] }}</td>
                                                                <td>{{ $needle['e'] }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr colspan="9">
                                                                <td>No Needle pantone found...</td>
                                                            </tr>
                                                        @endforelse
                                                    </table>
                                                    <!-- needle table  -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
