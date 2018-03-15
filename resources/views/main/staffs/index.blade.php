@extends('layouts.master')
@section('crumbs')
 <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">staffs</li>
@endsection
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Staff List</h1>
            </div>
            <div class="pull-right">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                      Create New Staff
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <form method="post" action="{{ route('staffs.store')}} ">

                                    @csrf


                                     <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="form-group">

                                                <strong>Name:</strong>

                                                <input type="text" name="name" class="form-control" placeholder="Name">

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="form-group">

                                                <strong>Emp_Number:</strong>

                                                <input type="text" name="empno" class="form-control" placeholder="Employment Number">
                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <div class="form-group">

                                                <strong>Emp_Date:</strong>

                                                <input type="text" name="empdate" class="form-control" placeholder="Employment Date" id="datepicker" width="276">
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


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                                <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>

                                    </div>


                                </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
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
              <td>EMP_NUMBER</td>
              <td>EMP_DATE</td>
              <td>EMAIL</td>
              <td>PHONE</td>
              <td >Action</td>
            </tr>
        </thead>
        <tbody>
        	@if(count($staffs) > 0)
            @foreach($staffs as $index=>$staff)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$staff->name}}</td>
                <td>{{$staff->empno}}</td>
                <td>{{$staff->empdate}}</td>
                <td>{{$staff->email}}</td>
                <td>{{$staff->phone}}</td>
                <td>
          
                    <div class="btn-group" role="group" aria-label="Basic example">
 <a href="{{action('StaffController@edit',$staff->id)}}" class="pull-left btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
 &nbsp;
<form action="{{action('StaffController@destroy', $staff->id)}}" method="staff">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-remove"></i></button>
                    </form>
</div>
                </td>
            </tr>
            @endforeach
            @else
		<p style="color: maroon;">No staffs found!!!</p>

	
	@endif
        </tbody>
    </table>
	</div>
</div>


@endsection
