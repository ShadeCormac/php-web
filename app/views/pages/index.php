<?php require __ROOT__.'/views/include/header.php'; ?>
<?php foreach($data as $item):?>
<p><?php echo nl2br($item->Description);?></p>
<img src="<?=__URL__.$item->ImageSource?>" alt="productimg">
<br>
<?php endforeach;?>

<?php require __ROOT__.'/views/include/footer.php'; ?>