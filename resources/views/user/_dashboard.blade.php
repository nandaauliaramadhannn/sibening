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
                    <i class="bi bi-bar-chart-line color-yellow-dark font-50 d-block pb-2"></i>
                    <h5 class="pt-2">{{ $countdata }}</h5>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-style">
        <div class="content">
            <h6 class="font-700 mb-n1 color-highlight">Apex Charts</h6>
            <h1 class="pb-2">Line View</h1>
            <p class="mb-0 mt-n1">
                Create Modern, powerful charts using Apex. The best plugin for exquisite Charts.
            </p>
        </div>
        <div id="charts-data-1" class="chart"></div>
    </div>
</div>
<!-- End of Page Content-->
@endsection
@push('js')
<script>
  fetch('/backend/user-dashboard/datagrafik/bulan')
    .then(response => response.json())
    .then(data => {
        var labels = data.labels;
        var seriesData = data.data;

        var optionsChart1 = {
            chart: {
                type: 'area',
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: false,
                }
            },
            series: [{
                name: 'Total Kegiatan',
                data: seriesData
            }],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: labels
            }
        }

        var chartDemo1 = new ApexCharts(document.querySelector("#charts-data-1"), optionsChart1); // Menggunakan document.querySelector karena kita hanya mengambil satu elemen dengan id tertentu
        chartDemo1.render();
    });
    </script>
@endpush
