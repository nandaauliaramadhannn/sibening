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
        <div class="card card-style">
			<div class="content">
				<h6 class="font-700 mb-n1 color-highlight">Apex Charts</h6>
				<h1 class="pb-2">Line View</h1>
				<p class="mb-0 mt-n1">
					Create Modern, powerful charts using Apex. The best plugin for exquisite Charts.
				</p>
			</div>
			<div id="chart" class="chart"></div>
		</div>
@endsection
@push('js')

<script>
    fetch('/backend/user-dashboard/datagrafik/bulan')
        .then(response => response.json())
        .then(data => {

            var labels = data.labels;
            var seriesData = data.data;

            // Opsi chart
            var options = {
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
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
</script>
@endpush
