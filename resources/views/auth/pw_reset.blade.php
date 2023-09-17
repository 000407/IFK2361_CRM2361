@extends('_common.template')

@php
    $pageTitle = "Reset Password";
@endphp

@section('content')
<script type="text/javascript">
  function sendPasswordResetRequest(e) {
    e.preventDefault();
    axios.post("{{ route('reset_password') }}", {
      email: document.getElementById('txtEmail').value
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log("ERROR!!");
      console.log(error);
    });
  }
</script>
<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-6 text-center">
      <div class="card">
        <div class="card-body">
          <div class="mb-3">
            <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email Address">
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary mb-3" onclick="sendPasswordResetRequest(event);">Reset Password</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>
</div>
@endsection