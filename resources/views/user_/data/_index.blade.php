@extends('user.layouts.app')

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Data </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data  <span class="badge rounded-pill bg-danger"></span> </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
    <a href="{{ route('user.data.create') }}" class="btn btn-primary">Tambah Data Kegiatan </a>
            </div>
        </div>
    </div>
    <hr/>
    <div class="card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Sasaran</th>
                                <th>Jumlah Sasaran</th>
                                <th>Lokus</th>
                                <th>Sumber Anggaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sidata as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->sasaran == 1 ? "resiko keluarga stunting" : "anak stunting"}}</td>
                                <td>{{ $item->jumlah_sasaran }}</td>
                                <td>{{ $item->lokus_kegiatan }}</td>
                                <td>{{ $item->sumber_anggaran == 1 ? "no pemerintah" : "pemerintah"}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
