<?php
include("../controllers/PasienController.php");
$obj = new PasienController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_reg = $_POST["no_reg"];
    $no_ktp = $_POST["no_ktp"];
    $nama_pasien = $_POST["nama_pasien"];
    $jk = $_POST["jk"];
    $diagnosis = $_POST["diagnosis"];
    
    $dat = $obj->addPasien($no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis);
    $msg = json_decode($dat, true);
}
?>
<html>
<head>
    <title>Tambah Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-center text-white mb-4">Tambah Pasien</h1>
        <p class="text-gray-400 text-center mb-6">Entry Data Pasien</p>

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
                <label for="no_reg" class="block text-sm font-medium text-gray-300">No Reg:</label>
                <input type="text" id="no_reg" name="no_reg" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="no_ktp" class="block text-sm font-medium text-gray-300">No KTP:</label>
                <input type="text" id="no_ktp" name="no_ktp" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="nama_pasien" class="block text-sm font-medium text-gray-300">Nama Pasien:</label>
                <input type="text" id="nama_pasien" name="nama_pasien" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="jk" class="block text-sm font-medium text-gray-300">Jenis Kelamin:</label>
                <select id="jk" name="jk" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                    <option value="">--pilih--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="diagnosis" class="block text-sm font-medium text-gray-300">Diagnosis:</label>
                <input type="text" id="diagnosis" name="diagnosis" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" type="submit">Save</button>
                <a href="index.php" class="bg-gray-700 text-gray-300 font-semibold py-2 px-4 rounded hover :bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>