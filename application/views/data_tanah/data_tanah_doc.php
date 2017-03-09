<!doctype html>
<html>
    <head>
        <title>SIGTANAH Desa Tawing</title>
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
        <h2>Data Tanah Desa Tawing</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Nama Penduduk</th>
        		<th>Persil</th>
        		<th>Luas Tanah</th>
        		<th>Tanggal</th>
		
            </tr><?php
            foreach ($data_tanah_data as $data_tanah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $data_tanah->nama ?></td>
		      <td><?php echo $data_tanah->persil ?></td>
		      <td><?php echo $data_tanah->luas_tanah ?> m2</td>
		      <td><?php echo $data_tanah->tanggal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>