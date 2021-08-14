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
                    <div class="card card-primary" style="border: 2px solid;">
                        <div class="card-header">
                            <h3 class="card-title">Create Woven Design Card</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('woven.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-4">
                                    <label for="customer">Customer</label>
                                    <select class="form-control @error('customer') is-invalid @enderror" id="customer" name="customer">
                                    @foreach( $data['customer'] as $customer) 
                                    <option value="{{$customer['id']}}">{{$customer['first_name']}} </option>
                                    @endforeach
                                    </select>
                                  @error('customer')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-4">
                                    <label for="label">Label</label>
                                    <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label" value="{{old('label')}}" placeholder="label">
                                    @error('label')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{old('date')}}" placeholder="">
                                    @error('date')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="design_no">Design No</label>
                                    <input type="text" class="form-control @error('design_no') is-invalid @enderror" id="design_no" name="design_no" value="{{old('design_no')}}" placeholder="design_no">
                                     @error('design_no')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="designer">Designer</label>
                                    <select class="form-control @error('designer') is-invalid @enderror" id="designer" name="designer">
                                    @foreach( $data['designer'] as $designer) 
                                    <option value="{{$designer['id']}}">{{$designer['name']}} </option>
                                    @endforeach
                                    </select>
                                    @error('designer')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-4">
                                 <div class="object-fit-container">   
                                <img class="object-fit-cover"  id="result" />
                                 </div>
                                    <label for="file">Design Image</label>
                                    <input type="file" class="form-control @error('crap_image') is-invalid @enderror" id="file" name="crap_image" value="{{ old('crap_image') }}">
                                    @error('crap_image')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="sample_weaver">Sample Weaver</label>
                                    <select class="form-control @error('sample_weaver') is-invalid @enderror" id="sample_weaver" name="sample_weaver">
                                    @foreach( $data['designer'] as $designer) 
                                    <option value="{{$designer['id']}}">{{$designer['name']}} </option>
                                    @endforeach
                                    </select>
                                    @error('sample_weaver')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="pick">Pickc /cm</label>
                                    <input type="text" class="form-control @error('pick') is-invalid @enderror" id="pick" name="pick" value="{{old('pick')}}" placeholder="Pick">
                                    @error('pick')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                
                                    <label for="document_name">Design File</label>
                                    <input type="file" class="form-control @error('document_name') is-invalid @enderror" id="document_name" name="document_name" value="{{ old('document_name') }}">
                                    @error('document_name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <h6 style="font-size: 18px;font-weight: 600;">Wastage</h6>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes" name="wastage" >
                                    <label class="form-check-label">YES</label>
                                    
                                    <input class="form-check-input" type="radio" value="no" name="wastage" style="margin-left:35px;">
                                    <label class="form-check-label" style="margin-left:55px;">NO</label>
                                    </div>
                                    @error('wastage')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    
                                </div>
                                
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label for="name">Looms : </label>
                                </div>
                                <div class="form-group">
                                    <label for="name">Total Repeats :</label>
                                </div></div>
                                @foreach( $data['looms'] as $looms) 
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label >{{$looms['loom_name']}} </label>
                                    <input type="hidden" value="{{$looms['loom_name']}}" name="looms[]">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="total_repeat[]" value="{{old('name')}}" placeholder="">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                @endforeach

                                <div class="form-group col-4">
                                    <label for="finishings">Finishings</label>
                                    <select class="form-control @error('finishings') is-invalid @enderror" id="finishings" name="finishings">
                                    @foreach( $data['finishing'] as $finishing) 
                                    <option value="{{$finishing['id']}}">{{$finishing['machine']}} </option>
                                    @endforeach
                                    </select>
                                   @error('finishings')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="total_area">Total Area /sq mm</label>
                                    <input type="text" class="form-control @error('total_area') is-invalid @enderror" id="total_area" name="total_area" value="{{old('total_area')}}" placeholder="Total Area">
                                    @error('total_area')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="length">Length mm</label>
                                    <input type="text" class="form-control @error('length') is-invalid @enderror" id="length" name="length" value="{{old('length')}}" placeholder="Length">
                                    @error('length')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="sq_inch">Sq Inch </label>
                                    <input type="text" class="form-control @error('sq_inch') is-invalid @enderror" id="sq_inch" name="sq_inch" value="{{old('sq_inch')}}" placeholder="sq inch">
                                    @error('sq_inch')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>  
                                

                                
                                
                                
                                <div class="form-group col-4">
                                    <label for="sales_rep">Sales Rep</label>
                                    <select class="form-control @error('sales_rep') is-invalid @enderror" id="sales_rep" name="sales_rep">
                                    @foreach( $data['salesrep'] as $salesrep) 
                                    <option value="{{$salesrep['id']}}">{{$salesrep['name']}} </option>
                                    @endforeach
                                    </select>
                                    @error('sales_rep')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="warp">Warp</label>
                                    <select class="form-control @error('warp') is-invalid @enderror" id="warp" name="warp">
                                    @foreach( $data['warp'] as $warp) 
                                    <option value="{{$warp['id']}}">{{$warp['name']}} </option>
                                    @endforeach
                                    </select>
                                    @error('warp')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="total_pick">Total Pick</label>
                                    <input type="text" class="form-control @error('total_pick') is-invalid @enderror" id="total_pick" name="total_pick" value="{{old('total_pick')}}" placeholder="total_pick">
                                    @error('total_pick')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-4">
                                    <label for="customer_grade">Customer Grade</label>
                                    <select class="form-control @error('customer_grade') is-invalid @enderror" id="customer_grade" name="customer_grade">
                                   
                                    <option value="A">A </option>
                                    <option value="B">B </option>
                                    <option value="C">C </option>
                                   
                                    </select>
                                    
                                    @error('customer_grade')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-4">
                                    <label for="catagory">Catogery</label>
                                    <select class="form-control @error('catogery') is-invalid @enderror" id="catagory" name="catagory">
                                    <option value="A">1 </option>
                                    <option value="B">2 </option>
                                    <option value="C">3 </option>
                                    </select>
                                    <input type="text" >
                                    @error('catagory')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                 <div class="form-group col-4">
                                    <label for="cast_inch">Cast /sq inch</label>
                                    <input type="text" class="form-control @error('cast_inch') is-invalid @enderror" id="cast_inch" name="cast_inch" value="{{old('cast_inch')}}" placeholder="Cast Sq inch">
                                    @error('cast_inch')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-4">
                                    <label for="width">Width mm</label>
                                    <input type="text" class="form-control @error('width') is-invalid @enderror" id="width" name="width" value="{{old('width')}}" placeholder="width">
                                    @error('width')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>                             
                                
                                                      
                                </div>
                            
                            <div class="card-body row">
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label for="name">Add ons </label>
                                </div>
                                <div class="form-group">
                                    <label for="name">Cost</label>
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label>Basic </label>
                                    <input type="text" class="form-control @error('add_on_cast') is-invalid @enderror" name="add_on_cast[]" value="{{old('add_on_cast[]')}}">
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label >Cut fold </label>
                                    <input type="text" class="form-control @error('add_on_cast') is-invalid @enderror" name="add_on_cast" value="{{old('add_on_cast')}}">
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label >Diecut </label>
                                    <input type="text" class="form-control @error('add_on_cast[]') is-invalid @enderror" id="name" name="add_on_cast[]" value="{{old('add_on_cast[]')}}">
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label >Nonwoven </label>
                                    <input type="text" class="form-control @error('add_on_cast[]') is-invalid @enderror" name="add_on_cast[]" value="{{old('add_on_cast[]')}}">
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <label>Iron on back </label>
                                    <input type="text" class="form-control @error('add_on_cast[]') is-invalid @enderror" name="add_on_cast[]" value="{{old('add_on_cast[]')}}" >
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label >Extras </label>
                                    <input type="text" class="form-control @error('add_on_cast[]') is-invalid @enderror" name="add_on_cast[]" value="{{old('add_on_cast[]')}}" >
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label>TOTAL </label>
                                    <input type="text" class="form-control @error('add_on_cast[]') is-invalid @enderror" name="add_on_cast[]" value="{{old('add_on_cast[]')}}" >
                                    @error('add_on_cast[]')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <label>Offered  </label>
                                    <input type="text" class="form-control @error('add_on_cast[]') is-invalid @enderror" name="add_on_cast[]" value="{{old('add_on_cast[]')}}">
                                    @error('add_on_cast[]')
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
                                    <input type="text" class="form-control @error('needle') is-invalid @enderror"  name="needle[]" value="{{old('needle')}}" placeholder="">
                                    @error('needle')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('color') is-invalid @enderror"  name="needle[]">
                                    @error('color')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-2" > 
                                 <div class="form-group">
                                    <input type="color" class="form-control @error('color_shade') is-invalid @enderror" name="needle[]">
                                    @error('color_shade')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('denier') is-invalid @enderror" name="needle[]">
                                    @error('denier')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('field_a') is-invalid @enderror" name="needle[]">
                                    @error('field_a')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('field_b') is-invalid @enderror" name="needle[]">
                                    @error('field_b')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('field_c') is-invalid @enderror" name="needle[]">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('field_d') is-invalid @enderror" name="needle[]">
                                    @error('field_d')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-1" > 
                                 <div class="form-group">
                                    <input type="text" class="form-control @error('field_e') is-invalid @enderror" name="needle[]">
                                    @error('field_e')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <button type="button" style="height:36px;" class="btn btn-warning float-right" id="addRow">Add Row</button>
                            </div>
                            
                            <div id="newRow">

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
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="{{asset('css/pixelarity.css')}}">
		
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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div class="card-body row" id="inputFormRow">';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-2" > ';
        html += '<div class="form-group">';
        html += '<input type="color" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<div class="col-md-1" > ';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control @error("needle") is-invalid @enderror"  name="needle[]" value="{{old("needle")}}">';
        html += '</div></div>';
        html += '<button id="removeRow" style="height:36px;" class="btn btn-danger float-right" type="button">remove Row</button>';
        html += '</div>';
        
        $('#newRow').append(html);
    });

    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script> 
@stop
