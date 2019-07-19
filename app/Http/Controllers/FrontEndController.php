<?php

namespace App\Http\Controllers;

use Session;
use App\Pemilih;
use App\PerhitunganSuara;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kandidat;
use App\Events\SetStatusTps;

class FrontEndController extends Controller
{
    public function kandidat()
    {
        $data_kandidat = \App\Kandidat::all();
        return view('home.index', compact('data_kandidat'));
    }

    public function coblos2(Request $request)
    {
        $perhitungan = PerhitunganSuara::create($request->all());

        $tps = \App\Tps::where('id', 2);
        
            $tps->update([
                'status' => FALSE
            ]);

        return redirect()->back();   
    }

    public function tps1()
    {
        $data_kandidat = \App\Kandidat::all();

        $tps = \App\Tps::where('id',1)->get();
        
        return view('home.index', compact('data_kandidat','tps')); 
    }

    public function tps2()
    {
        $data_kandidat = \App\Kandidat::all();

        $tps = \App\Tps::where('id',2)->get();

        return view('home.index2', compact('data_kandidat', 'tps')); 
    }

    public function verify1(Request $request)
    {
        $tps = \App\Tps::where('id', 1);
        

            $tps->update([
                'status' => $request->status
            ]);
                $tps = \App\Tps::where('id', 1)->first();
        event(new SetStatusTps($tps));
        

        return redirect()->back();

    }

    public function verify2(Request $request)
    {
        $kandidat = \App\Tps::where('id', 2);
        

            $kandidat->update([
                'status' => $request->status
            ]);

        

        return redirect()->back();

    }

    public function checkStatusTps1()
    {
        $tps = \App\Tps::where('id',1)->get();

        return response()->json([
            'data' => $tps,
            'status' => 200
        ]);
    }

    public function checkStatusTps1Update()
    {
        $tps = \App\Tps::where('id',1);

        $tps->update([
            'status' => FALSE
        ]);

        return response()->json([
            'status' => 200,
            'vote' => 0
        ]);
    }

    // public function coblos(Request $request)
    // {
    // 	$nik = $request->nik;

    // 	$nikWhere = Pemilih::where('nik', $request->nik)->first();

    // 	if ($nikWhere == NULL) {
    		
    // 		Session::flash('message', 'Anda Salah Input NIK.');
    // 		return redirect()->back();
    // 	} elseif ($nikWhere->status == 1){

    // 		Session::flash('message', 'Anda Sudah Nyoblos.');
    // 		return redirect()->back();
    // 	} else {
    		
    // 		return view('home/votepage');
    // 	}
    // }
}
