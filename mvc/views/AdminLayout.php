<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <?php require_once "./mvc/views/blocks/Header.php";?>
    <div class="m-3">
        
        <?php
            if(empty($data))
            {
                echo 
                '
                    <div class="row" id="#board">
                        <div class="col p-5 m-2 bg-primary rounded">Total Members</div>
                        <div class="col p-5 m-2 bg-primary rounded">Total Books</div>
                        <div class="w-100"></div>
                        <div class="col p-5 m-2 bg-primary rounded">Total Revenue</div>
                        <div class="col p-5 m-2 bg-primary rounded">Others</div>
                    </div>
                ';
            }
            else
            {
                require_once "./mvc/views/pages/".$data["page"].".php";
            }
        ?>
    </div>
    <?php require_once "./mvc/views/blocks/Footer.php";?>
</body>
</html>

