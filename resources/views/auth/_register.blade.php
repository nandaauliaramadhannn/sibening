<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ asset('template/backend/sb-admin-2/img/logo.png') }}" type="image/png" />
        <!--plugins-->
        <link href="{{ asset('adminbackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
        <!-- loader-->
        <link href="{{ asset('adminbackend/assets/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('adminbackend/assets/js/pace.min.js') }}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('adminbackend/assets/css/icons.css') }}" rel="stylesheet">

         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


        <title>Daftar Akun Sibening </title>
    </head>
    <body class="bg-login">
        <!--wrapper-->
        <div class="wrapper">
            <div class="d-flex align-items-center justify-content-center my-5">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="p-4">
                                        <div class="mb-3 text-center">
                                            <img src="assets/images/logo-icon.png" width="60" alt="" />
                                        </div>
                                        <div class="text-center mb-4">
                                            <h5 class="">Rukada Admin</h5>
                                            <p class="mb-0">Please fill the below details to create your account</p>
                                        </div>
                                        <div class="form-body">
                                            <form class="row g-3" method="POST" action="{{ route('daftar.post')}}">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="inputname" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputname" placeholder="Jhon" value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputname" class="form-label">No Hp</label>
                                                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="inputname" placeholder="08512345678" value="{{ old('no_hp') }}">
                                                    @error('no_hp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" placeholder="example@user.com" value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" name="password" class="form-control border-end-0 @error('password') is-invalid @enderror" id="inputChoosePassword" placeholder="Enter Password">
                                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputConfirmPassword" class="form-label">Konfirmasi Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword" placeholder="Konfirmasi Password">
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="terms">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                    </div>
                                                    @error('terms')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Sign up</button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>

<script src="{{ asset('adminbackend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('adminbackend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<!--Password show & hide js -->
<script>
$(document).ready(function () {
$("#show_hide_password a").on('click', function (event) {
event.preventDefault();
if ($('#show_hide_password input').attr("type") == "text") {
$('#show_hide_password input').attr('type', 'password');
$('#show_hide_password i').addClass("bx-hide");
$('#show_hide_password i').removeClass("bx-show");
} else if ($('#show_hide_password input').attr("type") == "password") {
$('#show_hide_password input').attr('type', 'text');
$('#show_hide_password i').removeClass("bx-hide");
$('#show_hide_password i').addClass("bx-show");
}
});
});
</script>
<!--app JS-->
<script src="{{ asset('adminbackend/assets/js/app.js') }}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch(type){
case 'info':
toastr.info(" {{ Session::get('message') }} ");
break;

case 'success':
toastr.success(" {{ Session::get('message') }} ");
break;

case 'warning':
toastr.warning(" {{ Session::get('message') }} ");
break;

case 'error':
toastr.error(" {{ Session::get('message') }} ");
break;
}
@endif
</script>


</body>

</html>
