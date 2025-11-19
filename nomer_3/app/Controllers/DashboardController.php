<?php 

namespace App\Controllers;

class DashboardController extends BaseController {

    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];
        return view('dashboard', $data);
    }
    public function asesmen()
    {
        $data = [
            'active' => 'asesmen'
        ];
        return view('asesmen', $data);
    }
    public function pendaftaran()
    {
        $data = [
            'active' => 'pendaftaran'
        ];
        return view('pendaftaran', $data);
    }
    public function pasien()
    {
        $data = [
            'active' => 'pasien'
        ];
        return view('pasien',$data);
    }
    public function kunjungan()
    {
        $data = [
            'active' => 'kunjungan'
        ];
        return view('kunjungan',$data);
    }

}