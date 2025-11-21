<?php 

namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\PendaftaranModel;
use App\Models\KunjunganModel;
use App\Models\JenisKunjunganModel;
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
        $pendaftaran = new PendaftaranModel();
        $pasien = new PasienModel();
        $data = [
            'active' => 'pendaftaran',
            'pasien' => $pasien->findAll(),
            'pendaftaran' => $pendaftaran->select('pendaftaran.*, pasien.nama')
                            ->join('pasien', 'pasien.id = pendaftaran.pasienid')
                            ->findAll()
        ];
        return view('pendaftaran', $data);
    }

    public function simpanPendaftaran()
    {
        helper(['form']); // untuk validasi

        // Ambil data dari POST
        $pasienid = $this->request->getPost('pasienid');
        $noregistrasi = $this->request->getPost('noregistrasi');
        $tglregistrasi = $this->request->getPost('tglregistrasi');

        // Validasi required
        if(empty($pasienid) || empty($noregistrasi) || empty($tglregistrasi)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Semua field wajib diisi!'
            ]);
        }

        $pendaftaranModel = new PendaftaranModel();

        $data = [
            'pasienid' => $pasienid,
            'noregistrasi' => $noregistrasi,
            'tglregistrasi' => $tglregistrasi
        ];

        if($pendaftaranModel->insert($data)){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data pendaftaran berhasil disimpan!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menyimpan data pendaftaran.'
            ]);
        }
    }

    public function updatePendaftaran() 
    {
        $id = $this->request->getPost('id');
        $data = [
            'pasienid' => $this->request->getPost('pasienid'),
            'noregistrasi' => $this->request->getPost('noregistrasi'),
            'tglregistrasi' => $this->request->getPost('tglregistrasi'),
        ];

        $pendaftaranModel = new PendaftaranModel();
        if($pendaftaranModel->update($id, $data)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data pendaftaran berhasil diupdate']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal update data pendaftaran']);
        }
    }

    public function hapusPendaftaran() 
    {
        $id = $this->request->getPost('id');

        $pendaftaranModel = new PendaftaranModel();
        if($pendaftaranModel->delete($id)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data pendaftaran berhasil dihapus']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data pendaftaran']);
        }
    }

    public function cetakPendaftaran($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $pendaftaran = $pendaftaranModel->select('pendaftaran.*, pasien.nama')
                                        ->join('pasien', 'pasien.id = pendaftaran.pasienid')    
                                        ->find($id); // Ambil 1 data pasien

        if (!$pendaftaran) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data pasien tidak ditemukan');
        }

        // Load view cetak
        $html = view('pendaftaran_cetak', ['pendaftaran' => $pendaftaran]);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Setting ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output ke browser
        $dompdf->stream("pendaftaran_{$pendaftaran->nama}.pdf", ['Attachment' => false]);
    }
    public function kunjungan()
    {
        $pendaftaran = new PendaftaranModel();
        $kunjungan = new KunjunganModel();
        $jenis_kunjungan = new JenisKunjunganModel();
        $data = [
            'active' => 'kunjungan',
            'pendaftaran' => $pendaftaran->select('pendaftaran.*, pasien.nama')
                            ->join('pasien', 'pasien.id = pendaftaran.pasienid')
                            ->findAll(),
            'kunjungan' => $kunjungan->select('kunjungan.*, pasien.nama')
                            ->join('pendaftaran','pendaftaran.id = kunjungan.pendaftaranpasienid')
                            ->join('pasien', 'pasien.id = pendaftaran.pasienid')
                            ->findAll(),
            'jenis_kunjungan' =>$jenis_kunjungan->findAll()
        ];
        return view('kunjungan',$data);
    }

    public function simpanKunjungan()
    {
        helper(['form']); // untuk validasi

        // Ambil data dari POST
        $pendaftaranpasienid = $this->request->getPost('pendaftaranpasienid');
        $jenis_kunjungan = $this->request->getPost('jenis_kunjungan');
        $tglkunjungan = $this->request->getPost('tglkunjungan');

        // Validasi required
        if(empty($pendaftaranpasienid) || empty($jenis_kunjungan) || empty($tglkunjungan)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Semua field wajib diisi!'
            ]);
        }

        $kunjunganModel = new KunjunganModel();

        $data = [
            'pendaftaranpasienid' => $pendaftaranpasienid,
            'jenis_kunjungan' => $jenis_kunjungan,
            'tglkunjungan' => $tglkunjungan
        ];

        if($kunjunganModel->insert($data)){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data kunjungan berhasil disimpan!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menyimpan data kunjungan.'
            ]);
        }
    }

    public function updateKunjungan() 
    {
        $id = $this->request->getPost('id');
        $data = [
            'pendaftaranpasienid' => $this->request->getPost('pendaftaranpasienid'),
            'jenis_kunjungan' => $this->request->getPost('jenis_kunjungan'),
            'tglkunjungan' => $this->request->getPost('tglkunjungan'),
        ];

        $kunjunganModel = new KunjunganModel();
        if($kunjunganModel->update($id, $data)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data kunjungan berhasil diupdate']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal update data kunjungan']);
        }
    }

    public function hapusKunjungan() 
    {
        $id = $this->request->getPost('id');

        $kunjunganModel = new KunjunganModel();
        if($kunjunganModel->delete($id)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data kunjungan berhasil dihapus']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data kunjungan']);
        }
    }

    public function cetakKunjungan($id)
    {
        $kunjunganModel = new KunjunganModel();
        $kunjungan = $kunjunganModel->select('kunjungan.*, pasien.nama')
                                    ->join('pendaftaran','pendaftaran.id = kunjungan.pendaftaranpasienid')
                                    ->join('pasien', 'pasien.id = pendaftaran.pasienid')    
                                    ->find($id); // Ambil 1 data pasien

        if (!$kunjungan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data pasien tidak ditemukan');
        }

        // Load view cetak
        $html = view('kunjungan_cetak', ['kunjungan' => $kunjungan]);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Setting ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output ke browser
        $dompdf->stream("kunjungan_{$kunjungan->nama}.pdf", ['Attachment' => false]);
    }
    public function asesmen()
    {
        $data = [
            'active' => 'asesmen'
        ];
        return view('asesmen', $data);
    }

}