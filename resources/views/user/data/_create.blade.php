@extends('user.layouts.app')
@section('content')
<div class="page-content header-clear-medium">
    <div class="card card-style">
        <div class="content">
            <h1 class="pb-2">Input Kegiatan</h1>
            <form action="{{ route('user.data.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-file-plus font-16"></i>
                    <input type="text" class="form-control rounded-xs" id="nama_kegiatan" placeholder="Nama Kegiatan" required name="nama_kegiatan"/>
                    <label for="nama_kegiatan" class="color-theme">Nama Kegiatan</label>
                    <div class="invalid-feedback">Nama Kegiatan harus diisi.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-check-circle font-13"></i>
                    <select class="form-select rounded-xs" id="sasaran" aria-label="Floating label select sasaran" name="sasaran" required>
                        <option selected disabled hidden>Pilih Sasaran</option>
                        <option value="1" {{ old('sasaran') == 1 ? 'selected' : ''}}>Resiko Keluarga Stunting</option>
                        <option value="2" {{ old('sasaran') == 2 ? 'selected' : ''}}>Anak Stunting</option>
                    </select>
                    <label for="sasaran" class="color-theme">Sasaran</label>
                    <div class="invalid-feedback">Sasaran harus dipilih.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-file-plus font-16"></i>
                    <input type="number" class="form-control rounded-xs" id="jumlah_sasaran" placeholder="Jumlah Sasaran" required name="jumlah_sasaran"/>
                    <label for="jumlah_sasaran" class="color-theme">Jumlah Sasaran</label>
                    <div class="invalid-feedback">Jumlah Sasaran harus diisi dengan angka.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-check-circle font-13"></i>
                    <select class="form-select rounded-xs" id="sumber_anggaran" aria-label="Floating label select Sumber Anggaran" name="sumber_anggaran" required>
                        <option selected disabled hidden>Pilih Sumber Anggaran</option>
                        <option value="1" {{ old('sumber_anggaran') == 1 ? 'selected' : ''}}>Non Pemerintahan</option>
                        <option value="2" {{ old('sumber_anggaran') == 2 ? 'selected' : ''}}>Pemerintah</option>
                    </select>
                    <label for="sumber_anggaran" class="color-theme">Sumber Anggaran</label>
                    <div class="invalid-feedback">Sumber Anggaran harus dipilih.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-calendar-check-fill font-16"></i>
                    <input type="date" class="form-control rounded-xs" id="waktu_pelaksanan" required name="waktu_pelaksanan"/>
                    <label for="waktu_pelaksanan" class="color-theme">Waktu Pelaksanaan</label>
                    <div class="invalid-feedback">Waktu Pelaksanaan harus diisi.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-whatsapp font-16"></i>
                    <input type="text" class="form-control rounded-xs" id="no_pic" placeholder="No Hp Pic" required name="no_pic"/>
                    <label for="no_pic" class="color-theme">No PIC</label>
                    <div class="invalid-feedback">No PIC harus diisi.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-check-circle font-13"></i>
                    <select class="form-select rounded-xs" id="kecamatan_id" aria-label="Floating label select Kecamatan" name="kecamatan_id" required>
                        <option selected disabled hidden>Pilih Kecamatan</option>
                        @foreach($kecamatan as $kecamatanItem)
                        <option value="{{ $kecamatanItem->id }}" {{ Auth()->user()->kecamatan_id == $kecamatanItem->id ? 'selected' : '' }}>
                            {{ $kecamatanItem->name }}
                        </option>
                        @endforeach
                    </select>
                    <label for="kecamatan_id" class="color-theme">Kecamatan</label>
                    <div class="invalid-feedback">Kecamatan harus dipilih.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-check-circle font-13"></i>
                    <select class="form-select rounded-xs" id="desa_id" aria-label="Floating label select desa" name="desa_id" required>
                        <option selected disabled hidden>Pilih Desa</option>
                        <!-- Opsi untuk desa akan diisi menggunakan JavaScript -->
                    </select>
                    <label for="desa_id" class="color-theme">Desa</label>
                    <div class="invalid-feedback">Desa harus dipilih.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-house font-16"></i>
                    <textarea class="form-control rounded-xs" id="alamat" placeholder="Alamat" required name="alamat"></textarea>
                    <label for="alamat" class="color-theme">Alamat</label>
                    <div class="invalid-feedback">Alamat harus diisi.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-file-earmark-arrow-down font-13"></i>
                    <input type="file" class="form-control rounded-xs" id="pendukung" required name="pendukung"/>
                    <label for="pendukung" class="color-theme">File Pendukung</label>
                    <div class="invalid-feedback">File Pendukung harus diunggah.</div>
                </div>

                <div class="form-custom form-label form-icon mb-3">
                    <i class="bi bi-file-earmark-arrow-down font-13"></i>
                    <input type="file" class="form-control rounded-xs" id="doc" required name="doc"/>
                    <label for="doc" class="color-theme">File Foto Kegiatan</label>
                    <div class="invalid-feedback">File Foto Kegiatan harus diunggah.</div>
                </div>

                <button class="btn btn-full bg-blue-dark rounded-xs text-uppercase font-700 w-100 btn-s mt-4" type="submit">Submit Form</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
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
@endpush
