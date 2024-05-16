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

    public function GetTahunStunting(Request $request){
        $data = array();
        $search = $request->get('q');
        $items = SiData::select(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%Y") AS tahun'))->whereYear('waktu_pelaksanaan', 'like', '%'.$search.'%')->groupBy(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%Y")'))->get();
        if ($items) {
            foreach ($items as $key => $value) {
                $data[] = array(
                    'id' => intval($value->tahun),
                    'text' => $value->tahun
                );
            }
        }
        return response()->json($data);
    }

    public function ViewChartKecamatan(Request $request){
        return view('admin.chart-kecamatan');
    }

    public function GetChartKecamatan(Response $response, Request $request){
        $search = $request->get('tahun');
        $labels = [];
        $data = [];
        if ($search != 'null') {
            $sidata = SiData::select(DB::raw('kecamatan_id, count(desa_id) AS jumlah'))
                ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('kecamatan_id'))
                ->get();
        }else{
            $sidata = SiData::select(DB::raw('kecamatan_id, count(desa_id) AS jumlah'))
                // ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('kecamatan_id'))
                ->get();
        }

        if ($sidata) {
            foreach ($sidata as $key => $value) {
                $labels[] = $value->kecamatan->name;
                $data[] = intval($value->jumlah);
            }
        }

        // $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Kecamatan';
        // $data = [65, 59, 80, 81, 56, 55, 40];
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

    public function ViewChartDesa(Request $request){
        return view('admin.chart-desa');
    }

    public function GetChartDesa(Response $response, Request $request){
        $search = $request->get('tahun');
        $labels = [];
        $data = [];
        if ($search != 'null') {
            $sidata = SiData::select(DB::raw('desa_id, count(desa_id) AS jumlah'))
                ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('desa_id'))
                ->get();
        }else{
            $sidata = SiData::select(DB::raw('desa_id, count(desa_id) AS jumlah'))
                // ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('desa_id'))
                ->get();
        }

        if ($sidata) {
            foreach ($sidata as $key => $value) {
                $labels[] = $value->desa->name;
                $data[] = intval($value->jumlah);
            }
        }

        // $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Desa';
        // $data = [65, 59, 80, 81, 56, 55, 40];
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

    public function ViewChartKeluargaStunting(Request $request){
        return view('admin.chart-keluarga-stunting');
    }

    public function GetChartKeluargaStunting(Response $response, Request $request){
        $search = $request->get('tahun');
        $labels = [];
        $data = [];
        if ($search != 'null') {
            $sidata = SiData::select(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y") AS bulan_tahun, count(sasaran) AS jumlah'))
                ->where('sasaran', 1)
                ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y")'))
                ->get();
        }else{
            $sidata = SiData::select(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y") AS bulan_tahun, count(sasaran) AS jumlah'))
                ->where('sasaran', 1)
                // ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y")'))
                ->get();
        }

        if ($sidata) {
            foreach ($sidata as $key => $value) {
                $labels[] = $value->bulan_tahun;
                $data[] = intval($value->jumlah);
            }
        }

        // $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Keluarga Stunting';
        // $data = [65, 59, 80, 81, 56, 55, 40];
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

    public function ViewChartAnakStunting(Request $request){
        return view('admin.chart-anak-stunting');
    }

    public function GetChartAnakStunting(Response $response, Request $request){
        $search = $request->get('tahun');
        $labels = [];
        $data = [];
        if ($search != 'null') {
            $sidata = SiData::select(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y") AS bulan_tahun, count(sasaran) AS jumlah'))
                ->where('sasaran', 2)
                ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y")'))
                ->get();
        }else{
            $sidata = SiData::select(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y") AS bulan_tahun, count(sasaran) AS jumlah'))
                ->where('sasaran', 2)
                // ->WhereYear('waktu_pelaksanaan',$search)
                ->groupBy(DB::raw('DATE_FORMAT(waktu_pelaksanaan, "%M %Y")'))
                ->get();
        }

        if ($sidata) {
            foreach ($sidata as $key => $value) {
                $labels[] = $value->bulan_tahun;
                $data[] = intval($value->jumlah);
            }
        }

        // $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $label = 'Grafik Berdasarkan Kecamatan';
        // $data = [65, 59, 80, 81, 56, 55, 40];
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
