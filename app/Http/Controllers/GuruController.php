<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Kelas;
use App\Siswa;
use App\Kh;
use App\ThAjar;
use App\UjiKh;
use App\RekapKh;

class GuruController extends Controller
{
    public function index(){
        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
    	return view('guru/home', $data);
    }

    public function edit($id)
    {
        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        // mengambil data users berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        $data['users'] = $users;
        // passing data admin yang didapat ke view edit_profil.blade.php
        return view('/guru/edit_profil',$data);
    }

    public function update(Request $request, $id){
        DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama
        ]);   

        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        // mengambil data users berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        $data['users'] = $users;
        // passing data admin yang didapat ke view edit_profil.blade.php
        return view('/guru/edit_profil',$data);
    }

    public function updatefoto(Request $request, $id){
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'profile';
        $file->move($tujuan_upload,$nama_file);
 
        DB::table('users')->where('id',$request->id)->update([
            'foto' => $nama_file
        ]);   

        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        // mengambil data users berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        $data['users'] = $users;
        // passing data admin yang didapat ke view edit_profil.blade.php
        return view('/guru/edit_profil',$data);
    }

    public function updatepw(Request $request, $id){
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        DB::table('users')->where('id',$request->id)->update([
            'password' => bcrypt($request->password)
        ]);   

        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        // mengambil data users berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        $data['users'] = $users;
        // passing data admin yang didapat ke view edit_profil.blade.php
        return view('/guru/edit_profil',$data);
    }

    public function kelas($k_id){
        $kelas = DB::table('m_kelas')
              ->where('k_id',$k_id)
              ->get();
        $th_ajar = DB::table('m_th_ajar')
              ->where('m_th_ajar.status', "AKTIF")
              ->get();
        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        $data['kelas'] = $kelas;
        $data['k_id'] = $k_id;
        $data['th_ajar'] = $th_ajar;

        return view('/guru/wali/index',$data);
    }

    public function rekap_kelas($k_id){
        $th_ajar = DB::table('m_th_ajar')
              ->where('m_th_ajar.status', "AKTIF")
              ->get();
        foreach ($th_ajar as $ta) {
            $id_th_ajar = $ta->ta_id;
        }
        $kelas = DB::table('m_kelas')
              ->where('k_id',$k_id)
              ->get();
        $kh = DB::table('uji_kh')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.ta_id',$id_th_ajar)
            ->where('uji_kh.k_id',$k_id)
            ->select('m_kh.kh_nama')
            ->get();
        $siswa = DB::table('m_siswa')
            ->where('k_id', $k_id)
            ->where('status', '!=', "BOYONG")
            ->select('s_nama', 'nis', 'status')
            ->get();
        $rekapkh = DB::table('rekap_kh')
            ->join('uji_kh', 'uji_kh.uji_id', '=', 'rekap_kh.uji_id')
            ->join('m_siswa', 'm_siswa.s_id', '=', 'rekap_kh.s_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.ta_id',$id_th_ajar)
            ->where('uji_kh.k_id',$k_id)
            ->select('m_kh.kh_nama', 'm_siswa.s_nama', 'rekap_kh.total', 'rekap_kh.kriteria')
            ->get();
        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();    
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        $data['no'] = 1;
        $data['th_ajar'] = $th_ajar;
        $data['kelas'] = $kelas;
        $data['kh'] = $kh;
        $data['siswa'] = $siswa;
        $data['rekapkh'] = $rekapkh;

        return view('/guru/wali/rekap_kh',$data);
    }

    public function rekap($uji_id)
    {
        $kh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.uji_id',$uji_id)
            ->get();

        foreach ($kh as $khs) {
            $aspek1 = $khs->aspek1;
            $aspek2 = $khs->aspek2;
            $aspek3 = $khs->aspek3;
            $aspek4 = $khs->aspek4;
            $max_a1 = $khs->max_a1;
            $max_a2 = $khs->max_a2;
            $max_a3 = $khs->max_a3;
            $max_a4 = $khs->max_a4;
        }

        $cek = DB::table('uji_kh')
            ->where('uji_id',$uji_id)
            ->get();

        foreach ($cek as $c) {
            if ($c->penguji == Auth::user()->nama) {
                $rekapkh = DB::table('rekap_kh')
                    ->join('m_siswa', 'm_siswa.s_id', '=', 'rekap_kh.s_id')
                    ->where('rekap_kh.uji_id',$uji_id)
                    ->get();
            }
        }

        $ujikh = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.uji_id',$uji_id)
            ->get();

        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();

        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();

        $data['namakh'] = $namakh;
        $data['ujikh'] = $ujikh;
        $data['kh'] = $kh;
        $data['uji_id'] = $uji_id;
        $data['aspek1'] = $aspek1;
        $data['aspek2'] = $aspek2;
        $data['aspek3'] = $aspek3;
        $data['aspek4'] = $aspek4;
        $data['max_a1'] = $max_a1;
        $data['max_a2'] = $max_a2;
        $data['max_a3'] = $max_a3;
        $data['max_a4'] = $max_a4;
        $data['rekapkh'] = $rekapkh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;
        return view('/guru/rekapkh/index', $data);
    }

    function updatenilai(Request $request, $r_id, $uji_id)
    {
        $kh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.uji_id',$uji_id)
            ->get();

        foreach ($kh as $khs) {
            $kkm = $khs->kkm;
            $ta_id = $khs->ta_id;
        }

        if ($request->nilai_a1 + $request->nilai_a2 + $request->nilai_a3 + $request->nilai_a4 >= $kkm) {
            $kriteria = "TUNTAS";
        }
        else{
            $kriteria = "TIDAK TUNTAS";
        }

        DB::table('rekap_kh')->where('r_id',$r_id)->update([
            'nilai_a1' => $request->nilai_a1,
            'nilai_a2' => $request->nilai_a2,
            'nilai_a3' => $request->nilai_a3,
            'nilai_a4' => $request->nilai_a4,
            'total'    => $request->nilai_a1 + $request->nilai_a2 + $request->nilai_a3 + $request->nilai_a4,
            'kriteria' => $kriteria,
            'nama_penguji'  =>  Auth::user()->nama
        ]);

        $rekapkh = DB::table('rekap_kh')
            ->where('r_id',$r_id)
            ->get();     

        foreach ($rekapkh as $r) {
            $s_id = $r->s_id;
        }

        $tg_kh = DB::table('rekap_kh')
            ->join('m_siswa', 'm_siswa.s_id', '=', 'rekap_kh.s_id')
            ->join('uji_kh', 'uji_kh.uji_id', '=', 'rekap_kh.uji_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('rekap_kh.s_id',$s_id)
            ->where('uji_kh.ta_id',$ta_id)
            ->select('m_kh.kh_nama', 'rekap_kh.kriteria')
            ->get();
        $sum = 0;
        $ket = "";
        foreach ($tg_kh as $tk) {
            if ($tk->kriteria == "TUNTAS") {
                $sum += 1;
            }
            else if ($tk->kriteria != "TUNTAS") {
                $ket = $ket . '- ' . $tk->kh_nama.' ';
            }
        }
        if ($sum == 4) {
            DB::table('tanggungan_smt')
                ->where('ta_id',$ta_id)
                ->where('s_id',$s_id)
                ->update(['k_hijau' => "TUNTAS", 'ket_k_h' => $ket]);
        } 
        else {
            DB::table('tanggungan_smt')
                ->where('ta_id',$ta_id)
                ->where('s_id',$s_id)
                ->update(['ket_k_h' => $ket]);
        }

        $tg_smt = DB::table('tanggungan_smt')
            ->where('ta_id',$ta_id)
            ->where('s_id',$s_id)
            ->get();

        foreach ($tg_smt as $ts) {
            if (($ts->keuangan == "TUNTAS") && ($ts->k_hijau == "TUNTAS") && (($ts->paper == "TUNTAS") or ($ts->paper == "BELUM")) && ($ts->kartu_aksi == "PUNYA")) {
                DB::table('tanggungan_smt')
                    ->where('ta_id',$ta_id)
                    ->where('s_id',$s_id)
                    ->update([
                        'ketuntasan' => "TUNTAS" 
                    ]);
            }
            else{
                DB::table('tanggungan_smt')
                    ->where('ta_id',$ta_id)
                    ->where('s_id',$s_id)
                    ->update([
                        'ketuntasan' => "TIDAK TUNTAS" 
                ]);
            }
        }

        return redirect()->route('rekap.guru', $uji_id);
    }

    public function ceklist($k_id){
        $kelas = DB::table('m_kelas')
              ->where('k_id',$k_id)
              ->get();
        $th_ajar = DB::table('m_th_ajar')
              ->where('m_th_ajar.status', "AKTIF")
              ->get();
        foreach ($th_ajar as $ta) {
            $id_th_ajar = $ta->ta_id;
        }
        $siswa = DB::table('m_siswa')
            ->where('k_id', $k_id)
            ->where('status', '!=', "BOYONG")
            ->get();
        $tg_smt = DB::table('tanggungan_smt')
            ->join('m_siswa', 'm_siswa.s_id', '=', 'tanggungan_smt.s_id')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'm_siswa.k_id')
            ->where('m_kelas.k_id',$k_id)
            ->where('tanggungan_smt.ta_id', $id_th_ajar)
            ->get();

        $datauji = DB::table('uji_kh')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'uji_kh.k_id')
            ->join('m_th_ajar', 'm_th_ajar.ta_id', '=', 'uji_kh.ta_id')
            ->join('m_kh', 'm_kh.kh_id', '=', 'uji_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->where('m_th_ajar.status', "AKTIF")
            ->get();   
        $walikelas = DB::table('m_kelas')
            ->join('users', 'users.id', '=', 'm_kelas.wali')
            ->where('users.nama', Auth::user()->nama)
            ->where('m_kelas.tingkat', '!=', 13)
            ->get();
        $namakh = DB::table('m_kh')
            ->join('uji_kh', 'uji_kh.kh_id', '=', 'm_kh.kh_id')
            ->where('uji_kh.penguji', Auth::user()->nama)
            ->select('m_kh.kh_nama')->distinct()
            ->get();
        $data['namakh'] = $namakh;
        $data['datauji'] = $datauji;
        $data['walikelas'] = $walikelas;

        $data['kelas'] = $kelas;
        $data['k_id'] = $k_id;
        $data['th_ajar'] = $th_ajar;
        $data['siswa'] = $siswa;
        $data['tg_smt'] = $tg_smt;

        return view('guru/wali/ceklist', $data);
    }

    function updateceklist(Request $request, $tg_id, $k_id)
    {
        DB::table('tanggungan_smt')->where('tg_id',$tg_id)->update([
            'keuangan' => $request->keuangan,
            'ket_keu' => $request->ket_keu,
            'k_hijau' => $request->k_hijau,
            'ket_k_h' => $request->ket_k_h,
            'paper' => $request->paper,
            'ket_ppr' => $request->ket_ppr,
            'kartu_aksi' => $request->kartu_aksi,
            'ujian' => $request->ujian,
            'osis' => $request->osis,
            'da' => $request->da,
            'pmr' => $request->pmr 
        ]);

        $tg_smt = DB::table('tanggungan_smt')
            ->where('tg_id',$tg_id)
            ->get();

        foreach ($tg_smt as $ts) {
            if (($ts->keuangan == "TUNTAS") && ($ts->k_hijau == "TUNTAS") && (($ts->paper == "TUNTAS") or ($ts->paper == "BELUM")) && ($ts->kartu_aksi == "PUNYA")) {
                DB::table('tanggungan_smt')->where('tg_id',$tg_id)->update([
                    'ketuntasan' => "TUNTAS" 
                ]);
            }
            else{
                DB::table('tanggungan_smt')->where('tg_id',$tg_id)->update([
                    'ketuntasan' => "TIDAK TUNTAS" 
                ]);
            }
        }

        return redirect()->route('ceklist.kelas', $k_id);
    }
}
