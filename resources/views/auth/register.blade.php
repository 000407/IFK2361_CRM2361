@extends('_common.template')

@php
    $pageTitle = "Register";
@endphp

@section('content')
<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-6 text-center">
      <form class="row g-3" method="POST" action="{{ route('register_user') }}">
        @csrf
        <div class="col-md-6">
          <input type="text" placeholder="First Name (e.g. John)" class="form-control" id="txtFname" name="txtFname">
        </div>
        <div class="col-md-6">
          <input type="text" placeholder="Last Name (e.g. Doe)" class="form-control" id="txtLname" name="txtLname">
        </div>
        <div class="col-md-12">
          <input type="email" placeholder="Email (e.g. john@doe.com)" class="form-control" id="txtEmail" name="txtEmail">
        </div>
        <div class="col-md-12">
          <input type="password" placeholder="Password (8-12 characters)" class="form-control" id="txtPassword" name="txtPassword">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
    <div class="col"></div>
  </div>
</div>
@endsection