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
        <th scope="col">Publisher</th>
        <!-- <th scope="col">Author</th> -->
        <th scope="col">Price</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <?php
          if($data['books'])
          {
              //Count rows in database
              $count_rows = mysqli_num_rows($data['books']);

              //count variable
              $count = 1;

              if($count_rows>0)
              {
                  while($row=mysqli_fetch_assoc($data['books']))
                  {
                      $isbn = $row['ISBN'];
                      $title = $row['TITLE'];
                      $price = $row['PRICE'];
                      $publisher = $row['PUBLISHER_NAME'];
                      $author_id = $row['AUTHOR_ID'];
                      $image_url = $row['IMAGE_URL'];

                      //$author_name = $row['AUTHOR_NAME'];

                      // $sql_get_author_name = "SELECT ANAME FROM author WHERE ID='$author_id'";
                      // $res_get_author_name = mysqli_query($conn, $sql_get_author_name);
                      // $author_name = mysqli_fetch_assoc($res_get_author_name)['ANAME'];

                      ?>

                      <tr>
                          <td><?php echo $isbn; ?></td>
                          <td><?php echo $title; ?></td>
                          <td><div><img src=<?php echo $image_url ?> alt=<?php echo "IMAGE" ?> width="100" height="150"></div></td>
                          <td><?php echo $publisher; ?></td>
                          <td><?php echo $price; ?></td>

                          <!-- <td><?php echo $author_name; ?></td> -->
                          <td>
                            <a href="" class="btn btn-primary">Detail</a>
                            <a href="" class="btn btn-secondary">Update</a>
                            <a href="" class="btn btn-danger">Delete</a>
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