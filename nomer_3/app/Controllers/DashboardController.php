<?php 

namespace App\Controllers;

use App\Models\PasienModel;
use Dompdf\Dompdf;

class DashboardController extends BaseController {

    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];
        return view('dashboard', $data);
    }
    public function pasien()
    {
        $pasien = new PasienModel();
        $data = [
            'active' => 'pasien',
            'pasien' => $pasien->findAll(),
        ];
        return view('pasien',$data);
    }

    public function simpanpasien()
    {
        helper(['form']); // untuk validasi

        // Ambil data dari POST
        $nama = $this->request->getPost('nama');
        $norm = $this->request->getPost('norm');
        $alamat = $this->request->getPost('alamat');

        // Validasi required
        if(empty($nama) || empty($norm) || empty($alamat)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Semua field wajib diisi!'
            ]);
        }

        $pasienModel = new PasienModel();

        $data = [
            'nama' => $nama,
            'norm' => $norm,
            'alamat' => $alamat
        ];

        if($pasienModel->insert($data)){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data pasien berhasil disimpan!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menyimpan data pasien.'
            ]);
        }
    }


    public function updatePasien() 
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'norm' => $this->request->getPost('norm'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $pasienModel = new PasienModel();
        if($pasienModel->update($id, $data)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data pasien berhasil diupdate']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal update data pasien']);
        }
    }

    public function hapusPasien() 
    {
        $id = $this->request->getPost('id');

        $pasienModel = new PasienModel();
        if($pasienModel->delete($id)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data pasien berhasil dihapus']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data pasien']);
        }
    }

    public function cetakPasien($id)
    {
        $pasienModel = new PasienModel();
        $pasien = $pasienModel->find($id); // Ambil 1 data pasien

        if (!$pasien) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data pasien tidak ditemukan');
        }

        // Load view cetak
        $html = view('pasien_cetak', ['pasien' => $pasien]);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Setting ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output ke browser
        $dompdf->stream("pasien_{$pasien->nama}.pdf", ['Attachment' => false]);
    }

    public function importDummy()
    {
        $url = 'https://jsonplaceholder.typicode.com/users';

        // Ambil data JSON
        $json = file_get_contents($url);
        $data = json_decode($json, true); // decode sebagai array

        $pasienModel = new PasienModel();

        foreach ($data as $item) {
            $alamat = $item['address']['street'] . ', ' . $item['address']['suite'] . ', ' . $item['address']['city'];

            $pasienModel->insert([
                'nama' => $item['name'],
                'norm' => $item['username'],
                'alamat' => $alamat
            ]);
        }

        return redirect()->to('/pasien')->with('success', 'Dummy data pasien berhasil diimport!');
    }

    public function pendaftaran()
    {
        $data = [
            'active' => 'pendaftaran'
        ];
        return view('pendaftaran', $data);
    }
    public function kunjungan()
    {
        $data = [
            'active' => 'kunjungan'
        ];
        return view('kunjungan',$data);
    }
    public function asesmen()
    {
        $data = [
            'active' => 'asesmen'
        ];
        return view('asesmen', $data);
    }

}