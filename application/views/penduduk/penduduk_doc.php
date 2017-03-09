<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Penduduk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Induk</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>No Telepon</th>
		
            </tr><?php
            foreach ($penduduk_data as $penduduk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penduduk->no_induk ?></td>
		      <td><?php echo $penduduk->nama ?></td>
		      <td><?php echo $penduduk->alamat ?></td>
		      <td><?php echo $penduduk->no_telepon ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>