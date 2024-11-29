<?php

include_once('../db/database.php');

class CalonMahasiswaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCalonMahasiswa($nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan)
    {
        $sql = "INSERT INTO calonmahasiswa (nomor_registrasi, nama_lengkap, jk, alamat, nama_sekolah, lulus_tahun, prodi_pilihan) VALUES (:nomor_registrasi, :nama_lengkap, :jk, :alamat, :nama_sekolah, :lulus_tahun, :prodi_pilihan)";
        $params = array(
            ":nomor_registrasi" => $nomor_registrasi,
            ":nama_lengkap" => $nama_lengkap,
            ":jk" => $jk,
            ":alamat" => $alamat,
            ":nama_sekolah" => $nama_sekolah,
            ":lulus_tahun" => $lulus_tahun,
            ":prodi_pilihan" => $prodi_pilihan
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Insert successful", "Insert failed"));
    }

    public function getCalonMahasiswa($id)
    {
        $sql = "SELECT * FROM calonmahasiswa WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCalonMahasiswa($id, $nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan)
    {
        $sql = "UPDATE calonmahasiswa SET nomor_registrasi = :nomor_registrasi, nama_lengkap = :nama_lengkap, jk = :jk, alamat = :alamat, nama_sekolah = :nama_sekolah, lulus_tahun = :lulus_tahun, prodi_pilihan = :prodi_pilihan WHERE id = :id";
        $params = array(
            ":nomor_registrasi" => $nomor_registrasi,
            ":nama_lengkap" => $nama_lengkap,
            ":jk" => $jk,
            ":alamat" => $alamat,
            ":nama_sekolah" => $nama_sekolah,
            ":lulus_tahun" => $lulus_tahun,
            ":prodi_pilihan" => $prodi_pilihan,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Update successful", "Update failed"));
    }

    public function deleteCalonMahasiswa($id)
    {
        $sql = "DELETE FROM calonmahasiswa WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Delete successful", "Delete failed"));
    }

    public function getCalonMahasiswaList()
    {
        $sql = 'SELECT * FROM calonmahasiswa LIMIT 100';
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