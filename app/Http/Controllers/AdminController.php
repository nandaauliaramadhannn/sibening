<?php

namespace App\Http\Controllers;

use App\Models\SiData;
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
}
