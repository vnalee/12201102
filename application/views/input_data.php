<html>
<head>
    <title>Input Data Karyawan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url () ?>desain/css/style.css">
</head>
<body>
    <center>
        <h1>Input Data Karyawan</h1>
        <label style="color:#FF0090"><?php echo validation_errors(); ?></label>
    </center>
    <form action="<?php echo base_url(). 'karyawan/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
        <table style="margin:20px auto;">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <?php foreach($status as $s):?>
                            <option value="<?= $s; ?>"><?= $s; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="jabatan" id="jabatan">
                        <?php foreach($jabatan as $j):?>
                            <option value="<?= $j; ?>"><?= $j; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Upload Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"> <input type="reset" value="Batal"> <?php echo anchor('karyawan/index','<input type=button value=Kembali>'); ?></td>
            </tr>
        </table>
    </form>
</body>
</html>