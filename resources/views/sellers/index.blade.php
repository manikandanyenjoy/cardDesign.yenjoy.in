@extends('adminlte::page')

@section('title', 'Sellers')

@section('content_header')
    <h1>{{ __('Sellers') }}</h1>
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
                            <h3 class="card-title">Sellers</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Subscription</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($sellers as $index => $seller)
                                    <tr>
                                        <td>{{ $index + $sellers->firstItem() }}</td>
                                        <td>{{ $seller->first_name }}</td>
                                        <td>{{ $seller->last_name }}</td>
                                        <td>{{ $seller->email }}</td>
                                        <td>{{ $seller->location->name }}</td>
                                        <td>{{ $seller->subscriptionPlan->name }}</td>
                                        <td>
                                            <a href="{{ route('sellers.show',$seller->id) }}" class="btn btn-sm btn-warning">View</a>
                                            <a href="{{ route('sellers.edit',$seller->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form method="POST" action="{{ route('sellers.destroy', $seller->id) }}"
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
                                        <td colspan="7" class="text-center">{{ __('No data available') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="float-right">
                                {!! $sellers->links() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
