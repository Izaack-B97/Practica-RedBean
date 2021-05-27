<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body class="p-5 my-5">
<?php 
    if ( isset( $_GET['id'] ) ) {
?>
        <!-- <div class="alert alert-primary" role="alert">
            Estamos preparando su solicitud...
        </div> -->
<?php
        require_once __DIR__ . '/database.php';
        $user = R::load( 'users', $_GET['id'] );
        $resultDelete = R::trash( $user );

        if ($resultDelete) {
            // sleep(1);
            header('Location: redbean.php');
        }
    }
?>
</body>
</html>