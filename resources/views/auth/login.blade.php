@extends('welcome')
@section('title')
<title>Login</title>
@endsection
@section('style')
{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
@endsection
@section('container')
<div class="container-sm mt-5 d-flex justify-content-center " >
    <div class="card p-3" style="width: 60%;">
        @if (Session::has('error'))
            <div class="alert alert-danger mt-5">
                {{Session::get('error') }}
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success mt-5">
                {{Session::get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('valid-login') }}" method="POST" id="maindata">
            @csrf
            <ul class="list-group list-group-flush ">

                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <label for="email1" class="align-middle mt-1" >Email Address or Phone Number:</label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="text" name="email_or_phone" id="email1" class="form-control" placeholder="Enter Your Email Address or Phone Number">
                    </div>
                </div>
                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <label for="password1" class="align-middle mt-1" >Password:</label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="password" name="password" id="password1" class="form-control" placeholder="Enter Your Password">
                    </div>
                </div>
                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <input type="checkbox" id="vehicle2" name="remember_me" >
                        <label for="vehicle2"> Remember Me</label><br>
                    </div>
                    <div class="col-lg-7 col-sm-12">

                    </div>
                </div>
                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <a href="{{route('forget_password')}}">Forget Password</a>
                    </div>

                </div>
            </ul>
        </form>

    </div>
</div>
@endsection
@section('script')
@endsection
