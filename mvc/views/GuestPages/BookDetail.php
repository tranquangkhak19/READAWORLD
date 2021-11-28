<?php
  $author_name = $data['author_name'];
  $book = $data['book'];
  
  $row=mysqli_fetch_assoc($book);

  $isbn = $row['ISBN'];
  $title = $row['TITLE'];
  $price = $row['PRICE'];
  $publisher = $row['PUBLISHER_NAME'];
  $author_id = $row['AUTHOR_ID'];
  $image_url = $row['IMAGE_URL'];
  $description = $row['description'];
?>

<div class="container my-4 ">
  <a href="Show" class="btn btn-primary mb-3">Back</a>

  <div class="row py-3 m-1 border border-dark rounded">
    <div class="col-4">
        <img src="<?php echo $image_url; ?>" class="img-fluid                                                                                                " alt="IMAGE">
    </div>

    <div class="col-8 ">
        <div class="row d-none" id="isbn"><?php echo $isbn; ?></div>
        <div class="row"><h2><?php echo $title; ?></h2></div>
        <div class="row"><p>Author: <?php echo $author_name; ?></p></div>
        <div class="row"><p>Publisher: <?php echo $publisher; ?></p></div>
        <div class="row"><p>Desciption: <?php echo $description; ?></p></div>
        <div class="row">
            <p>
                Price:
                <h3 class="text-danger"><?php echo $price; ?> VND</h3>
            </p>
        </div>
        <div class="row mt-3 mb-5">
          <div class="col-2">
            <p>Quantity:</p>
          </div>
          <div class="col-2">
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" placeholder="1" min=1></input>
          </div>
          
        </div>

        <a href="" class="btn btn-danger" id="btn_add_to_cart"><i class="fas fa-cart-plus"></i> Add To Cart</a>
      
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_add_to_cart").click(function(){
      var isbn = $("#isbn").text();
      var quantity = $("#quantity").val();

      $.ajax({
        url:"AddToCart",
        method:"POST",
        data:{isbn:isbn,quantity:quantity},
        success:function(data){
          
        }
      });
		});
	});
</script>