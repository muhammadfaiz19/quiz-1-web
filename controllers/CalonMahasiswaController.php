<?php
include_once('../models/CalonMahasiswaModel.php');

class CalonMahasiswaController
{
    private $model;

    public function __construct()
    {
        $this->model = new CalonMahasiswaModel();
    }

    public function addCalonMahasiswa($nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan)
    {
        return $this->model->addCalonMahasiswa($nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan);
    }

    public function getCalonMahasiswa($id)
    {
        return $this->model->getCalonMahasiswa($id);
    }

    public function updateCalonMahasiswa($id, $nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan)
    {
        return $this->model->updateCalonMahasiswa($id, $nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan);
    }

    public function deleteCalonMahasiswa($id)
    {
        return $this->model->deleteCalonMahasiswa($id);
    }

    public function getCalonMahasiswaList()
    {
        return $this->model->getCalonMahasiswaList();
    }
}