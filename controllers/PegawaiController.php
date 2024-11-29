<?php
include_once('../models/PegawaiModel.php');

class PegawaiController
{
    private $model;

    public function __construct()
    {
        $this->model = new PegawaiModel();
    }

    // add pegawai
    public function addPegawai($nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt)
    {
        return $this->model->addPegawai($nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt);
    }

    // get pegawai by id
    public function getPegawai($id)
    {
        return $this->model->getPegawai($id);
    }

    // update pegawai by id
    public function updatePegawai($id, $nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt)
    {
        return $this->model->updatePegawai($id, $nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt);
    }

    // delete pegawai by id
    public function deletePegawai($id)
    {
        return $this->model->deletePegawai($id);
    }

    // get all pegawai list
    public function getPegawaiList()
    {
        return $this->model->getPegawaiList();
    }
}