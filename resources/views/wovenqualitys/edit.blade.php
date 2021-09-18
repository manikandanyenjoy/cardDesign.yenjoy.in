@extends('adminlte::page')

@section('title', 'Edit wovenquality')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Edit wovenquality - ') . $wovenquality->colour }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('wovenqualitys.index') }}" class="btn bg-gradient-primary float-right">Back</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1">

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
                            <h3 class="card-title">Edit wovenquality</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('wovenqualitys.update', $wovenquality->id) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-body row">

                            <div class="col-md-6" style=""> 
                            <div class="form-group">
                                    <label for="quality">Quality</label>
                                    <input type="text" class="form-control @error('quality') is-invalid @enderror" id="quality" name="quality" value="{{$wovenquality->quality}}" placeholder="Quality">
                                    @error('quality')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="material">Material</label>
                                    <input type="text" class="form-control @error('material') is-invalid @enderror" id="material" name="material" value="{{$wovenquality->material}}" placeholder="Material">
                                    @error('material')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{$wovenquality->notes}}">{{$wovenquality->notes}}</textarea>
                                    
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
