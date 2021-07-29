@extends('adminlte::page')

@section('title', 'Buyers')

@section('content_header')
    <h1>{{ __('Buyers') }}</h1>
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
                            <h3 class="card-title">Buyers</h3>
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
                                    <th>Postal Code</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($buyers as $index => $buyer)
                                    <tr>
                                        <td>{{ $index + $buyers->firstItem() }}</td>
                                        <td>{{ $buyer->first_name }}</td>
                                        <td>{{ $buyer->last_name }}</td>
                                        <td>{{ $buyer->email }}</td>
                                        <td>{{ $buyer->location->name }}</td>
                                        <td>{{ $buyer->postal_code }}</td>
                                        <td>
                                            <a href="{{ route('buyers.show',$buyer->id) }}" class="btn btn-sm btn-warning">View</a>
                                            <a href="{{ route('buyers.edit',$buyer->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form method="POST" action="{{ route('buyers.destroy', $buyer->id) }}"
                                                  accept-charset="UTF-8"
                                                  style="display: inline-block; margin: auto"
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
<script>
    import RouterView from "vue-router";
    export default {
        components: { RouterView }
    }
</script>
