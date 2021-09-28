@extends('adminlte::page')

@if($editCategory)
    @section('title', 'Edit Category')
@else
    @section('title', 'Create Category')
@endif

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-sm-7">
            <h1>{{ __('Category') }}</h1>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">

                @include('shared.errors')

                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $editCategory ? __('Edit Category') : __('Create Category')  }}</h3>
                        </div>
                        <form method="POST" action="{{ $editCategory ? route('category.update', $editCategory->id) : route('category.store') }}" novalidate>
                            @if($editCategory) @method('PUT') @endif
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-4">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ $editCategory ? old('category_name',$editCategory->category_name) : old('category_name') }}" placeholder="Category Name">
                                    @error('category_name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-md col-3">{{ $editCategory ? __('Update') : __('Save')}}</button>
                                <a href="{{route('category.index')}}" class="btn btn-danger btn-md col-3">{{ __('Cancel')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

