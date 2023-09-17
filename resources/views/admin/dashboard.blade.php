@extends('_common.template')

@php
    $pageTitle = 'Home';
@endphp

@push('head_styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/tabulator.min.css') }}" />
@endpush

@push('head_scripts')
  <script type="text/javascript" src="{{ asset('js/tabulator.min.js') }}"></script>
@endpush

@section('content')
<h1>Admin Dashboard</h1>
<div id="example-table"></div>
<script type="text/javascript">
  /*axios.get("{{ route('get_all_products') }}")
    .then(function (response) {
      //initialize table
      var table = new Tabulator("#example-table", {
          data:response.data.payload, //assign data to table
          autoColumns:true, //create columns from data field names
      });
    })
    .catch(function (error) {
      console.log("ERROR!!");
      console.log(error);
    });*/

  var table = new Tabulator("#example-table", {
      ajaxURL: "{{ route('get_all_products') }}",
      autoColumns: true, //create columns from data field names
  });

</script>
@endsection