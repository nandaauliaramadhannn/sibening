<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\SiData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiDataController extends Controller
{
    public function ViewData(Request $request)
    {
        $user = $request->user();

        $sidata = SiData::where('user_id', $user->id)->latest()->get();
        return view('user.data._index',compact('sidata','user'));
    }

    public function CreateData(Request $request)
    {
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $user = $request->user();


        return view('user.data._create', compact('kecamatan','desa','user'));

    }

    public function StoreData(Request $request)
    {
                $request->validate([
                'nama_kegiatan' => 'required',
                'jumlah_sasaran' => 'required',
                'lokus_kegiatan' => 'required',
                'sumber_anggaran' => 'required',
                'waktu_pelaksanaan' => 'required',
                'no_pic'    => 'required',
                'doc.*' => 'required|mimes:png,jpeg',
                'pendukung' => 'required|mimes:pdf,xlsx,doc',
            ]);

            if ($request->hasFile('doc')) {
                $docFile = $request->file('doc');
                $docFileName = uniqid() . '_' . $docFile->getClientOriginalName();
                $docFile->move(public_path('upload/doc/'), $docFileName);
                $datadoc = $docFileName;
            }

            if ($request->hasFile('pendukung')) {
                $pendukungFile = $request->file('pendukung');
                $pendukungFileName = uniqid() . '_' . $pendukungFile->getClientOriginalName();
                $pendukungFile->move(public_path('upload/doc/pendukung/'), $pendukungFileName);
                $data = $pendukungFileName;
            }

            try {
                $kecamatanId = Auth()->user()->kecamatan_id == null ?   $request->kecamatan : Auth()->user()->kecamatan_id;
                $sidata = SiData::create([
                    'kecamatan_id' => $kecamatanId,
                    'sasaran' => $request->sasaran,
                    'nama_kegiatan' => $request->nama_kegiatan,
                    'jumlah_sasaran' => $request->jumlah_sasaran,
                    'lokus_kegiatan' => $request->lokus_kegiatan,
                    'sumber_anggaran' => $request->sumber_anggaran,
                    'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
                    'alamat' => $request->alamat,
                    'jenis_aksi' => $request->jenis_aksi,
                    'no_pic' => $request->no_pic,
                    'desa_id' => $request->desa_id,
                    'pendukung' => $data ?? null,
                    'user_id' => Auth()->user()->id,
                    'doc' => $datadoc ?? null,
                    'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'Registration Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('user.data.index')->with($notification);
            } catch (\Exception $e) {
                if (isset($datadoc)) {

                    unlink(public_path('upload/doc/') . $datadoc);
                }
                if (isset($data)) {
                    unlink(public_path('upload/doc/pendukung/') . $data);
                }

                $notification = array(
                    'message' => 'Failed to register data: ' . $e->getMessage(),
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
        }
    }

}
