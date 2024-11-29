<?php
include_once('../models/PegawaiModel.php');

class PegawaiController
{
    private $model;

    public function __construct()
    {
        $this->model = new PegawaiModel();
    }

    public function addPegawai($nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt)
    {
        return $this->model->addPegawai($nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt);
    }

    public function getPegawai($id)
    {
        return $this->model->getPegawai($id);
    }

    public function updatePegawai($id, $nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt)
    {
        return $this->model->updatePegawai($id, $nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt);
    }

    public function deletePegawai($id)
    {
        return $this->model->deletePegawai($id);
    }

    public function getPegawaiList()
    {
        return $this->model->getPegawaiList();
    }
}