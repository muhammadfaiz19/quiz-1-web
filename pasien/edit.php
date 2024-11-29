<?php
include("../controllers/PasienController.php");
$obj = new PasienController();
$msg = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $no_reg = $_POST["no_reg"];
    $no_ktp = $_POST["no_ktp"];
    $nama_pasien = $_POST["nama_pasien"];
    $jk = $_POST["jk"];
    $diagnosis = $_POST["diagnosis"];
    
    $dat = $obj->updatePasien($id, $no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis);
    $msg = json_decode($dat, true);
}

$rows = $obj->getPasien($id);
?>

<html>
<head>
    <title>Edit Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Edit Pasien</h1>
        <p class="text-gray-600 mb-4">Edit Data Pasien</p>

        <?php 
        if (isset($msg)) { 
            if ($msg['success']) {
                echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Update Data Berhasil</div>';
                echo '<meta http-equiv="refresh" content="2;url=index.php">';
            } else {
                echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Update Gagal</div>'; 
            }
        }
        ?>

        <form name="formEdit" method="POST" action="">
            <input type="hidden" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <div class="mb-4">
                    <label for="no_reg" class="block text-sm font-medium text-gray-700">No Reg:</label>
                    <input type="text" id="no_reg" name="no_reg" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['no_reg']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="no_ktp" class="block text-sm font-medium text-gray-700">No KTP:</label>
                    <input type="text" id="no_ktp" name="no_ktp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['no_ktp']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="nama_pasien" class="block text-sm font-medium text-gray-700">Nama Pasien:</label>
                    <input type="text" id="nama_pasien" name="nama_pasien" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['nama_pasien']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="jk" class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                    <select id="jk" name="jk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                        <option value="<?php echo $row['jk']; ?>"><?php echo $row['jk']; ?></option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="diagnosis" class="block text-sm font-medium text-gray-700">Diagnosis:</label>
                    <input type="text" id="diagnosis" name="diagnosis" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['diagnosis']; ?>" required />
                </div>
            <?php endforeach; ?>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="index.php" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>