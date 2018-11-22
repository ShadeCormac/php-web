<?php require __ROOT__.'/views/include/header.php'; ?>
<?php foreach($data['most_view_products'] as $item):?>
<p><?php echo nl2br($item->Description);?></p>
<img src="<?=__URL__.$item->ImageSource?>" alt="productimg">
<br>
<?php endforeach;?>
<?php 
    //print_r($data['newest_products']);
    echo '<h2>NEED MARKUP FOR DATA</h2>';
?>
<?php require __ROOT__.'/views/include/footer.php'; ?>