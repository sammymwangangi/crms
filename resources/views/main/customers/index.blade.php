@extends('layouts.master')
@section('crumbs')
 <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Customers</li>
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Customers List</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('main/customers/create')}}"> Create New Customer</a>
            </div>
        </div>
    </div>
<br>

<div class="container">
	<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <td>#</td>
              <td>NAME</td>
              <td>EMAIL</td>
              <td>PHONE</td>
              <td>ADDRESS</td>
              <td >Action</td>
            </tr>
        </thead>
        <tbody>
        	@if(count($customers) > 0)
            @foreach($customers as $index=>$customer)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>
          
                    <div class="btn-group" role="group" aria-label="Basic example">
 <a href="{{action('CustomersController@edit',$customer->id)}}" class="pull-left btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
 &nbsp;
<form action="{{action('CustomersController@destroy', $customer->id)}}" method="customer">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-remove"></i></button>
                    </form>
</div>
                </td>
            </tr>
            @endforeach
            @else
		<p style="color: maroon;">No customers found!!!</p>

	
	@endif
        </tbody>
    </table>
	</div>
</div>


@endsection
