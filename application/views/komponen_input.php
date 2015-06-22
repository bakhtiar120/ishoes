<html>
    <head>
        <title>CRUD CodeIgniter</title>
    </head>
    <body>
        <table>
  
            <tbody>
                <h2><?php echo $type;?></h2>
    <?php echo form_open('komponen/post'); ?>
    <?php if ($type=="EDIT"){ 
     echo form_hidden('ID_Komponen', $this->input->get('komponen'));
     }
     ?>
     <?php if ($type=="INPUT"){ ?>
     <tr>
    <td>Nama Base</td>
    <td>:</td>
    <td><select name="ID_Base_Model" size="1">
    <?php
    foreach($records as $row):?>
    <option value="<?php echo($row->ID_Base_Model);?>"> <?php echo($row->Nama_Base);?> </option>
    <?php endforeach; ?>
    </select></td>
    </tr>
        <?php
     }
     else { ?>
         <tr>
        <td>Base Model</td>
        <td><input type="hidden" name="ID_Base_Model" value="<?php if ($type=="EDIT"){echo $komponen[0]->ID_Base_Model;};?>"></td>
         </tr>
     
      <?php
     } ?>
    
    <tr>
    <td>Nama Komponen</td>
    <td><input type="text" name="nama" value="<?php if ($type=="EDIT"){echo $komponen[0]->Nama_Komponen;};?>"></td>
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