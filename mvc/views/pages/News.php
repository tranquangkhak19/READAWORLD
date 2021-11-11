<h2>NEWS PAGE</h2>

<?php
    while($row = mysqli_fetch_array($data["sv"]))
    {
        echo $row["name"]." ";
    }
?>