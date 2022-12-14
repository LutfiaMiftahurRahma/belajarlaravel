@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url({{ asset('img/bg.jpg') }})">
            <div class="pos-a centerXY">
                {{-- <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY" src="{{ asset('img/logo_lsp_its.jpg') }}" alt=""></div> --}}
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-80 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
            <h4 class="fw-300 c-grey-900 mB-40 text-center">Login</h4>
            
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="username" class="text-normal text-dark">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password" class="text-normal text-dark">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div>
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
<!--                 <div class="form-group">
                    <div class="checkbox checkbox-info peers ai-c">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked': '' }} class="peer">
                        <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Remember Me</span></label>
                    </div>
                </div> -->
                <div class="form-group">
                    @include('layouts.utils.errorMessages')
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-block">Log Me In</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
@endsection

