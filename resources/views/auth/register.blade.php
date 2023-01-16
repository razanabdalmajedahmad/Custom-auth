@extends('welcome')
@section('title')
<title>Register</title>
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
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger mt-5">
            {{Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('valid-register') }}" method="POST" id="maindata">
            @csrf
            <ul class="list-group list-group-flush ">
                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12 ">
                        <label for="name1" class="align-middle mt-1" >Name:</label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="text" name="name" id="name1" class="form-control" placeholder="Enter Your Name">
                    </div>
                </div>
                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <label for="email" class="align-middle mt-1" >Email Address </label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Address">
                    </div>
                </div>
                <div class="row mt-2 mb-2 ">
                    <div class="col-lg-5 col-sm-12">
                        <label for="phone" class="align-middle mt-1" >phone Number </label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Your phone Number">
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
                        <label for="password_confirmation1" class="align-middle mt-1" >Password Confirmation:</label>
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <input type="password" name="password_confirmation" id="password_confirmation1" class="form-control" placeholder="Enter Password Confirmation">
                    </div>
                </div>
                <div class="row mt-2 mb-2 text-center">
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Register">
                    </div>

                </div>
            </ul>
        </form>

    </div>
</div>
@endsection
@section('script')




@endsection
