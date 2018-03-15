@extends('layouts.master')
@section('crumbs')
 <li class="breadcrumb-item">
          <a href="{{url('/main')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('/main/staffs')}}">Staffs</a>
        </li>
        <li class="breadcrumb-item active">Edit Staffs</li>
@endsection
@section('content')
<section class="content">   

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Staff</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('staffs.index') }}"> Back</a>

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


    <form action="{{ route('staffs.update',$staff->id) }}" method="POST">

        @csrf

        @method('PUT')
<div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $staff->name }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="form-group">

                                                <strong>Emp_Number:</strong>

                                                <input type="text" name="empno" class="form-control" placeholder="Employment Number" value="{{ $staff->empno }}">
                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="form-group">

                                                <strong>Emp_Date:</strong>

                                                <input type="text" name="empdate" class="form-control" placeholder="Employment Date" id="datepicker" width="276" value="{{ $staff->empdate }}">
                                            </div>

                                        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $staff->email }}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Phone:</strong>

                   <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $staff->phone }}">

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>


    </form>

    @endsection