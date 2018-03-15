@extends('layouts.master')
@section('crumbs')
 <li class="breadcrumb-item">
          <a href="{{url('/main')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/main/customers')}}">Customers</a>
        </li>
        <li class="breadcrumb-item active">Create Customers</li>
@endsection
@section('content')
<section class="content">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Customer</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form method="post" action="{{ route('customers.store')}} ">

        @csrf


         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>
    <div class="input-group">
    <input type="text" class="form-control" id="datepicker" placeholder="Y-m-d" placeholder="Username">
     <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
    </div>
  </div>
                    <input type="text" name="name" class="form-control" placeholder="Name">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email" name="email" class="form-control" placeholder="Email">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Phone:</strong>

                   <input type="text" name="phone" class="form-control" placeholder="Phone">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Address:</strong>

                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>


    </form>

@endsection

