<?php
    $authors = $data['authors'];
    $publishers = $data['publishers'];
?>

<div class="container">
    <a href="Book" class="btn btn-primary mb-3">Back</a>
    <div class="row">

        <div class="col-12">
            <h2 class="text-center">ADD A NEW BOOK</h2>
            <form method="post" action="AddBookToDB">
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" value="" placeholder="ISBN (char(13))">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="" placeholder="Title of this book">
                </div>
                <!-- <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" placeholder="">
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
                                <option value="<?php echo $a_id; ?>" > 
                                    <?php echo $a_name;?>
                                </option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label>Publisher</label>
                    <input type="text" name="publisher" class="form-control" value="" placeholder="Publisher of this book" >
                </div> -->
                <div class="form-group">
                    <label>Publisher</label>
                    <select class="form-control" name="publisher">
                        <?php
                            while($row=mysqli_fetch_assoc($publishers))
                            {
                            $p_name = $row['PNAME'];
                            ?>
                                <option value="<?php echo $p_name; ?>" > 
                                    <?php echo $p_name;?>
                                </option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <textarea name="description" class="form-control" rows="3" value="" placeholder="Description of this book"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="text" name="image" class="form-control" value="" placeholder="Paste the url of image">
                </div>
                <div class="form-group">
                    <label>Price (VND)</label>
                    <input type="number" name="price" class="form-control" value="" placeholder="Price of this book (VND)">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
                <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
            </form>
        </div>
    </div>
</div>