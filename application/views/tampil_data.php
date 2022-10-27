<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data Karyawan</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url () ?>desain/css/style.css">
</head>
<body>
    <center><h1>Data Karyawan</h1></center>
    <table style="margin:20px auto;" border="1" id="tampilantabel">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <th>Tunjangan</th>
            <th>Total</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        foreach($karyawan as $k) {
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $k->nama ?></td>
            <td><?php echo $k->status ?></td>
            <td><?php echo $k->jabatan ?></td>
            <td>Rp. <?php echo number_format($k->gaji,0,".","."); ?></td>
            <td>Rp. <?php echo number_format($k->tunjangan,0,".","."); ?></td>
            <td>Rp. <?php echo number_format($k->total,0,".","."); ?></td>
            <td><img src="<?php echo base_url();?><?php echo $k->foto ?>" width="50" height="50"></td>
            <td>
                <?php echo anchor('karyawan/edit/'.$k->id,'Edit'); ?>
                <?php echo anchor('karyawan/hapus/'.$k->id,'Hapus'); ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <center><?php echo anchor('karyawan/tambah/','<input type=button value=\'Tambah Data\'>'); ?></center>
</body>
</html>
</body>
</html>