<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url () ?>desain/css/style.css">
</head>
<body>
    <center>
        <h1>Edit Data Karyawan</h1>
    </center>
    <?php foreach($karyawan as $k) { ?>
    <form action="<?php echo base_url(). 'karyawan/update'; ?>" method="post" enctype="multipart/form-data">
        <table style="margin:20px auto;">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $k->id ?>">
                    <input type="text" name="nama" value="<?php echo $k->nama ?>">
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <?php foreach($status as $s):?>
                            <?php if($s == $k->status):?>
                                <option value="<?= $s; ?>" selected><?= $s; ?></option>
                            <?php else: ?>
                                <option value="<?= $s; ?>"><?= $s; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="jabatan" id="jabatan">
                        <?php foreach($jabatan as $j):?>
                            <?php if($j == $k->jabatan):?>
                                <option value="<?= $j; ?>" selected><?= $j; ?></option>
                            <?php else: ?>
                                <option value="<?= $j; ?>"><?= $j; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <img src="<?php echo base_url();?><?php echo $k->foto ?>" width="150px" height="auto">
                </td>
            </tr>
            <tr>
                <td>Upload Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"> <?php echo anchor('karyawan/index','<input type=button value=Kembali>'); ?></td>
            </tr>
        </table>
    </form>
    <?php } ?>
</body>
</html>