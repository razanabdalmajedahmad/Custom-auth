@extends('welcome')
@section('title')
<title>Reset Password</title>
@endsection
@section('style')
{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
@endsection
@section('container')
<div class="container-sm mt-5 d-flex justify-content-center " >
    <div class="card p-3" style="width: 60%;">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success mt-5">
                {{Session::get('success') }}
            </div>
        @endif
        <form action="{{route('submitforgetpassword')}}" method="POST">
            @csrf
            <ul class="list-group list-group-flush ">

                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <label for="email" class="align-middle mt-1" >Email Address </label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Address">
                    </div>
                </div>
                <div class="row mt-2 mb-2 text-center">
                    <div class="col">
                        <input type="submit" value="send" class="btn btn-primary" >
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
@section('script')
@endsection
