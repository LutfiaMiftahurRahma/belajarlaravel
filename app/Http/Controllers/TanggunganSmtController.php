<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Kelas;
use App\Siswa;
use App\Kh;
use App\ThAjar;
use App\UjiKh;
use App\RekapKh;

class TanggunganSmtController extends Controller
{
    public function rekap($ta_id){
      $th_ajar = DB::table('m_th_ajar')
          ->where('ta_id',$ta_id)
          ->get();
      $rekaptg = DB::table('tanggungan_smt')
        ->join('m_siswa', 'm_siswa.s_id', '=', 'tanggungan_smt.s_id')
        ->join('m_kelas', 'm_siswa.k_id', '=', 'm_kelas.k_id')
        ->where('tanggungan_smt.ta_id',$ta_id)
        ->select('m_siswa.s_id', 'm_siswa.nis', 'm_siswa.s_nama', 'm_kelas.tingkat', 'm_kelas.k_nama', 'm_siswa.status', 'tanggungan_smt.keuangan', 'tanggungan_smt.ket_keu', 'tanggungan_smt.k_hijau', 'tanggungan_smt.ket_k_h', 'tanggungan_smt.paper', 'tanggungan_smt.ket_ppr', 'tanggungan_smt.kartu_aksi', 'tanggungan_smt.ketuntasan', 'tanggungan_smt.ujian', 'tanggungan_smt.osis', 'tanggungan_smt.da', 'tanggungan_smt.pmr')
        ->get();

      $data['no'] = 1;
      $data['th_ajar'] = $th_ajar;
      $data['rekaptg'] = $rekaptg;
      return view('/admin/tgsmt/rekap',$data);
    }
}
