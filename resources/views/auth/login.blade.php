@extends('_common.template')

@php
    $pageTitle = "Login";
@endphp

@section('content')
<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-6 text-center">
      <div class="card">
        <div class="card-body">
          <form class="align-items-center" action="{{ route('authenticate_user') }}" method="POST">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password">
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>
            <a href="{{ route('pw_reset_page') }}">Forgot password?</a>
          </form>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>
</div>
@endsection