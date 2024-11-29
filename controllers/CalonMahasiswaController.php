<?php
include_once('../models/CalonMahasiswaModel.php');

class CalonMahasiswaController
{
    private $model;

    public function __construct()
    {
        $this->model = new CalonMahasiswaModel();
    }

    # add mahasiswa
    public function addCalonMahasiswa($nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan)
    {
        return $this->model->addCalonMahasiswa($nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan);
    }

    // get mahasiswa by id
    public function getCalonMahasiswa($id)
    {
        return $this->model->getCalonMahasiswa($id);
    }

    // update mahasiswa by id
    public function updateCalonMahasiswa($id, $nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan)
    {
        return $this->model->updateCalonMahasiswa($id, $nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan);
    }

    // delete mahasiswa by id
    public function deleteCalonMahasiswa($id)
    {
        return $this->model->deleteCalonMahasiswa($id);
    }

    // get all mahasiswas
    public function getCalonMahasiswaList()
    {
        return $this->model->getCalonMahasiswaList();
    }
}