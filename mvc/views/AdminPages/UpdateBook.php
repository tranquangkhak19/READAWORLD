<?php
    $authors = $data['authors'];

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
    <div class="row">
        <div class="col-lg-6 col-md-11 col-sm-11 border border-dark rounded m-3 p-2">
            <div class="row">
                <div class="col-6">
                    <img src="<?php echo $image_url; ?>" class="img-fluid                                                                                                " alt="IMAGE">
                </div>
                <div class="col-6">
                    <div class="row"><h2><?php echo $title; ?></h2></div>
                    <div class="row"><p>Author: <?php echo $author_name; ?></p></div>
                    <div class="row"><p>Publisher: <?php echo $publisher; ?></p></div>
                    <div class="row"><p>Desciption: <?php echo $description; ?></p></div>
                    <div class="row"><p>Price: <?php echo $price; ?> VND</p></div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-11 col-sm-11 border border-dark rounded m-3 p-2">
            <h2 class="text-danger">Update your book here</h2>

            <form method="post" action="UpdateBookToDB?isbn=<?php echo $isbn; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="<?php echo $title; ?>">
            </div>
            <!-- <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" placeholder="<?php echo $author_name; ?>">
            </div> -->
            <div class="form-group">
                <label>Author</label>
                <select class="form-control" name="author_id">
                    <?php
                        while($row=mysqli_fetch_assoc($authors))
                        {
                          $a_id = $row['ID'];
                          $a_name = $row['ANAME'];
                          ?>
                            <option value="<?php echo $a_id; ?>" <?php if($a_id==$author_id){echo "selected";} ?>> 
                                <?php echo $a_name;?>
                            </option>
                          <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Publisher</label>
                <input type="text" name="publisher" class="form-control" value="<?php echo $publisher;?>" placeholder="<?php echo $publisher;?>" >
            </div>
            <div class="form-group">
                <label >Description</label>
                <textarea name="description" class="form-control" rows="3" value="" placeholder="<?php echo $description; ?>"><?php echo $description;?></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image" class="form-control" value="<?php echo $image_url; ?>" placeholder="<?php echo $image_url; ?>">
            </div>
            <div class="form-group">
                <label>Price (VND)</label>
                <input type="number" name="price" class="form-control" value="<?php echo $price; ?>" placeholder="<?php echo $price; ?>">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

            <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
        </form>
        </div>
    </div>
</div>