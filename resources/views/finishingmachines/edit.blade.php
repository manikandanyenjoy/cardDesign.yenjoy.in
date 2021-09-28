@extends('adminlte::page')

@section('title', 'Edit finishingmachine')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Edit finishingmachine - ') . $finishingmachine->machine }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('finishingmachines.index') }}" class="btn bg-gradient-primary float-right">Back</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="">

                    @foreach (['danger', 'warning', 'success', 'info'] as $message)
                        @if(Session::has($message))
                            <div class="alert alert-{{ $message }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session($message) }}
                            </div>
                    @endif
                @endforeach

                <!-- general form elements -->
                    <div class="card card-primary" style="width: 850px;">
                        <div class="card-header">
                            <h3 class="card-title">Edit finishingmachine</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('finishingmachines.update', $finishingmachine->id) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-body row">

                           
                               <div class="form-group col-6">
                                    <label for="machine">Machine</label>
                                    <input type="text" class="form-control @error('machine') is-invalid @enderror" id="machine" name="machine" value="{{$finishingmachine->machine}}" placeholder="Machine">
                                    @error('machine')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="folds_available">Folds Available</label>
                                    <input type="text" class="form-control @error('folds_available') is-invalid @enderror" id="folds_available" name="folds_available" value="{{$finishingmachine->folds_available}}" placeholder="Folds Available">
                                    @error('folds_available')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="min_end_fold">Min End Fold</label>
                                    <input type="text" class="form-control @error('min_end_fold') is-invalid @enderror" id="min_end_fold" name="min_end_fold" value="{{$finishingmachine->min_end_fold}}" placeholder="Min End Fold">
                                    @error('min_end_fold')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="max_length_mm">Max Length mm</label>
                                    <input type="text" class="form-control @error('max_length_mm') is-invalid @enderror" id="max_length_mm" name="max_length_mm" value="{{$finishingmachine->max_length_mm}}" placeholder="Max Length mm">
                                    @error('max_length_mm')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="speed">Speed</label>
                                    <input type="text" class="form-control @error('speed') is-invalid @enderror" id="speed" name="speed" value="{{$finishingmachine->speed}}" placeholder="speed">
                                    @error('speed')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="year">Year</label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{$finishingmachine->year}}" placeholder="Year">
                                    @error('year')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="serial_Nos">Serial Nos</label>
                                    <input type="text" class="form-control @error('serial_Nos') is-invalid @enderror" id="serial_Nos" name="serial_Nos" value="{{$finishingmachine->serial_Nos}}" placeholder="Serial Nos">
                                    @error('serial_Nos')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{$finishingmachine->notes}}">{{$finishingmachine->notes}}</textarea>
                                    
                                    @error('notes')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                </div>
                                
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
@stop
