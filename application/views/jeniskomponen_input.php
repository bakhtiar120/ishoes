<html>
    <head>
        <title>CRUD CodeIgniter</title>
    </head>
    <body>
        <table>
  
            <tbody>
                <h2><?php echo $type;?></h2>
    <?php echo form_open('jenis_komponen/post'); ?>
    <?php if ($type=="EDIT"){ 
     echo form_hidden('ID_Jenis_Komponen', $this->input->get('jeniskomponen'));
     }
     ?>
     <?php if ($type=="INPUT"){ ?>
     <tr>
    <td>Nama Komponen</td>
    <td>:</td>
    <td><select name="ID_Komponen" size="1">
    <?php
    foreach($records as $row):?>
    <option value="<?php echo($row->ID_Komponen);?>"> <?php echo($row->Nama_Komponen);?> </option>
    <?php endforeach; ?>
    </select></td>
</tr>
        <?php
     }
     ?>
     
    <tr>
    <td>Nama Jenis Komponen</td>
    <td><input type="text" name="nama" value="<?php if ($type=="EDIT"){echo $jeniskomponen[0]->nama;};?>"></td>
   </tr>
   <tr>
    <td>Harga</td>
    <td><input type="text" name="harga" value="<?php if ($type=="EDIT"){echo $jeniskomponen[0]->harga;};?>"></td>
   </tr>
   <tr>
    <td>Keterangan</td>
    <td><input type="text" name="keterangan" value="<?php if ($type=="EDIT"){echo $jeniskomponen[0]->keterangan;};?>"></td>
   </tr>
   <tr>
    <td></td>
    <td><input type="submit" name="simpan" value="<?php echo $type;?>"></td>
   </tr>
   <?php echo form_close();?>
            </tbody>
        </table>
    </body>
</html>