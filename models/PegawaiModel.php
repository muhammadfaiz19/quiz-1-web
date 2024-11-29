<?php

include_once('../db/database.php');

class PegawaiModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPegawai($nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt)
    {
        $sql = "INSERT INTO pegawai (nomor_induk, nama_lengkap, jk, bagian, status_kawin, tmt) VALUES (:nomor_induk, :nama_lengkap, :jk, :bagian, :status_kawin, :tmt)";
        $params = array(
            ":nomor_induk" => $nomor_induk,
            ":nama_lengkap" => $nama_lengkap,
            ":jk" => $jk,
            ":bagian" => $bagian,
            ":status_kawin" => $status_kawin,
            ":tmt" => $tmt
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Insert successful", "Insert failed"));
    }

    public function getPegawai($id)
    {
        $sql = "SELECT * FROM pegawai WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePegawai($id, $nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt)
    {
        $sql = "UPDATE pegawai SET nomor_induk = :nomor_induk, nama_lengkap = :nama_lengkap, jk = :jk, bagian = :bagian, status_kawin = :status_kawin, tmt = :tmt WHERE id = :id";
        $params = array(
            ":nomor_induk" => $nomor_induk,
            ":nama_lengkap" => $nama_lengkap,
            ":jk" => $jk,
            ":bagian" => $bagian,
            ":status_kawin" => $status_kawin,
            ":tmt" => $tmt,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Update successful", "Update failed"));
    }

    public function deletePegawai($id)
    {
        $sql = "DELETE FROM pegawai WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Delete successful", "Delete failed"));
    }

    public function getPegawaiList()
    {
        $sql = 'SELECT * FROM pegawai LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    private function response($result, $successMsg, $failMsg)
    {
        return array(
            "success" => $result,
            "message" => $result ? $successMsg : $failMsg
        );
    }
}