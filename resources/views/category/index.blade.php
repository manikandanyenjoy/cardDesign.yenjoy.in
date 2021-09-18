@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-md-12">
                <h1 class="float-left font-weight-bold">Categories</h1>
                <div class="float-right">
                    <a href="{{ route('category.create') }}" class="btn bg-gradient-primary float-right">Add Category</a>
                </div>
            </div>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Category</h3>
                      <form class="float-right">
                          <input class="" type="text" name="search" >
                          <button class="btn btn-sm btn-info" type="submit">
                            search
                          </button>
                      </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">S.No</th>
                                <th>Category</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = ($categories->currentpage()-1)* $categories->perpage() + 1; @endphp
                                @forelse ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ ucwords($category->category_name) }}</td>
                                        <td>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                                accept-charset="UTF-8"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Are you sure do you want to delete?');">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="3" class="text-center">No Data Found...</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {!! $categories->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
