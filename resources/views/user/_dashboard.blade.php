@extends('user.layouts.app')
@section('content')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
             <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">{{$countdata}}</h5>
                    <div class="ms-auto">
                        <i class='bx bx-data fs-3 text-white'></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Jumlah Total Data</p>
                </div>
            </div>
          </div>
        </div>
@endsection
