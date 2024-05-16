@extends('admin.layouts.app')
@section('content')
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row icon-box" id="kembali">
          <div class="col">
              <a href="#">Kembali</a>
          </div>
        </div>
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>GRAFIK</h1>
          <h4>Grafik Berdasarkan Sasaran Keluarga Stunting</h4>
        </div>
      </div>

      <div class="row icon-box">
        <div class="col">
            <h4><select name="tahun" id="tahun" class="select2" onchange="getChart()" style="width: 100%"></select></h4>
            <canvas id="myChart"></canvas>
            <div id="demo"></div>
        </div>
      </div>
    </div>
</section>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
const config = {
    type: 'line',
    data: {},
    options: {
        onClick: (e, chart) => {
            const canvasPosition = chart.getElementsAtEventForMode(e, 'nearest', {intersect: true}, false);
            if (canvasPosition.length > 0) {
                const index = canvasPosition[0]._index;
                const datasetIndex = canvasPosition[0]._datasetIndex;
                const dataset = chart.data.datasets[datasetIndex];
                const xValue = dataset.data[index].x;
                const yValue = dataset.data[index].y;
                console.log('Clicked data point:', xValue, yValue);
            }
        }
    }
};

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, config);
document.getElementById('myChart').style.height = '300px';

async function getChart() {
    try {
        const response = await fetch("{{route('admin.getChartKeluargaStunting')}}?tahun="+$('#tahun').val());
        if (response.ok) {
            const jsonData = await response.json();
            config.data = jsonData;
            myChart.update();
        } else {
            console.error('Failed to fetch data:', response.status);
        }
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

getChart();

$(document).ready(function() {
    $('.select2').select2({
        ajax: {
            url: "{{route('admin.GetTahunStunting')}}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });
});

$('#kembali').click(function(){
    location.href = "{{route('admin.dashboard')}}"
});

</script>
@endpush