@extends('adminlte::page')

@section('title', 'Edit Woven')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Edit Woven - ') . $woven->lable }}</h1>
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

                    @foreach (['danger', 'warning', 'success', 'info'] as $message)
                        @if(Session::has($message))
                            <div class="alert alert-{{ $message }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session($message) }}
                            </div>
                    @endif
                @endforeach

                <!-- general form elements -->
                    <div class="card card-primary" >
                        <div class="card-header">
                            <h3 class="card-title">Edit Design Card</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('woven.update', $woven->id) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-body row"  style=" overflow: scroll;margin: 15px;" >

                                   <div class="table_forms">
                                        <div class="table_wrp table-responsive">
                                            <table style="width: 1000px; margin: auto;" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding:0;">
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="150px"><strong>Customer</strong></td>
                                                                    <td width=300px>
                                                                        <select class=" @error('customer') is-invalid @enderror" id="customer" name="customer">
                                                                            @foreach( $data['customer'] as $customer) 
                                                                            <option value="{{$customer['id']}}">{{$customer['first_name']}} </option>
                                                                            @endforeach
                                                                            </select>
                                                                          @error('customer')
                                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                    </td>
                                                                    <td width="150px" ><strong>Date</strong></td>
                                                                     <td width="150px" >
                                                                        <input type="date" class=" @error('date') is-invalid @enderror" id="date" name="date" value="{{$woven->date}}" placeholder="">
                                                                        @error('date')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Label </strong></td>
                                                                    <td width=300px>
                                                                        <input type="text" class=" @error('label') is-invalid @enderror" id="label" name="label" value="{{$woven->lable}}" placeholder="label">
                                                                            @error('label')
                                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                    </td>
                                                                    <td colspan="2">
                                                                        
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- design details  -->
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="150px"><strong>Designer</strong></td>
                                                                    <td>
                                                                        
                                                                        <select class=" @error('designer') is-invalid @enderror" id="designer" name="designer">
                                                                        @foreach( $data['designer'] as $designer) 
                                                                        <option value="{{$designer['id']}}">{{$designer['name']}} </option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('designer')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td><strong>Design No</strong></td>
                                                                    <td>
                                                                     <input type="text" class=" @error('design_no') is-invalid @enderror" id="design_no" name="design_no" value="{{old('design_no')}}" placeholder="DH546">
                                                                         @error('design_no')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                         @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Sales Rep</strong></td>
                                                                    <td>
                                                                        <select class=" @error('sales_rep') is-invalid @enderror" id="sales_rep" name="sales_rep">
                                                                        @foreach( $data['salesrep'] as $salesrep) 
                                                                        <option value="{{$salesrep['id']}}">{{$salesrep['name']}} </option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('sales_rep')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td><strong>Quality</strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Sample Weaver</strong></td>
                                                                    <td>
                                                                        <div style="float: left;"><input class="input_hlf" placeholder="value"
                                                                                type="text"></div>
                                                                        <span style="float: left;padding: 0 10px;">/</span>
                                                                        <div style="float: left;"><input class="input_hlf" placeholder="value"
                                                                                type="text"></div>
                                                                        <span style="float: left;padding: 0 10px;">/</span>
                                                                        <div style="float: left;"><input class="input_hlf" placeholder="value"
                                                                                type="text"></div>
                                                                    </td>
                                                                    <td width="150px"><strong>Warp</strong></td>
                                                                    <td>
                                                                        <select class=" @error('warp') is-invalid @enderror" id="warp" name="warp">
                                                                        @foreach( $data['warp'] as $warp) 
                                                                        <option value="{{$warp['id']}}">{{$warp['name']}} </option>
                                                                        @endforeach
                                                                        </select>
                                                                        @error('warp')
                                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Picks/cm</strong></td>
                                                                    <td>
                                                                        <div> 
                                                                        
                                                                          <input type="text" class="@error('pick') is-invalid @enderror" id="pick" name="pick" value="{{old('pick')}}" placeholder="Pick"> <span>/cm</span>
                                                                            @error('pick')
                                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                       
                                                                        </div>
                                                                    </td>
                                                                    <td><strong>Total Pick</strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"> </td>
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
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                            </table>
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="150px"><strong>Wastage</strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><strong>Finishings</strong></td>
                                                                    <td>Centre fold </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Width mm</strong></td>
                                                                    <td>
                                                                        <div><input type="text" placeholder="Enter the value"></div>
                                                                    </td>
                                                                    <td><strong>Length mm</strong></td>
                                                                    <td>
                                                                        <input type="text" placeholder="Enter the value">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Total Area Sq mm</strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><strong>cost in roll</strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="150px"><strong>Sq Inch </strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><strong>Cost /sq inch</strong></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td style="padding:0;" width="300px">
                                                            
                                                            <div class="form-group ">
                                                             <div class="object-fit-container">   
                                                            <img class="object-fit-cover"  id="result" />
                                                             </div>
                                                                <label for="file">Design Image</label>
                                                                <input type="file" class=" @error('crap_image') is-invalid @enderror" id="file" name="crap_image" value="{{ old('crap_image') }}">
                                                                @error('crap_image')
                                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div> 
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
                                                                    <td width="100"><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
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
                                                                    <td><input type="color"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td style="background-color: red;"></td>
                                                                    <td><input type="color"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td style="background-color: red;"></td>
                                                                    <td><input type="color"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td></td>
                                                                    <td><input type="color"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
                                                                    <td><input type="text" placeholder="Enter the value"></td>
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
                            <!-- /.card-body -->
                            
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
