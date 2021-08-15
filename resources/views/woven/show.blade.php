@extends('adminlte::page')

@section('title', 'Design Card')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Design Card - ') . $woven->name}}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('folds.index') }}" class="btn bg-gradient-primary float-right">Back</a>
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
                            <h3 class="card-title">Name</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                    <div class="table_forms">
                                        <div class="table_wrp table-responsive">
                                            <table style="width: 1000px; margin: auto;" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding:0;">
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="150px"><strong>Customer</strong></td>
                                                                    <td width=400px>RT Exports</td>
                                                                    <td><strong>Date</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Label </strong></td>
                                                                    <td width=400px>Salt & Sweet</td>
                                                                    <td>28/06/2021</td>
                                                                </tr>
                                                            </table>
                                                            <!-- design details  -->
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="150px"><strong>Designer</strong></td>
                                                                    <td>Sathiyaraj</td>
                                                                    <td><strong>Design No</strong></td>
                                                                    <td>2558D</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Sales Rep</strong></td>
                                                                    <td>Govind</td>
                                                                    <td><strong>Quality</strong></td>
                                                                    <td>White</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Sample Weaver</strong></td>
                                                                    <td>
                                                                        <div style="float: left;">asd</div>
                                                                        <span style="float: left;padding: 0 10px;">/</span>
                                                                        <div style="float: left;">qwe</div>
                                                                        <span style="float: left;padding: 0 10px;">/</span>
                                                                        <div style="float: left;">qwe</div>
                                                                    </td>
                                                                    <td width="150px"><strong>Warp</strong></td>
                                                                    <td>White</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Picks/cm</strong></td>
                                                                    <td>
                                                                        <div> 28<span>/cm</span></div>
                                                                    </td>
                                                                    <td><strong>Total Pick</strong></td>
                                                                    <td>528 </td>
                                                                </tr>
                                                            </table>
                                                            <!-- design details  -->
                                                            <table width="100%">
                                                                <tr>
                                                                    <td><strong>Loom </strong></td>
                                                                    <td><strong>Muller</strong></td>
                                                                    <td><strong>Airjet 1.2 Mt</strong></td>
                                                                    <td><strong>Airjet 1.6 mt</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Total Repeats </strong></td>
                                                                    <td>20</td>
                                                                    <td>30</td>
                                                                    <td>40</td>
                                                                </tr>
                                                            </table>
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="150px"><strong>Wastage</strong></td>
                                                                    <td>No</td>
                                                                    <td><strong>Finishings</strong></td>
                                                                    <td>Centre fold </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Width mm</strong></td>
                                                                    <td>
                                                                        <div>38<span>mm</span></div>
                                                                    </td>
                                                                    <td><strong>Length mm</strong></td>
                                                                    <td>
                                                                        <div>38<span>mm</span></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Total Area Sq mm</strong></td>
                                                                    <td>2090</td>
                                                                    <td><strong>cost in roll</strong></td>
                                                                    <td>123</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Sq Inch </strong></td>
                                                                    <td>3.2</td>
                                                                    <td><strong>Cost /sq inch</strong></td>
                                                                    <td>45.31</td>
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
                                                                    <td width="100">0.58</td>
                                                                    <td>0.1</td>
                                                                    <td>0.75</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>1.43</td>
                                                                    <td>1.45</td>
                                                                </tr>
                                                            </table>
                                                            <!-- needle table  -->
                                                            <table width="100%">
                                                                <tr>
                                                                    <th width="70">Needle No/Pantone</th>
                                                                    <th width="100"></th>
                                                                    <th>Color Shade</th>
                                                                    <th>Denier</th>
                                                                    <th>A</th>
                                                                    <th>B</th>
                                                                    <th>C</th>
                                                                    <th>D</th>
                                                                    <th>E</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td style="background-color: red;"></td>
                                                                    <td>Red</td>
                                                                    <td>80</td>
                                                                    <td>Xy654</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td style="background-color: red;"></td>
                                                                    <td>Red</td>
                                                                    <td>80</td>
                                                                    <td>Xy654</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td style="background-color: red;"></td>
                                                                    <td>Red</td>
                                                                    <td>80</td>
                                                                    <td>Xy654</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
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
