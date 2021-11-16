<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<?php
    $books = $data['books'];
    $num_books = count($books);
?>

<div class="container padding-bottom-3x mb-1">
    <h1 class="text-center">Your Cart</h1>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Image</th>
                    <th>Book</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Subtotal (VND)</th>
                    <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Clear Cart</a></th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $Total = 0;
                    if($num_books)
                    {   
                        for($i=0; $i<$num_books; $i++)
                        {
                            $price = floatval($books[$i]["price"]);
                            $quantity = $books[$i]["quantity"];
                            $subTotal = $price*$quantity;
                            $Total+=$subTotal;
                            echo
                            '
                            <tr>
                                <td>
                                    <h6 style="width: 5%">'.($i+1).'</h6>
                                </td>
                                <td>
                                    <a class="product-thumb" href="BookDetail?isbn='.$books[$i]["isbn"].'"><img src="'.$books[$i]["image"].'" alt="Image" width="100" height="140"></a>
                                </td>
                                <td style="width: 20%">
                                    <div class="product-info">
                                        <h6><a href="BookDetail?isbn='.$books[$i]["isbn"].'">'.$books[$i]["title"].'</a></h6>
                                    </div>
                                </td>
                                <td style="width: 10%" lass="text-center">
                                        <input class="form-control form-control-sm" type="number" name="" value="'.$quantity.'">
                                </td>
                                <td class="text-center text-lg text-medium">'.$subTotal.'</td>
                                <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            ';
                        }
                    }
                    else
                    {
                        echo "YOUR CART HAS NO ITEM";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6"></div>
        <div class="col-3 text-lg"><h5>Total: <?php echo $Total." (VND)"; ?></h5></div>
    </div>
    <div class="row">
        <div class="col-3"><a class="my-5 btn btn-outline-secondary" href="#"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
        <div class="col-5"></div>
        <div class="col-2 text-center">
            <a class="my-5 btn btn-primary" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a>
        </div>
        <div class="col-2 text-center">
            <a class="my-5 btn btn-success" href="#">Checkout</a>
        </div>
    </div>
</div>