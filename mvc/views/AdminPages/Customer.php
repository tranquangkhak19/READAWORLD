<div class="container">
  <h1>List of Customers</h1>
  <!-- <div>
    <a href="addUser"  class="btn btn-success" >Add User</a>
  </div> -->

  <table id="cusTable" class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Username</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <?php
          if($data["customers"])
          {
              //Count rows in database
              $count_rows = mysqli_num_rows($data["customers"]);

              //count variable
              $count = 1;

              if($count_rows>0)
              {
                  while($row=mysqli_fetch_assoc($data["customers"]))
                  {
                      $id = $row['ID'];
                      $username = $row['USERNAME'];
                      $fname = $row['FNAME'];
                      $lname = $row['LNAME'];

                      ?>

                      <tr>
                          <td><?php echo $count++; ?></td>
                          <td><?php echo $username; ?></td>
                          <td><?php echo $fname; ?></td>
                          <td><?php echo $lname; ?></td>
                          <td>
                              <a href="CustomerDetail?id=<?php echo $id;?>" class="btn btn-sm btn-primary">Detail</a>
                              <a href="DeleteCustomer?id=<?php echo $id;?>" class="btn btn-sm btn-danger">Delete</a>
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