<?php
    $books = $data["books"];
    $authors = $data["books"];

    $num_books = mysqli_num_rows($books);
    $num_items_in_row = 3;
    $num_rows = ($num_books % $num_items_in_row == 0) ? ($num_books / $num_items_in_row) : ($num_books / $num_items_in_row + 1) ;
    // echo $num_books;
    // echo $num_rows;
    $count_rows = 1;
?>

<div class="container">
    <div class="row">
        <div class="col-2">Filter</div>
        <div class="col-10">
            <?php
            while($count_rows <= $num_rows)
            {
                echo '<div class="row mb-5">';
                    for($i=1; $i<=$num_items_in_row; $i++)
                    {   
                        $book=mysqli_fetch_assoc($books);
                        $isbn = $book['ISBN'];
                        $title = $book['TITLE'];
                        $price = $book['PRICE'];
                        $publisher = $book['PUBLISHER_NAME'];
                        $author_id = $book['AUTHOR_ID'];
                        $image_url = $book['IMAGE_URL'];

                        echo
                        '
                            <div class="col-4">
                                <div class="card" style="width:18rem; height:36rem;">
                                    <div class="img" sylte="height:24rem;">
                                        <img class="card-img-top" style="max-width:100%; max-height:100%;" src="'.$image_url.'" alt="Image">
                                    </div>
                                    <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                echo '</div>';
                
                $count_rows++;
            }
            ?>
        </div>
    </div>
        
</div>
