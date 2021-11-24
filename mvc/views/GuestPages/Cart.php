<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<?php
    $books = $data['books'];
    $num_books = count($books);
?>

<style>
    input[type=checkbox] {
        transform: scale(2);
    }
</style>

<div class="container padding-bottom-3x mb-1">
    <h1 class="text-center">Your Cart</h1>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
                <tr>
                    <th>Choose</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th class="text-center">Price (VND)</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Subtotal (VND)</th>
                    <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Clear Cart</a></th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $total = 0;
                    if($num_books)
                    {   
                        for($i=0; $i<$num_books; $i++)
                        {
                            $price = floatval($books[$i]["price"]);
                            $quantity = $books[$i]["quantity"];
                            $subTotal = $price*$quantity;
                            $total+=$subTotal;
                            echo
                            '
                            <tr id="row'.($i+1).'">
                                <td class="text-center" style="width: 3%">
                                    <input type="checkbox" id="checkbox'.($i+1).'" value="'.$books[$i]["isbn"].'">
                                </td>
                                <td>
                                    <a class="product-thumb" href="BookDetail?isbn='.$books[$i]["isbn"].'"><img src="'.$books[$i]["image"].'" alt="Image" width="100" height="140"></a>
                                </td>
                                <td style="width: 20%">
                                    <div class="product-info">
                                        <h6><a href="BookDetail?isbn='.$books[$i]["isbn"].'">'.$books[$i]["title"].'</a></h6>
                                    </div>
                                </td>
                                <td class="text-center text-lg text-medium">'.$books[$i]["price"].'</td>
                                <td style="width: 10%" class="text-center">
                                        <input class="form-control form-control-sm" id="quantity'.($i+1).'" type="number" name="" value="'.$quantity.'" min="1">
                                </td>
                                <td class="text-center text-lg text-medium" id="subTotal'.($i+1).'">'.$subTotal.'</td>

                                <td class="text-center">
                                    <a class="btn btn-danger" id="delete'.($i+1).'" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></a>
                                </td>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                        <button type="button" class="close btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this book in yout cart?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        <button type="button" id="yesDelete" class="btn btn-danger" data-dismiss="modal">Yes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                            </tr>
                            ';
                        }
                    }
                    else
                    {
                        echo "YOUR CART IS EMPTY";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6"></div>
        <div class="col-3 text-lg"><h5>Total: <p id="total">0</p> (VND)</h5></div>
    </div>
    <div class="row">
        <div class="col-3"><a class="my-5 btn btn-outline-secondary" href="#"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
        <div class="col-5"></div>
        <div class="col-2 text-center">
        </div>
        <div class="col-2 text-center">
            <a class="my-5 btn btn-success" href="#">Checkout</a>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var total = 0;
        var oldQuantity = 0;

        <?php for($i=1; $i<=$num_books; $i++) { ?>
            $("#quantity<?php echo $i;?>").focusin(function(){
                oldQuantity = $("#quantity<?php echo $i;?>").val();
                //console.log(oldQuantity);
            }).change(function() {
                var isbn = $("#checkbox<?php echo $i;?>").val();
                var quantity = $("#quantity<?php echo $i;?>").val();
                console.log(isbn, quantity);
                    $.ajax({
                        url: "UpdateBookQuantityInCart",
                        type: "POST",
                        data: {isbn:isbn, quantity:quantity},
                        success:function(){
                            // index $i-1 because index in this loop start with 1
                            <?php $tempPrice = floatval($books[$i-1]["price"]); ?>
                            var tempSubTotal = <?php echo $tempPrice; ?>*quantity;
                            //console.log(tempSubTotal);
                            $("#subTotal<?php echo $i;?>").text(tempSubTotal);

                            console.log(oldQuantity);
                            if($("#checkbox<?php echo $i;?>").is(":checked"))
                            {
                                total -= oldQuantity*<?php echo $tempPrice; ?>;
                                total += tempSubTotal;
                                $("#total").text(total);
                                //fixed
                                oldQuantity = quantity;
                            }
                        }
                    });
            });

            $("#checkbox<?php echo $i;?>").change(function() { 
                if($(this).is(":checked")) { 
                    var subTotal = parseFloat($("#subTotal<?php echo $i;?>").text());
                    total += subTotal;
                } 
                else {
                    var subTotal = parseFloat($("#subTotal<?php echo $i;?>").text());
                    total -= subTotal;
                }
                $("#total").text(total);
            });

            $("#delete<?php echo $i;?>").click(function() { 
                var isbn = $("#checkbox<?php echo $i;?>").val();
                $("#yesDelete").click(function(){
                    $.ajax({
                        url: "DeleteBookInCart",
                        type: "POST",
                        data: {isbn:isbn},
                        success:function(){
                            <?php
                                $_SESSION['numbooks'] -= 1;
                                $numBooksInIcon = $_SESSION['numbooks']
                            ?>
                            if($("#checkbox<?php echo $i;?>").is(":checked"))
                            {
                                var subTotal = parseFloat($("#subTotal<?php echo $i;?>").text());
                                total -= subTotal;
                                $("#total").text(total);
                            }
                            $("#row<?php echo $i;?>").text("");
                            $("#numbooks_icon").text("<?php echo $numBooksInIcon>=0?$numBooksInIcon:0;?>");
                            console.log(<?php echo $_SESSION['numbooks'] ?>);
                        }
                    });
                });
            });

        <?php } ?>
    });
</script>
