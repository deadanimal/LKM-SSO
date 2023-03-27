<?php

namespace App\Http\Controllers;

use App\Models\CN_prod;
use App\Models\Exsumm1;
use App\Models\HHarian;
use App\Models\HHbulan;
use App\Models\HTahunan;
use App\Models\I_grind;
use App\Models\I_tmpweb;
use App\Models\L_area1;
use App\Models\Pusat;
use App\Models\Test;
use DateTime;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test()
    {
        $test = Test::all();

        return $test;

    }

    public function php()
    {
        return phpinfo();
    }

    public function I_tmpweb()
    {
        return response()->json(I_tmpweb::all());
    }

    public function HHarian()
    {
        return response()->json(HHarian::all());
    }

    public function HHbulan()
    {
        return response()->json(HHbulan::all());
    }
    public function HTahunan()
    {
        return response()->json(HTahunan::all());
    }
    public function I_grind()
    {
        return response()->json(I_grind::orderBy("year", "asc")->get());
    }
    public function CN_prod()
    {
        return response()->json(CN_prod::orderBy("year", "asc")->get());
    }
    public function Exsumm1_E()
    {
        return response()->json(Exsumm1::where('type', 'E')->orderBy("year", "asc")->get());
    }
    public function Exsumm1_I()
    {
        return response()->json(Exsumm1::where('type', 'I')->orderBy("year", "asc")->get());
    }
    public function L_area1()
    {
        return response()->json(L_area1::orderBy("year", "asc")->get());
    }

    // Carian
    public function carian_I_tmpweb(Request $request)
    {
        $tarikh_user = $request->tarikh;
        $tarikh = date('d F Y', strtotime($request->tarikh));

        $result = I_tmpweb::whereDate('MDATE', '=', $request->tarikh)->get();

        $jenis_bahasa = $request->bahasa;

        if ($jenis_bahasa == 'Melayu') {
            return view('carian.I_tmpweb', compact('result', 'tarikh_user', 'tarikh'));

        }
        if ($jenis_bahasa == 'English') {
            return view('carian.I_tmpwebe', compact('result', 'tarikh_user', 'tarikh'));

        }
    }

    public function carian_HHarian(Request $request)
    {
        $tarikh_user = $request->tarikh;
        $tarikh = date('F d, Y', strtotime($request->tarikh));
        // $tarikh = $convertDate->format('d/m/Y');

        $result = HHarian::whereDate('TARIKH', '=', $tarikh_user)->orderBy("SEQ", "asc")->get();
        foreach ($result as $r) {
            $pusat = Pusat::where('KOD', $r->PUSAT)->first();
            $r['nama_pusat'] = $pusat->N_PUSAT;

        }
        // dd($result);

        $jenis_bahasa = $request->bahasa;

        if ($jenis_bahasa == 'Melayu') {
            return view('carian.hharian', compact('result', 'tarikh_user', 'tarikh'));

        }
        if ($jenis_bahasa == 'English') {
            return view('carian.hhariane', compact('result', 'tarikh_user', 'tarikh'));
        }

        // return redirect()->to('https://my.koko.gov.my/');
        // return $result;
    }

    public function carian_HHbulan(Request $request)
    {
        $bulan_user = $request->bulan;
        $dateObj = DateTime::createFromFormat('!m', $bulan_user);
        $bulane = $dateObj->format('F');

        // $bulane = date('F', strtotime($request->bulan));
        $tahun_user = $request->tahun;
        $result = HHbulan::whereMonth('TARIKH', '=', $bulan_user)
            ->whereYear('TARIKH', '=', $tahun_user)->orderBy("SEQ", "asc")
            ->get();

        foreach ($result as $r) {
            $pusat = Pusat::where('KOD', $r->PUSAT)->first();
            $r['nama_pusat'] = $pusat->N_PUSAT;

        }

        $jenis_bahasa = $request->bahasa;

        if ($jenis_bahasa == 'Melayu') {
            return view('carian.hhbulan', compact('result', 'bulan_user', 'tahun_user', 'bulane'));

        }
        if ($jenis_bahasa == 'English') {
            return view('carian.hhbulane', compact('result', 'bulan_user', 'tahun_user', 'bulane'));

        }
    }

    public function carian_HTahunan(Request $request)
    {
        $year_user = $request->Year;
        $result = HTahunan::where('Year', '=', $year_user)->orderBy("CentreSeq", "asc")->get();

        $jenis_bahasa = $request->bahasa;

        if ($jenis_bahasa == 'Melayu') {
            return view('carian.htahunan', compact('result', 'year_user'));

        }
        if ($jenis_bahasa == 'English') {
            return view('carian.htahunane', compact('result', 'year_user'));
        }

    }

    public function cariHarian()
    {

        $latest = HHarian::latest('TARIKH')->first()->TARIKH;

        $result = HHarian::whereDate('TARIKH', '=', $latest)
            ->whereIn('PUSAT', [602, 1202, 1301])
            ->get();

        foreach ($result as $r) {
            $pusat = Pusat::where('KOD', $r->PUSAT)->first();
            $r['nama_pusat'] = $pusat->N_PUSAT;
        }

        // if ($result) {
        //     $pusat = Pusat::where('KOD',$request->pusat)->first();
        //     $result['pusat']=$pusat->N_PUSAT;
        // }

        return [
            'result' => $result,
            'tarikh' => $latest->format('d/m/Y'),
        ];

    }

    public function hharian_latest()
    {
        return [
            'tarikh' => HHarian::latest('TARIKH')->first()->TARIKH,
        ];
    }

    public function hhbulan_latest()
    {
        return [
            'tarikh' => HHbulan::latest('TARIKH')->first()->TARIKH,
        ];
    }

    public function htahunan_latest()
    {
        return [
            'tahun' => HTahunan::latest('Year')->first()->Year,
        ];
    }

    public function iTempWeb_latest()
    {
        return [
            'tarikh' => I_tmpweb::latest('MDATE')->first()->MDATE,
        ];
    }
    public function header()
    {
        return request()->header();
    }

}
