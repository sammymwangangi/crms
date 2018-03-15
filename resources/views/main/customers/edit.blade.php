 @extends('layouts.master')
@section('crumbs')
 <li class="breadcrumb-item">
          <a href="{{url('/main')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/main/customers')}}">Customers</a>
        </li>
        <li class="breadcrumb-item active">Edit Customers</li>
@endsection
@section('content')
<section class="content">   

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Customer</h2>

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


    <form action="{{ route('customers.update',$customer->id) }}" method="POST">

        @csrf

        @method('PUT')
<div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $customer->name }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $customer->email }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Phone:</strong>

                   <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $customer->phone }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Address:</strong>

                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $customer->address }}">
                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>


    </form>

    @endsection