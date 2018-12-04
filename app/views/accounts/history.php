<?php require __ROOT__.'/views/include/header.php'; ?>
<div class="mainbody container">
    <div class="row">

         <?php require __ROOT__.'/views/accounts/sidebar.php' ;?>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="panel-title pull-left" style="font-size:30px;">History</h1>
                </div>
            </div>
            <?php if(!empty($data['history'])):?>
            <?php
                $grouped = [];
                foreach($data['history'] as $key => $order){
                    if(!isset($grouped[$order->OrderId])){
                        $grouped[$order->OrderId] = [];
                        $grouped[$order->OrderId]['OrderDetail'] = [];
                    }
                    if(!isset($grouped[$order->OrderId][$order->ProductId])){
                        $grouped[$order->OrderId]['OrderDetail'][$order->ProductId] = [];
                        
                    }
                    $grouped[$order->OrderId]['OrderDetail'][$order->ProductId]['Quantity'] = $order->Quantity;
                    $grouped[$order->OrderId]['OrderDetail'][$order->ProductId]['ProductName'] = $order->ProductName;
                    $grouped[$order->OrderId]['OrderDetail'][$order->ProductId]['ProductPrice'] = $order->Price;
                    $grouped[$order->OrderId]['SumPrice'] = $order->SumPrice;
                    $grouped[$order->OrderId]['CreatedAt'] = $order->CreatedAt;
                }
            ?>
           
            <?php foreach($grouped as $key => $order): ?>
                <div class="panel panel-default ">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Order number</h3>
                        <br><br>
                        <h3><?=$key?></h3>
                        <h3 class="panel-title pull-left">Order date</h3>
                        <br><br>
                        <h3><?=$order['CreatedAt']?></h3>
                        <h3 class="panel-title pull-left">Total</h3>
                        <br><br>
                        <h3><?=number_format($order['SumPrice'])?> VND</h3>
                        <h5 class="panel-title pull-left">Detail </h5>
                        <br><br>
                        <?php foreach($order['OrderDetail'] as $productId => $product):?> 
                                <h5 class='panel-title pull-left'>
                                    <?=$product['ProductName'] . ' x '.  $product['Quantity']?>
                                </h5>
                                <br><br>
                        <?php endforeach;?>
                        
                    </div>
                </div>
            <?php endforeach;?>
            <?php endif;?>
        
        </div>
    </div>
</div>
<div style="margin-bottom:150px;"> </div>
<?php require __ROOT__.'/views/include/footer.php'; ?>