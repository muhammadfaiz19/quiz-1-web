<?php
include("../controllers/PegawaiController.php");
$obj = new PegawaiController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor_induk = $_POST["nomor_induk"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $jk = $_POST["jk"];
    $bagian = $_POST["bagian"];
    $status_kawin = $_POST["status_kawin"];
    $tmt = $_POST["tmt"];
    
    $dat = $obj->addPegawai($nomor_induk, $nama_lengkap, $jk, $bagian, $status_kawin, $tmt);
    $msg = json_decode($dat, true);
}
?>
<html>
<head>
    <title>Tambah Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Tambah Pegawai</h1>
        <p class="text-gray-600 mb-4">Entry Data Pegawai</p>

        <?php 
        if (isset($msg)) { 
            if ($msg['success']) {
                echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Insert Data Berhasil</div>';
                echo '<meta http-equiv="refresh" content="2;url=index.php">';
            } else {
                echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Insert Gagal</div>'; 
            }
        }
        ?>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="nomor_induk" class="block text-sm font-medium text-gray-700">Nomor Induk:</label>
                <input type="text" id="nomor_induk" name="nomor_induk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
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
                <label for="bagian" class="block text-sm font-medium text-gray-700">Bagian:</label>
                <input type="text" id="bagian" name="bagian" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="status_kawin" class="block text-sm font-medium text-gray-700">Status Kawin:</label>
                <select id="status_kawin" name="status_kawin" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    <option value="">--pilih--</option>
                    <option value="KAWIN">KAWIN</option>
                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="tmt" class="block text-sm font-medium text-gray-700">Tanggal Mulai Tugas:</label>
                <input type="date" id="tmt" name="tmt" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class ```html
="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="index.php" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>