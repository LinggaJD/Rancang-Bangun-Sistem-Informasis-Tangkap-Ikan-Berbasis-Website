<?php

namespace App\Http\Controllers;

use App\Exports\AlatPenangkapIkanExport;
use App\Exports\FormAlatPenangkapIkan;
use App\Exports\FormJenisIkan;
use App\Exports\FormJenisKapal;
use App\Exports\JenisIkanExport;
use App\Exports\JenisKapalExport;
use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\JenisAlatPenangkap;
use App\Kecamatan;
use App\Role;
use App\Role_User;
use Illuminate\Support\Facades\Hash;
use App\JenisIkan;
use App\JenisKapal;
use App\WilayahKerja;
use App\Penangkapan;
use App\Exports\PenangkapanExport;
use App\Imports\ImportAlatPenangkapIkan;
use App\Imports\ImportJenisIkan;
use App\Imports\ImportJenisKapal;
use App\Laporan;
use App\Pengumuman;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
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
        return view('admin.beranda', $data);
    }
    // Jenis Alat Penangkap
    public function jenis_alat_penangkap() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jenis_alat_penangkap'] = JenisAlatPenangkap::all();

        return view('admin.jenis_alat_penangkap', $data);
    }
    public function jenis_alat_penangkap_create() {
        $data['usx'] = User::find(session()->get('id_user'));

        return view('admin.jenis_alat_penangkap_create', $data);
    }
    public function jenis_alat_penangkap_store(Request $request) {
        $request->validate([
            'alat_penangkap' => 'required',
            'kelompok' => 'required',
        ]);

        $jk = new JenisAlatPenangkap();
        $jk->alat_penangkap = $request->alat_penangkap;
        $jk->kelompok = $request->kelompok;
        $jk->save();

        Alert::success('Berhasil!');
        return redirect(route('jenis.alat.penangkap'));
    }
    public function jenis_alat_penangkap_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jenis_alat_penangkap'] = JenisAlatPenangkap::findOrFail($id);

        return view('admin.jenis_alat_penangkap_edit', $data);
    }
    public function jenis_alat_penangkap_update(Request $request, $id) {
        $request->validate([
            'alat_penangkap' => 'required',
            'kelompok' => 'required',
        ]);

        $jk = JenisAlatPenangkap::find($id);
        $jk->alat_penangkap = $request->alat_penangkap;
        $jk->kelompok = $request->kelompok;
        $jk->save();

        Alert::success('Berhasil!');
        return redirect(route('jenis.alat.penangkap'));
    }
    public function jenis_alat_penangkap_destroy($id) {
        JenisAlatPenangkap::findOrFail($id)->delete();
        Alert::success('Berhasil!');
        return redirect(route('jenis.alat.penangkap'));
    }
    // Jenis Ikan
    public function jenis_ikan() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jenisikan'] = DB::table('jenisikan')->get();
        return view('admin.jenisikan', $data);
    }
    public function jenis_ikan_create() {
        $data['usx'] = User::find(session()->get('id_user'));
        return view('admin.jenisikan_create', $data);
    }
    public function jenis_ikan_store(Request $request) {
        $request->validate([
            'jenisikan' => 'required',
            'kode_fao' => 'required',
            'jenis_perairan' => 'required',
            'hias' => 'required',
            'kelompok' => 'required',
            'kelompok_besar' => 'required',
        ]);

        $jk = new JenisIkan();
        $jk->jenis_ikan = $request->jenisikan;
        $jk->kode_fao = $request->kode_fao;
        $jk->jenis_perairan = $request->jenis_perairan;
        $jk->hias = $request->hias;
        $jk->kelompok = $request->kelompok;
        $jk->kelompok_besar = $request->kelompok_besar;
        $jk->save();

        Alert::success('Berhasil!');
        return redirect(route('jenis.ikan'));
    }
    public function jenis_ikan_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jenisikan'] =JenisIkan::findOrFail($id);
        return view('admin.jenisikan_edit', $data);
    }
    public function jenis_ikan_update(Request $request, $id) {
        $request->validate([
            'jenisikan' => 'required',
            'kode_fao' => 'required',
            'jenis_perairan' => 'required',
            'hias' => 'required',
            'kelompok' => 'required',
            'kelompok_besar' => 'required',
        ]);

        $jk = JenisIkan::find($id);
        $jk->jenis_ikan = $request->jenisikan;
        $jk->kode_fao = $request->kode_fao;
        $jk->jenis_perairan = $request->jenis_perairan;
        $jk->hias = $request->hias;
        $jk->kelompok = $request->kelompok;
        $jk->kelompok_besar = $request->kelompok_besar;
        $jk->save();

        Alert::success('Berhasil!');
        return redirect(route('jenis.ikan'));
    }
    public function jenis_ikan_destroy($id) {
        JenisIkan::findOrFail($id)->delete();

        Alert::success('Berhasil!');
        return redirect(route('jenis.ikan'));
    }
    // Jenis Kapal
    public function jenis_kapal() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jeniskapal'] = JenisKapal::all();
        return view('admin.jenis_kapal', $data);
    }

    public function jenis_kapal_create() {
        $data['usx'] = User::find(session()->get('id_user'));
        return view('admin.jenis_kapal_create', $data);
    }

    public function jenis_kapal_store(Request $request) {
        $request->validate([
            'jeniskapal' => 'required',
            'deskripsi_kapal' => 'required',
        ]);

        $jk = new JenisKapal();
        $jk->jenis_kapal = $request->jeniskapal;
        $jk->deskripsi_kapal = $request->deskripsi_kapal;
        $jk->save();

        Alert::success('Berhasil!');
        return redirect(route('jenis.kapal'));
    }

    public function jenis_kapal_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jeniskapal'] = JenisKapal::findOrFail($id);
        return view('admin.jenis_kapal_edit', $data);
    }

    public function jenis_kapal_update(Request $request, $id) {
        $request->validate([
            'jeniskapal' => 'required',
            'deskripsi_kapal' => 'required',
        ]);

        $jk = JenisKapal::find($id);
        $jk->jenis_kapal = $request->jeniskapal;
        $jk->deskripsi_kapal = $request->deskripsi_kapal;
        $jk->save();

        Alert::success('Berhasil!');
        return redirect(route('jenis.kapal'));
    }

    public function jenis_kapal_destroy($id) {
        JenisKapal::findOrFail($id)->delete();

        Alert::success('Berhasil!');
        return redirect(route('jenis.kapal'));
    }

    // Kecamatan
    public function kecamatan() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['kecamatan'] = Kecamatan::all();
        return view('admin.kecamatan', $data);
    }

    public function kecamatan_create() {
        $data['usx'] = User::find(session()->get('id_user'));

        return view('admin.kecamantan_create', $data);
    }

    public function kecamatan_store(Request $request) {
        $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
        ]);

        $kec = new Kecamatan();
        $kec->kecamatan = $request->kecamatan;
        $kec->desa = $request->desa;
        $kec->save();

        Alert::success('Berhasil!');
        return redirect(route('kecamatan'));
    }

    public function kecamatan_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['kecamatan'] = Kecamatan::findOrFail($id);

        return view('admin.kecamatan_edit', $data);
    }

    public function kecamatan_update(Request $request, $kecamatan) {
        $request->validate([
            'kecamatan' => 'required',
            'desa' => 'required',
        ]);

        $kec = Kecamatan::find($kecamatan);
        $kec->kecamatan = $request->kecamatan;
        $kec->desa = $request->desa;
        $kec->save();

        Alert::success('Berhasil!');
        return redirect(route('kecamatan'));
    }

    public function kecamatan_destroy($id) {
        Kecamatan::findOrFail($id)->delete();
        Alert::success('Berhasil!');
        return redirect(route('kecamatan'));
    }

    // Penangkapan
    public function penangkapan_export() {
        $name = 'penangkapan-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new PenangkapanExport, $name);
    }

    // Export Produksi Perikanan
    public function jenis_kapal_export() {
        $name = 'jeniskapal-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new JenisKapalExport, $name);
    }

    public function jenis_alat_penangkap_export() {
        $name = 'jenisalatpenangkap-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new AlatPenangkapIkanExport, $name);
    }

    public function jenis_ikan_export() {
        $name = 'jenisikan-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new JenisIkanExport, $name);
    }

    public function laporan_export() {
        $name = 'laporan-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new LaporanExport, $name);
    }

    public function penangkapan(Request $request) {
        $data['usx'] = User::find(session()->get('id_user'));

        if($request->ajax()) {
            if(!empty($request->from_date)) {
                $data = DB::table('penangkapan')
                        ->select('*','penangkapan.id as pid','penangkapan.created_at as waktu')
                        ->leftJoin('users','penangkapan.user_id','=','users.id')
                        ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                        ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                        ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                        ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                        ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                        ->whereBetween('penangkapan.created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"])
                        ->get();
            } else {
                $data = DB::table('penangkapan')
                        ->select('*','penangkapan.id as pid','penangkapan.created_at as waktu')
                        ->leftJoin('users','penangkapan.user_id','=','users.id')
                        ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                        ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                        ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                        ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                        ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                        ->get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '
                            <div class="btn-group">

                            <a href="'.route('penangkapan.show',['penangkapan' => $row->pid]).'" class="edit btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                            <a href="'.route('penangkapan.edit',['penangkapan' => $row->pid]).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="'.route('penangkapan.destroy',['penangkapan' => $row->pid]).'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>
                            </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.penangkapan', $data);
    }

    public function penangkapan_show($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['penangkapan'] = DB::table('penangkapan')
                                    ->select('*','penangkapan.id as pid','penangkapan.created_at as waktu','jenis_alat_penangkap.kelompok as jenis_alat_penangkap_kelompok')
                                    ->leftJoin('users','penangkapan.user_id','=','users.id')
                                    ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                                    ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                                    ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                                    ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                                    ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                                    ->where('penangkapan.id', $id)
                                    ->first();
        return view('admin.penangkapan_detail', $data);
    }

    public function penangkapan_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['penangkapan'] = Penangkapan::findOrFail($id);
        $data['jenis_alat_penangkap'] = JenisAlatPenangkap::all();
        $data['jenisikan'] = JenisIkan::all();
        $data['jeniskapal'] = JenisKapal::all();

        return view('admin.penangkapan_edit', $data);
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
        $pg->jenis_alat_penangkap_id = $request->jenis_alat_penangkap;
        $pg->jenisikan_id = $request->jenisikan;
        $pg->jumlah_tangkapan = $request->nilai;
        $pg->jeniskapal_id = $request->jeniskapal;
        $pg->produksi = $request->produksi;
        $pg->nilai = $request->nilai * $request->produksi;

        $pg->save();

        Alert::success('Berhasil');
        return redirect(route('penangkapan'));
    }

    public function penangkapan_destroy($id) {
        $pg = Penangkapan::findOrFail($id);

        $pg->delete();

        Alert::success('Berhasil!');
        return redirect(route('penangkapan'));
    }

    public function report_penangkapan() {

        $data['penangkapan'] = DB::table('penangkapan')
                                ->select('*','penangkapan.id as pid','penangkapan.created_at as waktu')
                                ->leftJoin('users','penangkapan.user_id','=','users.id')
                                ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                                ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                                ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                                ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                                ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                                ->orderByDesc('penangkapan.created_at')
                                ->get();

        return view('admin.report_penangkapan', $data);
    }

    public function report_penangkapan_range(Request $request) {
        if(empty($request->from_date) && empty($request->to_date)) {

            Alert::error('Error','Kedua Tanggal tidak boleh kosong!');
            return redirect(route('penangkapan'));
        } else {
            $data['penangkapan'] = DB::table('penangkapan')
                                ->select('*','penangkapan.id as pid','penangkapan.created_at as waktu')
                                ->leftJoin('users','penangkapan.user_id','=','users.id')
                                ->leftJoin('jenis_alat_penangkap','penangkapan.jenis_alat_penangkap_id','=','jenis_alat_penangkap.id')
                                ->leftJoin('jenisikan','penangkapan.jenisikan_id','=','jenisikan.id')
                                ->leftJoin('jeniskapal','penangkapan.jeniskapal_id','=','jeniskapal.id')
                                ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                                ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                                ->whereBetween('penangkapan.created_at', [$request->from_date." 00:00:00", $request->to_date." 23:59:59"])
                                ->orderByDesc('penangkapan.created_at')
                                ->get();
            return view('admin.report_penangkapan_range', $data);
        }


    }

    // User
    public function user(Request $request) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jml_user'] = User::all()->count();

        if($request->ajax()) {
            $data = DB::table('users')
                        ->select('*','users.id as uid')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('role','role_user.role_id','=','role.id')
                        ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                        ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                        ->where('role','user')
                        ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '
                            <div class="btn-group">
                            <a href="'.route('user.show',['user' => $row->uid]).'" class="btn btn-info"><i class="fa fa-search"></i></a>
                            <a href="'.route('user.edit',['user' => $row->uid]).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="'.route('user.pass',['user' => $row->uid]).'" class="btn btn-warning"><i class="fa fa-user-lock"></i></a>
                            <a href="'.route('user.destroy',['user' => $row->uid]).'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>
                            </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user', $data);
    }

    public function user_admin(Request $request) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['jml_user'] = User::all()->count();
        if($request->ajax()) {
            $data = DB::table('users')
                        ->select('*','users.id as uid')
                        ->leftJoin('role_user','users.id','=','role_user.user_id')
                        ->leftJoin('role','role_user.role_id','=','role.id')
                        ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                        ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                        ->where('role','admin')
                        ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '
                            <div class="btn-group">
                            <a href="'.route('user.show',['user' => $row->uid]).'" class="btn btn-info"><i class="fa fa-search"></i></a>
                            <a href="'.route('user.edit',['user' => $row->uid]).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="'.route('user.pass',['user' => $row->uid]).'" class="btn btn-warning"><i class="fa fa-user-lock"></i></a>
                            <a href="'.route('user.destroy',['user' => $row->uid]).'" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>
                            </div>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user_admin', $data);
    }

    public function user_create() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['role'] = Role::all();
        $data['kecamatan'] = Kecamatan::all();
        $data['enumerator'] = DB::table('enumerator')->get();
        return view('admin.user_create', $data);
    }

    public function user_store(Request $request) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
            'alamat' => 'required',
            'password' => 'required|same:konfirmasi_password',
            'konfirmasi_password' => 'required|same:password',
            'foto' => 'max:1000|file|image',
            'wilayah_kerja' => 'required',
            'enumerator' => 'required',
            'role' => 'required'
        ]);

        $user = new User();
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telp = $request->telp;
        $user->alamat = $request->alamat;
        if($request->hasFile('foto')) {
            $extFile = $request->foto->getClientOriginalExtension();
            $namaFile = 'foto-'.time().".".$extFile;
            $path = $request->foto->move('img/foto', $namaFile);
            $user->foto = $path;
        } else {
            $user->foto = 'img/foto/avatar.png';
        }
        $user->save();

        $user_id = $user->id;

        $role_user = new Role_User();
        $role_user->user_id = $user_id;
        $role_user->role_id = $request->role;
        $role_user->save();

        $wilayah_kerja = new WilayahKerja();
        $wilayah_kerja->user_id = $user_id;
        $wilayah_kerja->kecamatan_id = $request->wilayah_kerja;
        $wilayah_kerja->save();

        DB::table('enumerator_user')->insert([
            'user_id' => $user_id,
            'enumerator_id' => $request->enumerator,
        ]);

        Alert::success('Berhasil!');
        return back();
    }

    public function user_destroy($id) {
        $user = User::findOrFail($id);

        if($user->foto != 'img/foto/avatar.png') {
            File::delete($user->foto);
        }

        DB::table('wilayah_kerja')
            ->where('user_id', $id)
            ->delete();

        $user->delete();

        Alert::success('Berhasil!');
        return back();
    }

    public function user_edit($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['user'] = User::findOrFail($id);
        $data['role'] = Role::all();
        $data['kecamatan'] = Kecamatan::all();
        $data['role_user'] = Role_User::where('user_id', $id)->first();
        $data['wilayah_kerja'] = WilayahKerja::where('user_id', $id)->first();
        $data['enumerator'] = DB::table('enumerator')->get();
        $data['enumerator_user'] = DB::table('enumerator_user')->where('user_id', $id)->first();
        return view('admin.user_edit', $data);
    }

    public function user_update(Request $request, $id) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
            'alamat' => 'required',
            'foto' => 'max:1000|file|image',
            'wilayah_kerja' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->telp = $request->telp;
        $user->alamat = $request->alamat;
        if($request->hasFile('foto')) {

            if($user->foto != 'img/foto/avatar.png') {
                File::delete($user->foto);
            }

            $extFile = $request->foto->getClientOriginalExtension();
            $namaFile = 'foto-'.time().".".$extFile;
            $path = $request->foto->move('img/foto', $namaFile);
            $user->foto = $path;
        }
        $user->save();


        $role_user = Role_User::where('user_id', $id)->first();
        $role_user->user_id = $user->id;
        $role_user->role_id = $request->role;
        $role_user->save();

        $wilayah_kerja = WilayahKerja::where('user_id', $id)->first();
        $wilayah_kerja->user_id = $user->id;
        $wilayah_kerja->kecamatan_id = $request->wilayah_kerja;
        $wilayah_kerja->save();

        DB::table('enumerator_user')
            ->where('user_id', $user->id)
            ->update([
            'enumerator_id' => $request->enumerator,
        ]);

        Alert::success('Berhasil!');
        return back();
    }

    public function user_show($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['user'] = DB::table('users')
                            ->select('*','users.id as uid')
                            ->where('users.id', $id)
                            ->leftJoin('wilayah_kerja','wilayah_kerja.user_id','=','users.id')
                            ->leftJoin('kecamatan','wilayah_kerja.kecamatan_id','=','kecamatan.id')
                            ->leftJoin('role_user','users.id','=','role_user.user_id')
                            ->leftJoin('role','role_user.role_id','=','role.id')
                            ->leftJoin('enumerator_user','enumerator_user.user_id','=','users.id')
                            ->leftJoin('enumerator','enumerator_user.enumerator_id','=','enumerator.id')
                            ->first();

        return view('admin.user_show', $data);
    }

    public function user_pass($id) {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['user'] = User::findOrFail($id);

        return view('admin.user_pass', $data);
    }

    public function user_pass_act(Request $request, $id) {
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
            return back();
        }
    }

    // Laporan
    public function laporan() {
        $data['usx'] = User::find(session()->get('id_user'));
        $data['laporan'] = DB::table('laporan')
                            ->selectRaw('*, laporan.created_at as laporan_waktu')
                            ->leftJoin('users','laporan.user_id','users.id')
                            ->leftJoin('wilayah_kerja','users.id','wilayah_kerja.user_id')
                            ->leftJoin('kecamatan','wilayah_kerja.kecamatan_id','kecamatan.id')
                            ->orderByDesc('laporan.created_at')
                            ->get();
        $data['pengumuman'] = DB::table('pengumuman')->first();
        return view('admin.laporan', $data);
    }

    public function pengumuman_edit(Request $request) {
        if($request->pengumuman == null) {
            Alert::error('Kolom pengumuman tidak boleh kosong!');
            return back();
        } else {
            $lap = Pengumuman::find($request->pengumuman_id);
            $lap->isi = $request->pengumuman;
            $lap->save();

            Alert::success('Berhasil!');

            return back();
        }
    }

    // Import
    public function jenis_kapal_form() {
        $name = 'formjeniskapal-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new FormJenisKapal, $name);
    }

    public function jenis_kapal_import(Request $request) {
        $validate = Validator::make($request->all(),[
            'file' => 'required|mimes:xlsx',
        ],[
            'file.required' => 'Tidak boleh kosong',
            'file.mimes' => 'Harus berekstensi .xlsx',
        ]);

        if($validate->fails()) {
            return back()
                    ->with('error_add','Error')
                    ->withErrors($validate);
        } else {

            try {
                Excel::import(new ImportJenisKapal, $request->file('file'));
                Alert::success('Berhasil');
                return back();
            } catch (\Exception $e) {
                Alert::error($e);
                return back();
            }
        }
    }

    public function alat_penangkap_ikan_form() {
        $name = 'formalatpenangkapikan-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new FormAlatPenangkapIkan, $name);
    }

    public function alat_penangkap_import(Request $request) {
        $validate = Validator::make($request->all(),[
            'file' => 'required|mimes:xlsx',
        ],[
            'file.required' => 'Tidak boleh kosong',
            'file.mimes' => 'Harus berekstensi .xlsx',
        ]);

        if($validate->fails()) {
            return back()
                    ->with('error_add','Error')
                    ->withErrors($validate);
        } else {

            try {
                Excel::import(new ImportAlatPenangkapIkan, $request->file('file'));
                Alert::success('Berhasil');
                return back();
            } catch (\Exception $e) {
                Alert::error($e);
                return back();
            }
        }
    }

    public function jenis_ikan_form() {
        $name = 'formjenisikan-';
        $name .= Carbon::now();
        $name .= '.xlsx';
        return Excel::download(new FormJenisIkan, $name);
    }

    public function jenis_ikan_import(Request $request) {
        $validate = Validator::make($request->all(),[
            'file' => 'required|mimes:xlsx',
        ],[
            'file.required' => 'Tidak boleh kosong',
            'file.mimes' => 'Harus berekstensi .xlsx',
        ]);

        if($validate->fails()) {
            return back()
                    ->with('error_add','Error')
                    ->withErrors($validate);
        } else {

            try {
                Excel::import(new ImportJenisIkan, $request->file('file'));
                Alert::success('Berhasil');
                return back();
            } catch (\Exception $e) {
                Alert::error($e);
                return back();
            }
        }
    }


}
