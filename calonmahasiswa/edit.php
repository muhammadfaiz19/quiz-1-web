<?php
include("../controllers/CalonMahasiswaController.php");
$obj = new CalonMahasiswaController();
$msg = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nomor_registrasi = $_POST["nomor_registrasi"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $lulus_tahun = $_POST["lulus_tahun"];
    $prodi_pilihan = $_POST["prodi_pilihan"];
    
    $dat = $obj->updateCalonMahasiswa($id, $nomor_registrasi, $nama_lengkap, $jk, $alamat, $nama_sekolah, $lulus_tahun, $prodi_pilihan);
    $msg = json_decode($dat, true);
}

$rows = $obj->getCalonMahasiswa($id);
?>

<html>
<head>
    <title>Edit Calon Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-2 text-center text-white">Edit Calon Mahasiswa</h1>
        <p class="text-gray-400 mb-4 text-center">Edit Data Calon Mahasiswa</p>

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
                    <label for="nomor_registrasi" class="block text-sm font-medium text-gray-300">Nomor Registrasi:</label>
                    <input type="text" id="nomor_registrasi" name="nomor_registrasi" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['nomor_registrasi']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-300">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['nama_lengkap']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="jk" class="block text-sm font-medium text-gray-300">Jenis Kelamin:</label>
                    <select id="jk" name="jk" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                        <option value="<?php echo $row['jk']; ?>"><?php echo $row['jk']; ?></option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-300">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required><?php echo $row['alamat']; ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="nama_sekolah" class="block text-sm font-medium text-gray-300">Nama Sekolah:</label>
                    <input type="text" id="nama_sekolah" name="nama_sekolah" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['nama_sekolah']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="lulus_tahun" class="block text-sm font-medium text-gray-300">Lulus Tahun:</label>
                    <input type="number" id="lulus_tahun" name="lulus_tahun" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['lulus_tahun']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="prodi_pilihan" class="block text-sm font-medium text-gray-300">Prodi Pilihan:</label>
                    <input type="text" id="prodi_pilihan" name="prodi_pilihan" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['prodi_pilihan']; ?>" required />
                </div>
            <?php endforeach; ?>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" type="submit">Save</button>
                <a href="index.php" class="bg-gray-700 text-gray-300 font-semibold py-2 px-4 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>