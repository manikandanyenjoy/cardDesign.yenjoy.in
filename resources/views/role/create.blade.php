@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-sm-7">
            <h1>{{ __('Role') }}</h1>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">

                @include('shared.errors')

                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $editRole ? __('Edit Role') : __('Create Role')  }}</h3>
                        </div>
                        <form method="POST" action="{{ $editRole ? route('role.update', $editRole->id) : route('role.store') }}" novalidate>
                            @if($editRole) @method('PUT') @endif
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label for="role_name">Role Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="role_name" name="name" value="{{ $editRole ? old('name',$editRole->name) : old('name') }}" placeholder="Role Name">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-md col-3">{{ $editRole ? __('Update') : __('Save')}}</button>
                                <a href="{{route('role.index')}}" class="btn btn-danger btn-md col-3">{{ __('Cancel')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

