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
  <a href="Book" class="btn btn-primary mb-3">Back</a>

  <div class="row border border-dark rounded m-1 p-2">
    <div class="col-4">
        <img src="<?php echo $image_url; ?>" class="img-fluid                                                                                                " alt="IMAGE">
    </div>

    <div class="col-8">
      <div class="row"><h2><?php echo $title; ?></h2></div>
      <div class="row"><p>Author: <?php echo $author_name; ?></p></div>
      <div class="row"><p>Publisher: <?php echo $publisher; ?></p></div>
      <div class="row"><p>Desciption: <?php echo $description; ?></p></div>
      <div class="row"><p>Price: <?php echo $price; ?> VND</p></div>
      <a href="UpdateBook?isbn=<?php echo $isbn;?>" class="btn btn-secondary"><i class="fas fa-edit"></i> Update</a>
    </div>
  </div>
</div>