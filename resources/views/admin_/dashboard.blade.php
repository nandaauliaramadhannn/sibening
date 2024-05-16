@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $kegcountstunting }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-group fs-3 text-white'></i>
                        </div>
                    </div>

                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total Kegiatan Sasaran Anak Stunting</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">{{ $kegcountkeluarga }}</h5>
                    <div class="ms-auto">
                        <i class='bx bx-group fs-3 text-white'></i>
                    </div>
                </div>

                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Total Kegiatan Sasaran Anak Stunting</p>

                </div>
            </div>
        </div>

        @php
        $item = App\Models\SiData::latest()->first();
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-center">
                @if($item)
                    <img src="{{ asset('upload/doc/' . $item->doc) }}" class="landscape-image" width="500px" alt="Document Image">
                @endif
            </div>
        </div>
    </div>

        @endsection
