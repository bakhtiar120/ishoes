<html>
    <head>
        <title>CRUD CodeIgniter</title>
    </head>
    <style>
        th,td,table,thead,tbody,tr{
            border:1px solid #000;
        }
    </style>
    <body>
   
        <table>
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Opsi</th>
            </thead>
            <tbody>
                <h2>ISHOES</h2>
  <a href="<?php echo site_url('jenis_komponen/input');?>">Input</a>
                <?php
$no = 1;
foreach($records as $value)
{
                ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $value->ID_Jenis_Komponen;?></td>
                    <td><?= $value->nama;?></td>
                    <td><?= $value->harga;?></td>
                    <td><?= $value->keterangan;?></td>
                    <td>
                        <a href="<?= site_url("jenis_komponen/edit")."?jeniskomponen=".$value->ID_Jenis_Komponen;?>">edit</a>|
                        <a href="<?= site_url("jenis_komponen/delete")."?jeniskomponen=".$value->ID_Jenis_Komponen;?>">delete</a>
                    </td>
                </tr>
                <?php
}
                ?>
            </tbody>
        </table>
    </body>
</html>