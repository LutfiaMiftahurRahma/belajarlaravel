<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Input;  
use Excel;
use Validator;
use Redirect;
use App\User;
use App\Kelas;
use App\Siswa;

class SiswaController extends Controller
{
    public function index($k_id){
    	$data['no'] = 1;
        $kelas = DB::table('m_kelas')
            ->where('k_id',$k_id)
            ->get();
        $siswa = DB::table('m_siswa')
        	->join('m_kelas', 'm_kelas.k_id', '=', 'm_siswa.k_id')
        	->where('m_siswa.k_id',$k_id)
        	->get();
        $data['kelas'] = $kelas;
        $data['siswa'] = $siswa;  
        return view('/admin/siswa/index',$data);
    }

    public function insert($k_id)
    {
        $kelas = DB::table('m_kelas')
            ->where('k_id',$k_id)
            ->get();
        $data['kelas'] = $kelas;
        return view('/admin/siswa/insert',$data);
    }

    public function store(Request $request, $k_id)
    {
        $siswa = new Siswa;
        $siswa->k_id    = $request->k_id;
        $siswa->nis     = $request->nis;
        $siswa->nisn    = $request->nisn;
        $siswa->s_nama  = $request->s_nama;
        $siswa->status  = $request->status;
        $siswa->jenis_kel = $request->jenis_kel;
        $siswa->transkrip_kh = NULL;
        $siswa->th_lulus = NULL;
        $siswa->alamat = NULL;
        $siswa->ketuntasan = NULL;
        $siswa->tg_keuangan = "BELUM LUNAS";
        $siswa->bukti_keuangan = NULL;
        $siswa->nominal = NULL;
        $siswa->ket_keuangan = NULL;
        $siswa->tg_pondok = "TIDAK TUNTAS";
        $siswa->nominal_pondok = NULL;
        $siswa->bukti_pondok = NULL;
        $siswa->ket_pondok = NULL;
        $siswa->tg_aman_pa = "TIDAK TUNTAS";
        $siswa->nominal_aman_pa = NULL;
        $siswa->bukti_aman_pa = NULL;
        $siswa->ket_aman_pa = NULL;
        $siswa->tg_dzikrul = "TIDAK TUNTAS";
        $siswa->nilai_dzikrul = NULL;
        $siswa->tg_paper = "BELUM UJIAN";
        $siswa->ket_paper = NULL;
        $siswa->tg_perpus = "TIDAK TUNTAS";
        $siswa->denda_perpus = NULL;
        $siswa->ket_perpus = NULL;
        $siswa->status_ijazah = NULL;

        if ($siswa->save()){
            $rekapkh = DB::table('uji_kh')
                ->where('uji_kh.k_id',$k_id)
                ->get();
            foreach ($rekapkh as $row){
                DB::table('rekap_kh')->insert([
                  ['uji_id' => $row->uji_id, 
                    's_id' => $siswa->s_id,
                    'nilai_a1' => NULL,
                    'nilai_a2' => NULL,
                    'nilai_a3' => NULL,
                    'nilai_a4' => NULL,
                    'total' => NULL,
                    'kriteria' => NULL,
                   'nama_penguji' => NULL
                  ],
                ]);
            }    
            return redirect()->route('siswa',$k_id);
        }
        else{
            return redirect()->route('insert.siswa',$k_id);
        } 
    }

    public function edit($id)
    {
        $siswa = DB::table('m_siswa')
            ->where('s_id',$id)
            ->get();
        $data['siswa'] = $siswa;
        return view('/admin/siswa/edit',$data);
    }

    public function update(Request $request, $s_id, $k_id){
        DB::table('m_siswa')->where('s_id',$s_id)->update([
            'nis'   => $request->nis,
            'nisn'  => $request->nisn,
            's_nama'=> $request->s_nama,
            'status'=> $request->status
        ]);           
        return redirect()->route('siswa', $k_id);
    }

    public function delete($s_id, $k_id){
        $kelas = Siswa::findOrFail($s_id)->delete();
        return redirect()->route('siswa', $k_id);
    }

    public function pindah($id)
    {
        $siswa = DB::table('m_siswa')
            ->join('m_kelas', 'm_kelas.k_id', '=', 'm_siswa.k_id')
            ->where('m_siswa.s_id',$id)
            ->get();
        $kelas = DB::table('m_kelas')
            ->get();
        $data['siswa'] = $siswa;
        $data['kelas'] = $kelas;
        return view('/admin/siswa/pindah',$data);
    }

    public function updatekelas(Request $request, $s_id){
        DB::table('m_siswa')->where('s_id',$s_id)->update([
            'k_id'   => $request->kelas_baru
        ]);           
        return redirect()->route('siswa', $request->kelas_baru);
    }

    public function import($k_id)  
    {
        $kelas = DB::table('m_kelas')
            ->where('k_id',$k_id)
            ->get();
        $data['kelas'] = $kelas;
        return view('/admin/siswa/import',$data);  
    }

    public function importExcel($k_id)  
    {  
        if(Input::hasFile('import_file')){  
            $path = Input::file('import_file')->getRealPath();  
            $data = Excel::load($path, function($reader) {  
            })->get();  
            if(!empty($data) && $data->count()){  
                foreach ($data as $key => $value) {  
                    $insert[] = ['k_id' => $k_id, 'nis' => $value->nis,  's_nama' => $value->s_nama, 'nisn' => $value->nisn, 'status' => $value->status, 'jenis_kel' => $value->jenis_kel];  
                }  
                if(!empty($insert)){  
                    DB::table('m_siswa')->insert($insert);  
                    return redirect()->route('siswa', $k_id);  
                }  
            }  
        }  
        return back();  
    }
}
