<?php

namespace App\Http\Controllers;

use App\Ajaran;
use App\Pendaftaran;
use App\Mail\SendEmailVerifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PendaftaranController extends Controller
{
    public function index()
    {
        $ajaran = Ajaran::orderBy('id', 'DESC')->first();
        // if (empty($ajaran->id)) {
        //     return redirect()->back()->with('gagal', 'PPDB belum dibuka');
        // }
        return view('auth.pendaftaran', compact('ajaran'));
    }

    public function store(Request $request)
    {
        
        $ajaran = Ajaran::orderBy('id', 'DESC')->first();

        $this->validate($request, [
            'email' => 'required',
            'nik_wali' => 'required|min:16|max:16',
            'nama_wali' => 'required',
            'nama_calon' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
            'rt_rw' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'jarak' => 'required',
            'file_akta' => 'required|mimes:jpg,jpeg,png',
            'file_kk' => 'required|mimes:jpg,jpeg,png',
            'file_ktp' => 'required|mimes:jpg,jpeg,png',
        ]);

        // dd($request->all());

        if ($request->file_akta) {
            $file_akta = $request->file_akta;
            $new_file_akta = date('siHdmY') . "akta_" . $file_akta->getClientOriginalName();
            $file_akta->move('uploads/daftar/', $new_file_akta);
            $name_file_akta = 'uploads/daftar/' . $new_file_akta;
        }

        if ($request->file_kk) {
            $file_kk = $request->file_kk;
            $new_file_kk = date('siHdmY') . "kk_" . $file_kk->getClientOriginalName();
            $file_kk->move('uploads/daftar/', $new_file_kk);
            $name_file_kk = 'uploads/daftar/' . $new_file_kk;
        }

        if ($request->file_ktp) {
            $file_ktp = $request->file_ktp;
            $new_file_ktp = date('siHdmY') . "ktp_" . $file_ktp->getClientOriginalName();
            $file_ktp->move('uploads/daftar/', $new_file_ktp);
            $name_file_ktp = 'uploads/daftar/' . $new_file_ktp;
        }


        Pendaftaran::create([
            'email' => $request->email,
            'ajaran_id' => $ajaran->id,
            'ajaran_id' => $ajaran->id,
            'nik_wali' => $request->nik_wali,
            'nama_wali' => $request->nama_wali,
            'nama_calon' => $request->nama_calon,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => $request->anak_ke,
            'jumlah_saudara' => $request->jumlah_saudara,
            'rt_rw' => $request->rt_rw,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten_kota' => $request->kabupaten_kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'jarak' => $request->jarak,
            'file_akta' => $name_file_akta,
            'file_ktp' => $name_file_ktp,
            'file_kk' => $name_file_kk,
        ]);

        $details = [
            'title' => 'Selamat Pendaftaran Atas Nama '.$request->nama_calon.' Berhasil',
            'body' => 'Mohon Ditunggu Pemberitahuan Selanjutnya'
        ];

        Mail::to($request->email)->send(new SendEmailVerifikasi($details));


        return redirect('/verif')->with('success', 'Berhasil Daftar, silahkan untuk menunggu informasi selanjutnya!');
    }
}
