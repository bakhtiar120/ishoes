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
                <th>Nama</th>
            </thead>
            <tbody>
                <h2>ISHOES</h2>
  <a href="<?php echo site_url('komponen/input');?>">Input</a>
                <?php
$no = 1;
foreach($records as $value)
{
                ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $value->Nama_Komponen;?></td>
                   
      <td><a href="<?= site_url("komponen/edit")."?komponen=".$value->ID_Komponen;?>">edit</a>|<a href="<?= site_url("komponen/delete")."?komponen=".$value->ID_Komponen;?>">delete</a> </td>
                </tr>
                <?php
}
                ?>
            </tbody>
        </table>
    </body>
</html>