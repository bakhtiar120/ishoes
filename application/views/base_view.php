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
  <a href="<?php echo site_url('base/input');?>">Input</a>
                <?php
$no = 1;
foreach($records as $value)
{
                ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $value->Nama_Base;?></td>
                   
      <td><a href="<?= site_url("base/edit")."?base=".$value->ID_Base_Model;?>">edit</a>|<a href="<?= site_url("base/delete")."?base=".$value->ID_Base_Model;?>">delete</a> </td>
                </tr>
                <?php
}
                ?>
            </tbody>
        </table>
    </body>
</html>