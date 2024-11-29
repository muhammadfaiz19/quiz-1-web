<?php
include_once('../models/PasienModel.php');

class PasienController
{
    private $model;

    public function __construct()
    {
        $this->model = new PasienModel();
    }

    public function addPasien($no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis)
    {
        return $this->model->addPasien($no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis);
    }

    public function getPasien($id)
    {
        return $this->model->getPasien($id);
    }

    public function updatePasien($id, $no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis)
    {
        return $this->model-> updatePasien($id, $no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis);
    }

    public function deletePasien($id)
    {
        return $this->model->deletePasien($id);
    }

    public function getPasienList()
    {
        return $this->model->getPasienList();
    }
}