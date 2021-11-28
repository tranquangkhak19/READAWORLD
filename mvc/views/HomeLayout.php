<!-- This layout for everyone who hasn't logged in to the system -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <title>READAWORLD</title>
</head>
<body class="m-0">
    <?php require_once "./mvc/views/blocks/Header.php";?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12" id="filter">
                <?php require_once "./mvc/views/blocks/Filter.php";?>
            </div>
            <div class="col-10" id="list-books">
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
            </div>
        </div>
            
    </div>

    <div class="m-3">
        
    </div>
    <?php require_once "./mvc/views/blocks/Footer.php";?>
</body>
</html>

