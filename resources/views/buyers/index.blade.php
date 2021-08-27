@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Customers') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('buyers.create') }}" class="btn bg-gradient-primary float-right">{{ __('Add Customer') }}</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('shared.errors')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Customers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th style="width: 50px">S.No</th>
                                    <th>Company Name</th>
                                    <th>FullName</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i = ($buyers->currentpage()-1)* $buyers->perpage() + 1; @endphp

                                    @forelse ($buyers as $buyer)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ ucwords($buyer->company_name) }}</td>
                                            <td>{{ ucfirst($buyer->full_name) }}</td>
                                            <td>{{ $buyer->email }}</td>
                                            <td>{{ $buyer->mobile_number }}</td>
                                        
                                            <td>
                                                <a href="{{ route('buyers.show',$buyer->id) }}" class="btn btn-sm btn-warning">View</a>
                                                <a href="{{ route('buyers.edit',$buyer->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form method="POST" action="{{ route('buyers.destroy', $buyer->id) }}"
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
                                            <td colspan="6" class="text-center">{{ __('No data Found...') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="float-right">
                                {!! $buyers->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
