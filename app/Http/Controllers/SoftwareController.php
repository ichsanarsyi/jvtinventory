<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\SoftwareModel;
use App\Exports\SoftwareExport;
use App\Exports\SoftwareLogExport;

use PDF;
use Excel;

class SoftwareController extends Controller
{    
    public function __construct()
    {
        $this->SoftwareModel = new SoftwareModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'software' => $this->SoftwareModel->allData(),
            'merk' => $this->SoftwareModel->allMerk(),
            'lisensi' => $this->SoftwareModel->allLisensi()
        ];
        return view('software.v_software', $data);
    }

    public function detailLog()
    {

        $data = [
            'logsoftware' => $this->SoftwareModel->logData(),
        ];
        return view('software.v_logsw', $data);
    }

    public function detail($id_sw, $id_merk_hw)
    {
        if (!$this->SoftwareModel->detailData($id_sw))
        {
            abort(404);
        }
        $data = [
            'software' => $this->SoftwareModel->detailData($id_sw),
            'merkhw' => $this->SoftwareModel->allMerkHw($id_merk_hw)
        ];
        return view('software.v_detailsw', $data);
    }

    public function add()
    {
        $id_kategori_hw5 = "5";
        $id_kategori_hw6 = "6";
        $data = [
            'merk' => $this->SoftwareModel->allMerk(),
            'lisensi' => $this->SoftwareModel->allLisensi(),
            'hardware' => $this->SoftwareModel->allHardware($id_kategori_hw5,$id_kategori_hw6)
        ];
        return view('software.v_addsw', $data);
    }
    
    public function insert()
    {
        Request()->validate([
            'nama_sw' => 'required',
            // 'id_merk_sw' => 'required',
            'id_jenis_lisensi' => 'required',
            // 'tgl_batas_lisensi' => 'required',
            'harga_sw' => 'numeric',
            // 'kode_lisensi' => 'required',
            // 'deskripsi_sw' => 'required',
            // 'versi_sw' => 'required',
            // 'id_hw' => 'required'
        ],[
            'nama_sw.required' => 'Nama Software wajib diisi',
            'id_merk_sw.required' => 'Merk Software wajib diisi',
            'id_jenis_lisensi.required' => 'Jenis Lisensi Software wajib diisi',
            'tgl_batas_lisensi.required' => 'Tanggal Batas Software wajib diisi',
            'harga_sw.required' => 'Harga Software wajib diisi',
            'harga_sw.numeric' => 'Harga Software berupa angka',
            'kode_lisensi.required' => 'Kode lisensi wajib diisi',
            'deskripsi_sw.required' => 'Deskripsi wajib diisi',
            'versi_sw.required' => 'Versi Software wajib diisi',
            'id_hw.required' => 'Nama Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_sw' => Request()->nama_sw,
            'id_merk_sw' => Request()->id_merk_sw,
            'id_jenis_lisensi' => Request()->id_jenis_lisensi,
            'tgl_pembelian' => Request()->tgl_pembelian,
            'tgl_batas_lisensi' => Request()->tgl_batas_lisensi,
            'harga_sw' => Request()->harga_sw,
            'kode_lisensi' => Request()->kode_lisensi,
            'deskripsi_sw' => Request()->deskripsi_sw,
            'versi_sw' => Request()->versi_sw,
            'id_hw' => Request()->id_hw          
        ];
        
        $this->SoftwareModel->addData($data);
        return redirect()->route('software')->with('pesan', 'Data berhasil ditambahkan.');

    }
    
    public function edit($id_sw)
    {
        if (!$this->SoftwareModel->detailData($id_sw))
        {
            abort(404);
        }
        $id_kategori_hw5 = "5";
        $id_kategori_hw6 = "6";
        $data = [
            'software' => $this->SoftwareModel->detailData($id_sw),
            'merk' => $this->SoftwareModel->allMerk(),
            'lisensi' => $this->SoftwareModel->allLisensi(),
            'hardware' => $this->SoftwareModel->allHardware($id_kategori_hw5,$id_kategori_hw6)
        ];
        return view('software.v_editsw', $data);
    }
    
    public function update($id_sw)
    {
        Request()->validate([
            'nama_sw' => 'required',
            // 'tgl_batas_lisensi' => 'required',
            'harga_sw' => 'numeric',
            // 'kode_lisensi' => 'required',
            // 'deskripsi_sw' => 'required',
            // 'versi_sw' => 'required'
        ],[
            'nama_sw.required' => 'Nama Software wajib diisi',
            'tgl_batas_lisensi.required' => 'Tanggal Batas Lisensi Software wajib diisi',
            'harga_sw.required' => 'Harga Software wajib diisi',
            'harga_sw.numeric' => 'Harga Software berupa angka',
            'kode_lisensi.required' => 'Kode lisensi wajib diisi',
            'deskripsi_sw.required' => 'Deskripsi wajib diisi',
            'versi_sw.required' => 'Versi Software wajib diisi'
        ]);
        
        $data=[
            'nama_sw' => Request()->nama_sw,
            'id_merk_sw' => Request()->id_merk_sw,
            'id_jenis_lisensi' => Request()->id_jenis_lisensi,
            'tgl_pembelian' => Request()->tgl_pembelian,
            'tgl_batas_lisensi' => Request()->tgl_batas_lisensi,
            'harga_sw' => Request()->harga_sw,
            'kode_lisensi' => Request()->kode_lisensi,
            'deskripsi_sw' => Request()->deskripsi_sw,
            'versi_sw' => Request()->versi_sw,
            'id_hw' => Request()->id_hw                 
        ];
        
        $this->SoftwareModel->editData($id_sw, $data);
        return redirect()->route('software')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_sw)
    {
        $this->SoftwareModel->deleteData($id_sw);
        return redirect()->route('software')->with('pesan', 'Data berhasil dihapus.');
    }

    public function print()
    {
        $data = [
            'software' => $this->SoftwareModel->allData(),
            'merk' => $this->SoftwareModel->allMerk(),
            'lisensi' => $this->SoftwareModel->allLisensi()
        ];
        return view('software.v_printsw', $data);
    }
    
    public function savepdf()
    {
        $data = [
            'software' => $this->SoftwareModel->allData(),
            'merk' => $this->SoftwareModel->allMerk(),
            'lisensi' => $this->SoftwareModel->allLisensi()
        ];

        set_time_limit(300);
        $pdf = PDF::loadView('software.v_pdfsw', $data)->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function saveexcel()
    {
        return Excel::download(new SoftwareExport,'DaftarSoftware.xlsx');
    }

    public function printlog()
    {
        $data = [
            'logsoftware' => $this->SoftwareModel->logData(),
        ];
        return view('software.v_printlogsw', $data);
    }
    
    public function savepdflog()
    {
        $data = [
            'logsoftware' => $this->SoftwareModel->logData(),
        ];

        set_time_limit(300);
        $pdf = PDF::loadView('software.v_pdflogsw', $data)->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function saveexcellog()
    {
        return Excel::download(new SoftwareLogExport,'LogPerubahanSoftware.xlsx');
    }

}
