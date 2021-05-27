<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="container pt-5">
    <?php
        require_once __DIR__ . '/database.php';

        if ( isset( $_GET['id'] ) ) {
            $user = R::load( 'users',  $_GET['id'] ) ;
            // Actualizamos los datos en la bd
            if ( isset($_POST['email']) || isset($_POST['password']) || isset($_POST['checkbox']) ) {
                $user['email']    = $_POST['email'];
                $user['password'] = $_POST['password'];
                $user['check']    = $_POST['checkbox'] ?? 'off';
                R::store( $user );
                sleep( 1 );
    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Actualizaci&oacute;n satisfactoria.</strong> Puedes verificarlo en todos los registros
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
                sleep(0.2);
                header('Location: redbean.php');
        }
    ?>  
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID</label>
                    <input name="id" type="text" class="form-control" value="<?php echo $user['id']; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" value="<?php echo $user['email']; ?>">
                </div>
                <div class="mb-3">
                    <label name="password" for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $user['password'] ?>">
                </div>
                <div class="mb-3 form-check">
                    <input name="checkbox" type="checkbox" class="form-check-input" id="exampleCheck1" <?php echo ( $user['check'] === 'on' ) ? 'checked' : '' ?> />
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="mb-3 form-check d-flex justify-content-end">
                    <button type="submit" class="btn btn-lg btn-primary mx-2">Actualizar</button>
                    <a href="./delete.php?id=<?php echo $user['id']; ?>" class="btn btn-lg btn-danger">Eliminar</a>
                </div>
            </form>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>