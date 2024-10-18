@extends('my-layouts.my-app')
@section('content')
<gmp-map
  center="43.4142989,-124.2301242"
  zoom="4"
  map-id="DEMO_MAP_ID"
  style="height: 100vh"
>
<gmp-advanced-marker
    position="37.4220656,-122.0840897"
    title="Mountain View, CA"
  ></gmp-advanced-marker>
</gmp-map>    
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMznw6Z7nd2ODWJv8WnYuE_MiAujSmLUc&libraries=maps,marker&v=beta"
    defer
></script>
@endsection
