<?php
include("../controllers/PasienController.php");
$obj = new PasienController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST['submitted']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $dat = $obj->deletePasien($id);
    $msg = json_decode($dat, true);
}

$rows = $obj->getPasien($id);
?>

<html>
<head>
    <title>Delete Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-2 text-center text-white">Hapus Pasien</h1>
        <p class="text-gray-400 mb-4 text-center">Konfirmasi Hapus Data Pasien</p>

        <?php 
        if (isset($msg)) { 
            if ($msg['success']) {
                echo '<div class="bg-green-500 text-white p-3 rounded mb-4 text-center">Delete Data Berhasil</div>';
                echo '<meta http-equiv="refresh" content="2;url=index.php">';
            } else {
                echo '<div class="bg-red-500 text-white p-3 rounded mb-4 text-center">Delete Gagal</div>'; 
            }
        }
        ?>

        <form name="formDelete" method="POST" action="">
            <input type="hidden" name="submitted" value="1"/>
            <dl class="row mt-1">
                <?php foreach ($rows as $row): ?>
                    <dt class="col-sm-3 font-medium text-gray-300">ID:</dt>
                    <dd class="col-sm-9 text-gray-400"><?php echo $row['id']; ?></dd>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" readonly />

                    <dt class="col-sm-3 font-medium text-gray-300">No Reg:</dt>
                    <dd class="col-sm-9 text-gray-400"><?php echo $row['no_reg']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-300">No KTP:</dt>
                    <dd class="col-sm-9 text-gray-400"><?php echo $row['no_ktp']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-300">Nama Pasien:</dt>
                    <dd class="col-sm-9 text-gray-400"><?php echo $row['nama_pasien']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-300">JK:</dt>
                    <dd class="col-sm-9 text-gray-400"><?php echo $row['jk']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-300">Diagnosis:</dt>
                    <dd class="col-sm-9 text-gray-400"><?php echo $row['diagnosis']; ?></dd>
                <?php endforeach; ?>
            </dl>
            <div class="flex justify-between mt-4">
                <button class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600" type="submit">Delete</button>
                <a href="index.php" class="bg-gray-700 text-gray-300 font-semibold py-2 px-4 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>