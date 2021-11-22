<!-- USE FOR AJAX -->
<?php
    if(empty($data))
    {
        echo "BOOKSTORE!";
    }
    else
    {
        require_once "./mvc/views/GuestPages/".$data["page"].".php";
    }
?>