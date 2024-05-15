<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;

class DataController extends Controller
{

        public function getDesaList($kecamatan_id)
    {
        $subdesa = Desa::where('kecamatan_id', $kecamatan_id)->orderBy('name', 'ASC')->get();
        return json_encode($subdesa);
    }

}
