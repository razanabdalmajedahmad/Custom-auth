@extends('welcome')
@section('title')
<title>Home</title>
@endsection
@section('style')
@endsection
@section('container')
@if (Session::has('success'))
<div class="alert alert-success mt-5">
       {{-- <ul> --}}
           {{Session::get('success') }}
       {{-- </ul> --}}
   </div>
@endif

@endsection
@section('script')


@endsection
