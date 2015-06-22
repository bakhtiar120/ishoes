<!DOCTYPE HTML>
<html lang="en-US">
<head>
 <title>Shop</title>
 <meta charset="UTF-8">
 <link href="<?php echo base_url();?>/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
 <div id="products">
 <ul>
  <?php foreach ($jeniskomponen as $product): ?>
  <li>
   <?php echo form_open('shop/add'); ?>
   <div class="name"><?php echo $product->nama; ?></div>
   <div class="thumb">
   <?php echo img(array(
    'src' => 'images/' . $product->keterangan,
    'class' => 'thumb',
    'alt' => $product->nama,
    'width'=>100
   )); ?>    
   </div>
   <div class="price">Rp <?php echo $product->harga; ?></div>
    
   <?php echo form_hidden('id', $product->ID_Jenis_Komponen); ?>
   <?php echo form_submit('action', 'Tambah ke Keranjang'); ?>
   <?php echo form_close(); ?>
  </li>
  <?php endforeach; ?>
 </ul>
 </div>
  
 <?php if ($cart = $this->cart->contents()): ?>
 <div id="cart">
  <table>
  <caption>Shopping Cart</caption>
  <thead>
   <tr>
    <th>Nama Item</th>
    <th>Pilihan</th>
    <th>Harga</th>
    <th></th>
   </tr>
  </thead>
  <?php foreach ($cart as $item): ?>
   <tr>
    <td><?php echo $item['name']; ?></td>
    <td>
     <?php if ($this->cart->has_options($item['rowid'])) {
      foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
       echo $option . ": <em>" . $value . "</em>";
      }
       
     } ?>
    </td>
    <td>Rp <?php
    $harga=number_format($item['subtotal'],2,",",".");
    echo $harga;
     
    ?></td>
    <td class="remove">
     <?php echo anchor('shop/remove/'.$item['rowid'],'X'); ?>
    </td>
   </tr>
  <?php endforeach; ?>
  <tr class="total">
   <td colspan="2"><strong>Total</strong></td>
   <td>Rp <?php
   $harga_tot=number_format($this->cart->total(),2,",",".");
   echo $harga_tot;
    
   ?></td>
  </tr>
  </table>  
 </div>
 <?php endif; ?>
</body>
</html>