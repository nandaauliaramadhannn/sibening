@extends('admin.layouts.app')
@section('content')
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>SIBENING</h1>
          <h4>Sistem Informasi Bekasi Entaskan Stunting</h4>
        </div>
      </div>

      <div class="row icon-box">
        <div class="col">
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://picsum.photos/300" class="d-block rounded mx-auto d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://picsum.photos/300" class="d-block rounded mx-auto d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://picsum.photos/300" class="d-block rounded mx-auto d-block" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      
      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200" id="card-1">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title">Data Kecamatan</h4>
            <p class="description" style="width: 500px"></p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300" id="card-2">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title">Data Desa</h4>
            <p class="description" style="width: 500px"></p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400" id="card-3">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title">Keluarga Stunting</h4>
            <p class="description" style="width: 500px"></p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500" id="card-4">
          <div class="icon-box">
            <div class="icon"><i class="ri-fingerprint-line"></i></div>
            <h4 class="title"><a href="">Anak Stunting</a></h4>
            <p class="description" style="width: 500px"></p>
          </div>
        </div>

      </div>
    </div>
</section>
@endsection
@push('js')
    
@endpush