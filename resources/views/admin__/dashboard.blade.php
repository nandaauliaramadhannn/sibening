@extends('admin.layouts.app')
@section('content')
<!-- Your Page Content Goes Here-->
<div class="page-content header-clear-medium">
    <div class="splide single-slider slider-no-dots slider-no-arrows slider-boxed text-center mt-n2" id="single-slider-3">
        <div class="splide__track">
            <div class="splide__list">
                @if ($slider)
                @foreach ($slider as $item)
                <div class="splide__slide">
                    <div class="card card-style mx-0 shadow-card shadow-card-m bg-14" data-card-height="230">
                        <div class="card-bottom pb-3 px-3">
                            <h3 class="color-white mb-1">{{ $item->nama_kegiatan }}</h3>
                            <p class="color-white opacity-80 mb-0 mt-n1 font-14">{{ $item->jumlah_sasaran }}</p>
                        </div>
                        <div class="card-overlay bg-gradient-fade"></div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="card card-style">
        <div class="card-body text-center">
            <h5 class="mb-n1 font-12 color-highlight font-700 text-uppercase pt-1"></h5>
            <h2>Total</h2>
            <p class="mb-3">
                
            </p>
            <div class="row mb-n3 pt-4">
                <div class="col-6">
                    <i class="bi bi-bar-chart-line color-yellow-dark font-50 d-block pb-2"></i>
                    <h5 class="pt-2">{{ $kegcountstunting }}</h5>
                    <p>Total Kegiatan Sasaran Anak Stunting</p>
                </div>
                <div class="col-6">
                    <i class="bi bi-bar-chart-line color-yellow-dark font-50 d-block pb-2"></i>
                    <h5 class="pt-2">{{ $kegcountkeluarga }}</h5>
                    <p>Total Kegiatan Sasaran Anak Stunting</p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Page Content-->
@endsection
