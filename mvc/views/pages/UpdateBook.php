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
    <div class="row">
        <div class="col-2">
            <img src="<?php echo $image_url; ?>" class="img-fluid                                                                                                " alt="IMAGE">
        </div>

        <div class="col-4">
        <div class="row"><h2><?php echo $title; ?></h2></div>
        <div class="row"><p>Author: <?php echo $author_name; ?></p></div>
        <div class="row"><p>Publisher: <?php echo $publisher; ?></p></div>
        <div class="row"><p>Desciption: <?php echo $description; ?></p></div>
        <div class="row"><p>Price: <?php echo $price; ?> VND</p></div>
        </div>

        <div class="col-6">
            <h2>Update your book here</h2>
            <form method="post" action="../script/updateUserDetails.php">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="<?php echo $author_name; ?>">
            </div>
            <div class="form-group">
                <label>Publisher</label>
                <input type="text" class="form-control" placeholder="<?php echo $publisher; ?>">
            </div>
            <div class="form-group">
                <label >Description</label>
                <textarea class="form-control" rows="3" placeholder="<?php echo $description; ?>"></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="text" class="form-control" placeholder="<?php echo $image_url; ?>">
            </div>
            <div class="form-group">
                <label>Price (VND)</label>
                <input type="text" class="form-control" placeholder="<?php echo $price; ?>">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

            <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
        </form>
        </div>
    </div>
</div>