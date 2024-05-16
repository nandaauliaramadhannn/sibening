@extends('user.layouts.app')
@section('content')
<!-- Your Page Content Goes Here-->
<div class="page-content header-clear-medium">

    <div class="card card-style">
        <div class="card-body text-center">
            <h5 class="mb-n1 font-12 color-highlight font-700 text-uppercase pt-1"></h5>
            <h2>Total</h2>
            <p class="mb-3">
                
            </p>
            <div class="row mb-n3 pt-4">
                <div class="col-12">
                    <i class="bi bi-lightning-charge color-yellow-dark font-50 d-block pb-2"></i>
                    <h5 class="pt-2">{{ $countdata }}</h5>
                    <p>
                        Ready when you are. Tap and enjoy.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Page Content-->
@endsection
