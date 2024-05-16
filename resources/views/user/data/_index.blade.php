@extends('user.layouts.app')

@section('content')
<div class="page-content header-clear-medium">
    <div class="card overflow-visible card-style">
        <div class="content mb-0">
            <h4>Scrolling</h4>
            <div class="table-responsive">
                <table id="dataTable" class="table color-theme mb-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Sasaran</th>
                            <th scope="col">Action</th>
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
    {{ $sidata->links() }}
</div>
@endsection
@push('js')
<script>
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
</script>

@endpush
