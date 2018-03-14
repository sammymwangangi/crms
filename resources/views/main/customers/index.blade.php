@extends('layouts.master')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Customers List</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('main/customers/create')}}"> Create New Customer</a>
            </div>
        </div>
    </div>
<br>

<div class="container">
	<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <td>ID</td>
              <td>USER_ID</td>
              <td>NAME</td>
              <td>EMAIL</td>
              <td>PHONE</td>
              <td>ADDRESS</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
        	@if(count($customers) > 0)
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->user_id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td><a href="{{action('CustomersController@edit',$customer->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('CustomersController@destroy', $customer->id)}}" method="customer">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            {{ $customers->links() }}
            @else
		<p style="color: maroon;">No customers found!!!</p>

	
	@endif
        </tbody>
    </table>
	</div>
</div>


@endsection