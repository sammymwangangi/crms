@extends('layouts.master')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Product Details</h2>

            </div>

         <div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    
    <img style="width: 200px; height: 200px;" class="img-responsive" src="{{asset('images/products/'.$product->image)}}">

    <h1 class="display-4">{{ $product->name }}</h1>

    <p class="lead">{{ $product->description }}</p>

    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
  </div>
</div>

@endsection

