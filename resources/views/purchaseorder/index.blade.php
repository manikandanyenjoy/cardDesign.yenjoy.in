@extends('adminlte::page')

@section('title', 'Design Card')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Purchase Order list') }}</h1>
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
                        <h3 class="card-title">Purchase Order</h3>
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
                                <th>Customer</th>
                                <th>Label</th>
                                <th>Design No</th>
                                <th>Sales Representative</th>
                                <th>Created On</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $i = ($wovens->currentpage()-1)* $wovens->perpage() + 1; @endphp
                                @forelse ($wovens as $woven)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $woven->customerDetail ? ucwords($woven->customerDetail->company_name) : '-'}}</td>
                                        <td>{{ $woven->label ? ucwords($woven->label) : '-'}}</td>
                                        <td>{{ isset($woven->main_label['design_no']) ? $woven->main_label['design_no'] : '-'}}</td>
                                        <td>{{ $woven->salesRepDetail ? ucwords($woven->salesRepDetail->name) : '-'}}</td>
                                        <td>{{ $woven->date ? $woven->date : '-' }}</td>
                                        
                                        <td>
                                            <a href="{{ route('purchaseorder.show',$woven->id) }}" class="btn btn-sm btn-warning">View</a>
                                            
                                            <a href="{{ route('purchaseorder.edit',$woven->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            
                                        </td>
                                    </tr>
                                 @empty
                                    <tr>
                                        <th colspan="7" class="text-center">No Data Found...</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {!! $wovens->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
