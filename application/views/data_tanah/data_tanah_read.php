<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Data_tanah Read</h2>
        <table class="table">
	    <tr><td>Id Penduduk</td><td><?php echo $id_penduduk; ?></td></tr>
	    <tr><td>Id Jenis Bangunan</td><td><?php echo $id_jenis_bangunan; ?></td></tr>
	    <tr><td>Penginput</td><td><?php echo $penginput; ?></td></tr>
	    <tr><td>Persil</td><td><?php echo $persil; ?></td></tr>
	    <tr><td>Luas Tanah</td><td><?php echo $luas_tanah; ?></td></tr>
	    <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Lng</td><td><?php echo $lng; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_tanah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>