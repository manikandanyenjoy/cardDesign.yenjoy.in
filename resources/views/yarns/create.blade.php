@extends('adminlte::page')

@if($editYarn)
    @section('title', 'Edit Raw Material')
@else
    @section('title', 'Create Raw Material')
@endif

@section('content_header')
    <div class="row justify-content-center mb-1">
        <div class="col-md-8">
            <h1 class="float-left ml-2 font-weight-bold">
                @if($editYarn)
                {{ __('Edit Raw Material - ') . ucfirst($editYarn->supplier)}}
                @else
                {{ __('Create Raw Material') }}
                @endif
            </h1>
            <div class="float-right">
                @if($editYarn)
                    <a href="{{ route('yarns.show',$editYarn->id) }}" class="btn bg-gradient-success btn-md mr-2">{{ __('View') }}</a>
                @endif
                <a href="{{ route('yarns.index') }}" class="btn bg-gradient-danger btn-md mr-2">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach (['danger', 'warning', 'success', 'info'] as $message)
                        @if(Session::has($message))
                            <div class="alert alert-{{ $message }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session($message) }}
                            </div>
                        @endif
                    @endforeach

                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> {{ $editYarn ? 'Edit Raw Material' : 'Create Raw Material' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form method="POST" action="{{ $editYarn ? route('yarns.update', $editYarn->id) : route('yarns.store')  }}" novalidate>
                                @csrf
                                @if($editYarn) @method('PUT') @endif
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="supplier">Supplier Name</label>
                                        <input type="text" class="form-control @error('supplier') is-invalid @enderror" id="supplier" name="supplier" value="{{ $editYarn ? old('supplier',$editYarn->supplier) : old('supplier') }}" placeholder="Supplier Name">
                                        @error('supplier')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="yarn_denier">Yarn Denier</label>
                                        <input type="text" class="form-control @error('yarn_denier') is-invalid @enderror" id="yarn_denier" name="yarn_denier" value="{{ $editYarn ? old('yarn_denier',$editYarn->yarn_denier) : old('yarn_denier') }}" placeholder="Yarn Denier">
                                        @error('yarn_denier')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="shade_No">Shade No</label>
                                        <input type="text" class="form-control @error('shade_No') is-invalid @enderror" id="shade_No" name="shade_No" value="{{ $editYarn ? old('shade_No',$editYarn->shade_No) : old('shade_No') }}" placeholder="Shade No">
                                        @error('shade_No')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="yarn_color">Yarn Color</label><!-- #ff0000 -->
                                        <input type="color" class="form-control @error('yarn_color') is-invalid @enderror" id="yarn_color" name="yarn_color" value="{{ $editYarn ? old('yarn_color',$editYarn->yarn_color) : old('yarn_color') }}" placeholder="Yarn Color">
                                        @error('yarn_color')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="color_shade">Color Shade</label>
                                        <input type="text" class="form-control @error('color_shade') is-invalid @enderror" id="color_shade" name="color_shade" value="{{ $editYarn ? old('color_shade',$editYarn->color_shade) : old('color_shade') }}" placeholder="Color Shade">
                                        @error('color_shade')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="notes">Notes</label>
                                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ $editYarn ? old('notes',$editYarn->notes) : old('notes') }}</textarea>
                                        @error('notes')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-primary btn-md col-2 float-right">{{ $editYarn ? 'Update' : 'Save'}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
