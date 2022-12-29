<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Kecamatan;
use App\WilayahKerja;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use App\JenisAlatPenangkap;
use App\JenisIkan;
use App\JenisKapal;
use App\Penangkapan;
use Illuminate\Support\Facades\File;
use App\Exports\PenangkapanExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller {
    public function index() {
        $data['usx'] = User::find(session()->get('id_user'));

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
        return view('user.beranda', $data);
    }

    public function penangkapan_export() {
        return Excel::download(new PenangkapanExport, 'penangkapan.xlsx');
    }

    public function penangkapan(Request $request) {
        $data['usx'] = User::find(session()->get('id_user'));

        if($request->ajax()) {
            $data = DB::table('penangkapan')
                        ->select('*','penangkapan.id as pid')
                        ->leftJoin('users','penangkapan.user_id','=','users.id')
                        ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                        ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                        ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                        ->where('penangkapan.user_id', session()->get('id_user'))
                        ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '
                            <div class="btn-group">

                            <a href="'.route('account.penangkapan.show',['penangkapan' => $row->pid]).'" class="edit btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                            <a href="'.route('account.penangkapan.edit',['penangkapan' => $row->pid]).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="'.route('account.penangkapan.destroy',['penangkapan' => $row->pid]).'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>
                            </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.penangkapan', $data);
    }

    public function penangkapan_show($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['penangkapan'] = DB::table('penangkapan')
                                    ->select('*','penangkapan.id as pid','penangkapan.created_at as waktu','jenis_alat_penangkap.kelompok as jenis_alat_penangkap_kelompok')
                                    ->leftJoin('users','penangkapan.user_id','=','users.id')
                                    ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                                    ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                                    ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                                    ->where('penangkapan.id', $id)
                                    ->first();
        return view('user.penangkapan_detail', $data);
    }

    public function penangkapan_create() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jenis_alat_penangkap'] = JenisAlatPenangkap::all();
        $data['jenisikan'] = JenisIkan::all();
        $data['jeniskapal'] = JenisKapal::all();
        return view('user.penangkapan_create', $data);
    }

    public function penangkapan_store(Request $request) {
        $request->validate([
            'jenis_alat_penangkap' => 'required',
            'jenisikan' => 'required',
            'nilai' => 'required',
            'jeniskapal' => 'required',
            'produksi' => 'required',

        ]);

        $pg = new Penangkapan();
        $pg->user_id = session()->get('id_user');
        $pg->jenis_alat_penangkap_id = $request->jenis_alat_penangkap;
        $pg->jenisikan_id = $request->jenisikan;
        $pg->jumlah_tangkapan = $request->nilai;
        $pg->jeniskapal_id = $request->jeniskapal;
        $pg->produksi = $request->produksi;
        $pg->nilai = $request->nilai * $request->produksi;

        $pg->save();

        Alert::success('Berhasil');
        return redirect(route('account.penangkapan'));
    }

    public function penangkapan_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['penangkapan'] = Penangkapan::findOrFail($id);
        $data['jenis_alat_penangkap'] = JenisAlatPenangkap::all();
        $data['jenisikan'] = JenisIkan::all();
        $data['jeniskapal'] = JenisKapal::all();

        return view('user.penangkapan_edit', $data);
    }

    public function penangkapan_update(Request $request, $id) {
        $request->validate([
            'jenis_alat_penangkap' => 'required',
            'jenisikan' => 'required',
            'jeniskapal' => 'required',
            'nilai' => 'required',
            'produksi' => 'required',

        ]);

        $pg = Penangkapan::find($id);
        $pg->user_id = session()->get('id_user');
        $pg->jenis_alat_penangkap_id = $request->jenis_alat_penangkap;
        $pg->jenisikan_id = $request->jenisikan;
        $pg->jumlah_tangkapan = $request->nilai;
        $pg->jeniskapal_id = $request->jeniskapal;
        $pg->produksi = $request->produksi;
        $pg->nilai = $request->nilai * $request->produksi;

        $pg->save();

        Alert::success('Berhasil');
        return redirect(route('account.penangkapan'));
    }

    public function penangkapan_destroy($id) {
        $pg = Penangkapan::findOrFail($id);

        $pg->delete();

        Alert::success('Berhasil!');
        return redirect(route('account.penangkapan'));
    }

    public function profile() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['user'] = DB::table('users')
                            ->select('*','users.id as uid')
                            ->leftJoin('wilayah_kerja','users.id','=','wilayah_kerja.user_id')
                            ->leftJoin('kecamatan','wilayah_kerja.kecamatan_id','=','kecamatan.id')
                            ->leftJoin('enumerator_user','users.id','=','enumerator_user.user_id')
                            ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                            ->where('users.id',session()->get('id_user'))
                            ->first();
        return view('user.profile', $data);
    }



    public function profile_pass() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['user'] = User::findOrFail(session()->get('id_user'));

        return view('user.profile_pass', $data);
    }

    public function profile_pass_act(Request $request, $id) {
        $request->validate([
            'password' => 'required|same:konfirmasi_password',
            'konfirmasi_password' => 'required|same:password',
        ]);

        $pass = User::findOrFail($id);

        if(Hash::check($request->password, $pass->password)) {
            Alert::error('Gagal!','Password baru tidak boleh sama dengan Password Lama');
            return back();
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();

            Alert::success('Berhasil!');
            return redirect()->route('account.profile');
        }
    }

    // Laporan
    public function laporan() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['laporan'] = DB::table('laporan')
                            ->selectRaw('*, laporan.id as laporan_id, laporan.created_at as laporan_waktu')
                            ->leftJoin('users','laporan.user_id','users.id')
                            ->leftJoin('wilayah_kerja','users.id','wilayah_kerja.user_id')
                            ->leftJoin('kecamatan','wilayah_kerja.kecamatan_id','kecamatan.id')
                            ->where('users.id', session()->get('id_user'))
                            ->orderByDesc('laporan.created_at')
                            ->get();

        return view('user.laporan', $data);
    }

    public function laporan_create() {
        $data['usx'] = User::find(session()->get('id_user'));

        return view('user.laporan_create', $data);
    }

    public function laporan_store(Request $request) {
        $request->validate([
            'laporan' => 'required',
        ],[
            'laporan.required' => 'Kolom Laporan tidak boleh kosong',
        ]);

        DB::table('laporan')->insert([
            'user_id' => session()->get('id_user'),
            'laporan' => $request->laporan,
            'created_at' => Carbon::now(),
        ]);

        Alert::success('Berhasil!');

        return redirect(route('account.laporan'));
    }

    public function laporan_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['laporan'] = DB::table('laporan')->where('id', $id)->first();

        return view('user.laporan_edit', $data);
    }

    public function laporan_update(Request $request, $id) {
        $request->validate([
            'laporan' => 'required',
        ],[
            'laporan.required' => 'Kolom Laporan tidak boleh kosong',
        ]);

        DB::table('laporan')
            ->where('id', $id)
            ->update([
            'laporan' => $request->laporan,
            'updated_at' => Carbon::now(),
        ]);

        Alert::success('Berhasil!');

        return redirect(route('account.laporan'));
    }

    public function laporan_destroy($id) {
        DB::table('laporan')->where('id', $id)->delete();
        Alert::success('Berhasil!');

        return redirect(route('account.laporan'));
    }

}
