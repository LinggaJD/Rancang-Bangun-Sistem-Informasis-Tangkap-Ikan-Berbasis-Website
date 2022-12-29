<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller {

    public function index() {
        return view('auth.login');
    }

    public function process(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')
                    ->select('*','users.id as uid')
                    ->leftJoin('role_user','users.id','=','role_user.user_id')
                    ->leftJoin('role','role_user.role_id','=','role.id')
                    ->where('username',$request->username)
                    ->first();

        if($user) {
            if(Hash::check($request->password, $user->password)) {

                if($user->role == 'admin') {
                    session([
                        'id_user' => $user->uid,
                    ]);



                    return redirect(route('index'));
                } else if($user->role == 'user'){
                    session([
                        'id_user' => $user->uid,
                    ]);


                    return redirect(route('account'));
                }

            } else {
                Alert::error('Password salah!');
                return redirect(route('auth.index'));
            }
        } else {
            Alert::error('Username tidak terdaftar!');
            return redirect(route('auth.index'));
        }

    }

    public function logout() {
        session()->forget('id_user');
        session()->forget('role');
        session()->flush();

        return redirect(route('auth.index'));
    }

    public function home() {
        return view('auth.home');
    }

    public function grafik() {
        $year = Carbon::now()->year;

        $record = DB::table('jenisikan')
                    ->selectRaw(DB::raw('jenis_ikan, penangkapan.jumlah_tangkapan as jumlah_tangkapan'))
                    ->leftJoin('penangkapan','penangkapan.jenisikan_id','=','jenisikan.id')
                    ->groupBy('jenisikan.jenis_ikan')
                    ->whereYear('penangkapan.created_at', $year)
                    ->get();

        $record2 = DB::table('jenis_alat_penangkap')
                    ->selectRaw(DB::raw('alat_penangkap, count(*) as jumlah_alat'))
                    ->leftJoin('penangkapan','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                    ->groupBy('jenis_alat_penangkap.alat_penangkap')
                    ->whereYear('penangkapan.created_at', $year)
                    ->get();

        $record3 = DB::table('users')
                    ->selectRaw(DB::raw('kecamatan.kecamatan, count(DISTINCT users.id) as jumlah'))
                    ->Join('wilayah_kerja','wilayah_kerja.user_id','=','users.id')
                    ->Join('kecamatan','wilayah_kerja.kecamatan_id','=','kecamatan.id')
                    ->Join('penangkapan','penangkapan.user_id','users.id')
                    ->groupBy('wilayah_kerja.kecamatan_id')
                    ->get();
         $dt = [];

        foreach($record as $row) {
            $dt['label'][] = $row->jenis_ikan;
            $dt['data'][] = (int) $row->jumlah_tangkapan;
        }

        $dt2 = [];

        foreach($record2 as $row2) {
            $dt2['label'][] = $row2->alat_penangkap;
            $dt2['data'][] = (float) $row2->jumlah_alat;
        }

        $dt3 = [];

        foreach($record3 as $row3) {
            $dt3['label'][] = $row3->kecamatan;
            $dt3['data'][] = (float) $row3->jumlah;
        }

        $data['chart_ikan'] = json_encode($dt);
        $data['chart_alat'] = json_encode($dt2);
        $data['chart_wilayah'] = json_encode($dt3);

        $data['year'] = $year;
        return view('auth.grafik', $data);
    }

    public function contact() {
        return view('auth.contact');
    }

    public function faq() {
        return view('auth.faq');
    }

}
