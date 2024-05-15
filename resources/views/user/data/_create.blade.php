@extends('user.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tambah Data</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Tambah Data Kegiatan</h5>
        <hr/>
            <form id="myForm" method="POST" action="{{ route('user.data.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="form-group mb-3">
                                <label for="inputDataTitle" class="form-label">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" id="inputDataTitle" placeholder="Masukan Nama Kegiatan">
                            </div>
                            <div class="mb-3">
                                <label for="inputDataTitle" class="form-label">Jumlah Sasaran</label>
                                <input type="text" name="jumlah_sasaran" class="form-control" id="jumlah_sasaran" placeholder="masukan jumlah_sasaran">
                            </div>
                            <div class="mb-3">
                                <label for="sasaran" class="form-label">Sasaran</label>
                                <select name="sasaran" class="form-select" id="sasaran">
                                    <option></option>
                                    <option value="1" {{ old('sasaran') == 1 ? 'selected="true"' : ''}}>Resiko Keluarga Stunting</option>
                                    <option value="2" {{ old('sasaran') == 2 ? 'selected="true"' : ''}}>Anak Stunting</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inputDataTitle" class="form-label">Lokus</label>
                                <input type="text" name="lokus_kegiatan" class="form-control" id="lokus_kegiatan" placeholder="masukan lokus">
                            </div>
                            <div class="mb-3">
                                <label for="sumber_anggaran" class="form-label">Sumber Angaran</label>
                                <select name="sumber_anggaran" class="form-select" id="sumber_anggaran">
                                    <option></option>
                                    <option value="1" {{ old('sumber_anggaran') == 1 ? 'selected="true"' : ''}}>Non Pemerintahan</option>
                                    <option value="2" {{ old('sumber_anggaran') == 2 ? 'selected="true"' : ''}}>Pemerintah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_aksi" class="form-label">Jenis Aksi</label>
                                <select name="jenis_aksi" class="form-select" id="jenis_aksi">
                                    <option></option>
                                    <option value="1" {{ old('jenis_aksi') == 1 ? 'selected="true"' : ''}}>Sensitif</option>
                                    <option value="2" {{ old('jenis_aksi') == 2 ? 'selected="true"' : ''}}>Spesifik</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                              <div class="row g-3">
                                <div class="form-group col-12">
                                    <label for="inputDataTitle" class="form-label">Lokus</label>
                                    <input type="date" name="waktu_pelaksanaan" class="form-control" id="waktu_pelaksanaan">
                                </div>
                                @if(!$user->kecamatan_id)
                                <div class="form-group col-12">
                                    <label for="inputData" class="form-label">Kecamatan</label>
                                    <select name="kecamatan_id" class="form-select" id="inputData">
                                        @foreach($kecamatan as $kecamatanItem)
                                        <option value="{{ $kecamatanItem->id }}" {{ Auth()->user()->kecamatan_id == $kecamatanItem->id ? 'selected' : '' }}>
                                            {{ $kecamatanItem->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group col-12">
                                    <label for="inputCollection" class="form-label">Desa</label>
                                    <select name="desa_id" class="form-select" id="inputCollection">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputDataTitle" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="alamat"></textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputDataTitle" class="form-label">No Hp PIC</label>
                                    <input type="text" name="no_pic" class="form-control" id="no_pic">
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputDataTitle" class="form-label">File Pendukung</label>
                                    <input type="file" name="pendukung" class="form-control" id="pendukung">
                                </div>

                                <div class="form-group col-12">
                                    <label for="inputDataTitle" class="form-label">Foto Dokumentasi</label>
                                    <input type="file" name="doc" class="form-control" id="doc">
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="kecamatan_id"]').on('change', function(){
            var kecamatan_id = $(this).val();
            if (kecamatan_id) {
                $.ajax({
                    url: "{{ url('get/list/data/kec/desa') }}/"+kecamatan_id,
                    type: "GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="desa_id"]').html('');
                        var d =$('select[name="desa_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="desa_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection
