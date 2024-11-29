<?php
include("../controllers/CalonMahasiswaController.php");
$obj = new CalonMahasiswaController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor_registrasi = $_POST["nomor_registrasi"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $lulus_tahun = $_POST["lulus_tahun"];
    $prodi_pilihan = $_POST["prodi_pilihan"];
    
    $dat = $obj->addCalonMahasiswa($nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan);
    $msg = json_decode($dat, true);
}
?>
<html>
<head>
    <title>Tambah Calon Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-200 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-4">Tambah Calon Mahasiswa</h1>
        <p class="text-gray-600 text-center mb-6">Entry Data Calon Mahasiswa</p>

        <?php 
        if (isset($msg)) { 
            if ($msg['success']) {
                echo '<div class="bg-green-500 text-white p-3 rounded mb-4 text-center">Insert Data Berhasil</div>';
                echo '<meta http-equiv="refresh" content="2;url=index.php">';
            } else {
                echo '<div class="bg-red-500 text-white p-3 rounded mb-4 text-center">Insert Gagal</div>'; 
            }
        }
        ?>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="nomor_registrasi" class="block text-sm font-medium text-gray-700">Nomor Registrasi:</label>
                <input type="text" id="nomor_registrasi" name="nomor_registrasi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="jk" class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                <select id="jk" name="jk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    <option value="">--pilih--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                <textarea id="alamat" name="alamat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required></textarea>
            </div>
            <div class="mb-4">
                <label for="nama_sekolah" class="block text-sm font-medium text-gray-700">Nama Sekolah:</label>
                <input type="text" id="nama_sekolah" name="nama_sekolah" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="lulus_tahun" class="block text-sm font-medium text-gray -700">Lulus Tahun:</label>
                <input type="number" id="lulus_tahun" name="lulus_tahun" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="prodi_pilihan" class="block text-sm font-medium text-gray-700">Prodi Pilihan:</label>
                <input type="text" id="prodi_pilihan" name="prodi_pilihan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" type="submit">Save</button>
                <a href="index.php" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>