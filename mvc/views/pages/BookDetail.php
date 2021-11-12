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

<div class="container">
  <a href="#" class="btn btn-primary mb-3">Back</a>
  <div class="card flex-row flex-wrap">
    <div class="card-header border-0">
        <img src="<?php echo $image_url; ?>" alt="IMAGE">
    </div>
    <div class="card-block px-2">
        <h4 class="card-title"><?php echo $title; ?></h4>
        <p class="card-text">Author: <?php echo $author_name; ?></p>
        <p class="card-text">Publisher: <?php echo $publisher; ?></p>
        <p class="card-text">Desciption: <?php echo $description; ?></p>
        <p class="card-text">Price: <?php echo $price; ?> VND</p>

        <a href="#" class="btn btn-secondary">Update</a>
    </div>
  </div>
</div>