<?php
include_once('../models/PasienModel.php');

class PasienController
{
    private $model;

    public function __construct()
    {
        $this->model = new PasienModel();
    }

    // add pasien
    public function addPasien($no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis)
    {
        return $this->model->addPasien($no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis);
    }

    // get pasien by id
    public function getPasien($id)
    {
        return $this->model->getPasien($id);
    }

    // update pasien by id
    public function updatePasien($id, $no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis)
    {
        return $this->model-> updatePasien($id, $no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis);
    }

    // delete pasien by id
    public function deletePasien($id)
    {
        return $this->model->deletePasien($id);
    }

    // get all pasien
    public function getPasienList()
    {
        return $this->model->getPasienList();
    }
}