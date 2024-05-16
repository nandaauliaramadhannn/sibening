@extends('user.layouts.app')

@section('content')
<div class="page-content header-clear-medium">
    <div class="card card-style">
        <div class="content">
    <div class="card overflow-visible card-style">
        <div class="content mb-0">
            <h4>Kegiatan</h4>
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('user.data.create') }}" class="btn gradient-red shadow-bg shadow-bg-m text-start"><i class="bi bi-plus-circle-fill pe-3 ms-n1"></i>Create</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table color-theme mb-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Sasaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sidata as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->sasaran == 1 ? "resiko keluarga stunting" : "anak stunting"}}</td>
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
<<<<<<< HEAD
    {{-- {{ $sidata->links() }} --}}
    {{ $sidata->links('admin.layouts.pagination') }}
=======
        </div>
    </div>
>>>>>>> 7da4e35632144af278d029cba1c4d901e5af934e
</div>
@endsection

@push('js')
<script>
<<<<<<< HEAD
// $(document).ready(function() {
//     $('#dataTable').DataTable({
//         "paging": false,
//         "lengthChange": false,
//         "searching": true,
//         "ordering": true,
//         "info": true,
//         "autoWidth": false,
//         "responsive": true
//     });
// });
=======
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    });
>>>>>>> 7da4e35632144af278d029cba1c4d901e5af934e
</script>
@endpush
