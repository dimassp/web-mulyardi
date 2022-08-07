<?php

namespace App\Http\Controllers;

use App\Ajaran;
use App\Exports\VerifikasiExport;
use App\Mail\SendEmailVerifikasi;
use App\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class VerifikasiController extends Controller
{
    public function ajaran()
    {
        $ajaran = Ajaran::all();

        return view('admin.verifikasi.ajaran', compact('ajaran'));
    }

    public function ajaran_store(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|string|max:100|unique:ajaran'
        ]);

        Ajaran::create([
            'tahun_ajaran' => $request->tahun_ajaran
        ]);

        return back()->with('success', 'Berhasil menambahkan Ajaran baru!');
    }

    public function ajaran_edit($id)
    {
        $id = Crypt::decrypt($id);
        $ajaran = Ajaran::find($id);

        return view('admin.verifikasi.ajaran_edit', compact('ajaran'));
    }


    public function ajaran_update(Request $request, $id)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|string|max:100|unique:ajaran'
        ]);

        $id = Crypt::decrypt($id);

        $ajaran = Ajaran::find($id);

        $ajaran->update([
            'tahun_ajaran' => $request->tahun_ajaran
        ]);

        return redirect()->route('verifikasi.ajaran.index')->with('success', 'Berhasil Update Ajaran!');
    }

    public function index($id)
    {
        $id = Crypt::decrypt($id);
        $pendaftaran = Pendaftaran::where('ajaran_id', $id)->latest()->get();
        $arr_baru = [];
        foreach ($pendaftaran as $key => $value) {
            $now = Carbon::now();
            $b_day = Carbon::parse($value['tanggal_lahir']); // Tanggal Lahir
            $age_years = $b_day->diff($now)->y;
            $age_month = $b_day->diff($now)->m;
            $age_days = $b_day->diff($now)->d;
            $arr_baru[$key]['id'] = $value['id'];
            $arr_baru[$key]['nama_calon'] = $value['nama_calon'];
            $arr_baru[$key]['email'] = $value['email'];
            $arr_baru[$key]['tempat_lahir'] = $value['tempat_lahir'];
            $arr_baru[$key]['tanggal_lahir'] = $value['tanggal_lahir'];
            $arr_baru[$key]['nik_wali'] = $value['nik_wali'];
            $arr_baru[$key]['nama_wali'] = $value['nama_wali'];
            $arr_baru[$key]['agama'] = $value['agama'];
            $arr_baru[$key]['alamat'] = $value['alamat'];
            $arr_baru[$key]['anak_ke'] = $value['anak_ke'];
            $arr_baru[$key]['jumlah_saudara'] = $value['jumlah_saudara'];
            $arr_baru[$key]['rt_rw'] = $value['rt_rw'];
            $arr_baru[$key]['desa_kelurahan'] = $value['desa_kelurahan'];
            $arr_baru[$key]['kecamatan'] = $value['kecamatan'];
            $arr_baru[$key]['kabupaten_kota'] = $value['kabupaten_kota'];
            $arr_baru[$key]['provinsi'] = $value['provinsi'];
            $arr_baru[$key]['telepon'] = $value['telepon'];
            $arr_baru[$key]['kode_pos'] = $value['kode_pos'];
            $arr_baru[$key]['pekerjaan'] = $value['pekerjaan'];
            $arr_baru[$key]['jarak'] = $value['jarak'];
            $arr_baru[$key]['file_akta'] = $value['file_akta'];
            $arr_baru[$key]['file_kk'] = $value['file_kk'];
            $arr_baru[$key]['file_ktp'] = $value['file_ktp'];
            $arr_baru[$key]['status'] = $value['status'];
            $arr_baru[$key]['tahun'] = $age_years;
            $arr_baru[$key]['bulan'] = $age_month;
            $arr_baru[$key]['hari'] = $age_days;
        }

        // uksort($arr_baru, function ($a, $b)  {
        //     $ret = 0;
        //    if ($a['tahun'] > $b['tahun']) {
        //         if ($a['bulan'] > $b['bulan']) {
        //             if ($a['hari'] > $b['hari']) {
        //                 $ret = 1; 
        //             }
        //         }
        //    }

        //     return $ret;
        // });


        return view('admin.verifikasi.index', compact('pendaftaran', 'arr_baru', 'id'));
    }


    // public function export_excel()
    // {
    //     return Excel::download(new VerifikasiExport, 'verifikasi.xlsx');
    // }

    public function export_pdf($id)
    {
        $id = Crypt::decrypt($id);
        $data = Pendaftaran::where('status', 1)->get();
        $tahun = $data->first();
        $pdf = PDF::loadView('data_pendaftaran', compact('data', 'tahun'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function send_email($id)
    {
        $details = [
            'title' => 'Selamat anda lolos seleksi di SDN 185 Cihaurgeulis',
            'body' => 'Selanjutnya anda diminta untuk melakukan daftar ulang yang akan dilaksanakan pada tanggal 27 Agustus SDN 185 Cihaurgeulis'
        ];

        $id = Crypt::decrypt($id);

        $pendaftaran = Pendaftaran::find($id);

        $pendaftaran_data = [
            'status' => 1,
        ];
        $pendaftaran->update($pendaftaran_data);

        Mail::to($pendaftaran->email)->send(new SendEmailVerifikasi($details));

        return redirect()->back()->with('success', 'Berhasil mengirimkan email ke user!');
    }

    public function send_email_gagal($id)
    {
        $details = [
            'title' => 'Mohon maaf anda tidak lolos seleksi di SDN 185 Cihaurgeulis',
            'body' => 'Silahkan untuk mencoba dikesempatan berikutnya'
        ];

        $id = Crypt::decrypt($id);

        $pendaftaran = Pendaftaran::find($id);

        $pendaftaran_data = [
            'status' => 2,
        ];
        $pendaftaran->update($pendaftaran_data);

        Mail::to($pendaftaran->email)->send(new SendEmailVerifikasi($details));

        return redirect()->back()->with('success', 'Berhasil mengirimkan email ke user!');
    }
}