<?php

namespace App\Http\Controllers;

use App\Models\SiData;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function ViewDashboard(Request $request)
    {
        $kegcountstunting = SiData::where('sasaran','1')->count();
        $kegcountkeluarga = SiData::where('sasaran','2')->count();
        $slider = SiData::latest()->limit(3)->get();

//         $kecamatan = $request->kecamatan();
//         $desa = $request()->desa();
//         $data = SiData::select('kecamatan', 'desa', 'sasaran', DB::raw('COUNT(*) as count'))
//             ->groupBy('kecamatan', 'desa', 'sasaran')
//             ->get();

//         $chartData = [];
//         foreach ($data as $record) {
//             $kecamatan = $record->kecamatan;
//             $desa = $record->desa;
//             $sasaran = $record->sasaran === '1' ? 'resiko keluarga stunting' : 'anak stunting';
//             $count = $record->count;

//             $chartData[$kecamatan][$desa][$sasaran] = $count;
//             dd($chartData);
// }


        return view('admin.dashboard',compact('kegcountstunting','kegcountkeluarga','slider'));
    }

    public function ViewChartKecamatan(Response $response){
        return view('admin.chart-kecamatan');
    }

    public function GetChartKecamatan(Response $response){
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Kecamatan';
        $data = [65, 59, 80, 81, 56, 55, 40];
        $datasets[] = array(
            'label' => $label,
            'data' => $data,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'tension' => 0.1
        );
        $response = array(
            'labels' => $labels,
            'datasets' => $datasets
        );
        return $response;
    }

    public function ViewChartDesa(Response $response){
        return view('admin.chart-desa');
    }

    public function GetChartDesa(Response $response){
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Kecamatan';
        $data = [65, 59, 80, 81, 56, 55, 40];
        $datasets[] = array(
            'label' => $label,
            'data' => $data,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'tension' => 0.1
        );
        $response = array(
            'labels' => $labels,
            'datasets' => $datasets
        );
        return $response;
    }

    public function ViewChartKeluargaStunting(Response $response){
        return view('admin.chart-keluarga-stunting');
    }

    public function GetChartKeluargaStunting(Response $response){
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Kecamatan';
        $data = [65, 59, 80, 81, 56, 55, 40];
        $datasets[] = array(
            'label' => $label,
            'data' => $data,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'tension' => 0.1
        );
        $response = array(
            'labels' => $labels,
            'datasets' => $datasets
        );
        return $response;
    }

    public function ViewChartAnakStunting(Response $response){
        return view('admin.chart-anak-stunting');
    }

    public function GetChartAnakStunting(Response $response){
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Kecamatan';
        $data = [65, 59, 80, 81, 56, 55, 40];
        $datasets[] = array(
            'label' => $label,
            'data' => $data,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
            'tension' => 0.1
        );
        $response = array(
            'labels' => $labels,
            'datasets' => $datasets
        );
        return $response;
    }
}
