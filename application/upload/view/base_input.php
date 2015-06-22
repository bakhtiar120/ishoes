<html>
    <head>
        <title>CRUD CodeIgniter</title>
    </head>
    <body>
        <table>
  
            <tbody>
                <h2><?php echo $type;?></h2>
    <?php echo form_open('base/post'); ?>
    <?php if ($type=="EDIT"){ 
     echo form_hidden('ID_Base_Model', $this->input->get('base'));
     }
     ?>
                        <tr>
    <td>Nama Base</td>
    <td><input type="text" name="nama" value="<?php if ($type=="EDIT"){echo $base[0]->Nama_Base;};?>"></td>
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