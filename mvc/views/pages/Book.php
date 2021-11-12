<div class="container">
  <h1>List of Books</h1>
  <div>
    <a href="addBook"  class="btn btn-success" >Add Book</a>
  </div>

  <table id="cusTable" class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ISBN</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Author</th>
        <th scope="col">Publisher</th>
        <th scope="col">Price</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $author_names = $data['author_names'];
        $books = $data['books'];

        if($books)
        {
          //Count rows in database
          $count_rows = mysqli_num_rows($books);
          //count for author_names
          $count = 0;

          if($count_rows>0)
          {
            while($row=mysqli_fetch_assoc($books))
            {
              $isbn = $row['ISBN'];
              $title = $row['TITLE'];
              $price = $row['PRICE'];
              $publisher = $row['PUBLISHER_NAME'];
              $author_id = $row['AUTHOR_ID'];
              $image_url = $row['IMAGE_URL'];

              ?>

              <tr>
                  <td><?php echo $isbn; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><div><img src=<?php echo $image_url ?> alt=<?php echo "IMAGE" ?> width="100" height="150"></div></td>
                  <td>
                    <?php 
                      echo $author_names[$count]; 
                      $count++; 
                    ?>
                  </td>
                  <td><?php echo $publisher; ?></td>
                  <td><?php echo $price; ?></td>
                  <td>
                    <a href="BookDetail?isbn=<?php echo $isbn; ?>" class="btn btn-sm btn-primary">Detail</a>
                    <a href="UpdateBook?isbn=<?php echo $isbn; ?>" class="btn btn-sm btn-secondary">Update</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                  </td>
              </tr>

              <?php
            }
          }
        }
      ?>
    </tbody>
  </table>
</div>