<?php
    $books = $data["books"];
    $authors = $data["books"];

    $num_books = mysqli_num_rows($books);
    $num_items_in_row = 4;
    $num_rows = ($num_books % $num_items_in_row == 0) ? ($num_books / $num_items_in_row) : ($num_books / $num_items_in_row + 1) ;
    // echo $num_books;
    // echo $num_rows;
    $count_rows = 1;
?>

<style>
    .card-img-top {
    width: 15vw;
    height: 100%;
    object-fit: cover;
    }
    .card-img-top:hover {
        background-color: rgba(251, 251, 251, 0.2);
    }
</style>

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
                        if(!$book)
                        {
                            break;
                        }
                        $isbn = $book['ISBN'];
                        $title = $book['TITLE'];
                        $price = $book['PRICE'];
                        $publisher = $book['PUBLISHER_NAME'];
                        $author_id = $book['AUTHOR_ID'];
                        $image_url = $book['IMAGE_URL'];

                        echo
                        '
                            <div class="col-3">
                                <div class="card" style="width:13rem;">
                                    <a href="BookDetail?isbn='.$isbn.'">
                                        <img class="card-img-top bg-image hover-zoom" style="height:300px; width:100%;" src="'.$image_url.'" alt="Image">
                                    </a>
                                    <div class="card-body">
                                        <a href="BookDetail?isbn='.$isbn.'" style="text-decoration: none;">
                                            <h6 style="height:50px; text-overflow: ellipsis;" class="card-title">'.$title.'</h6>
                                        </a>
                                        <h6>Price: '.$price.' VND</h6>
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
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
