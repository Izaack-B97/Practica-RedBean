<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedBean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="container my-5">
    <!-- <h1>Estamos procesando tu peticion . . . </h1> -->
    <?php 
        require_once __DIR__ . '/database.php';

        if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) && isset( $_POST['checkbox'] ) ) {

            // Creamos el objeto a almacenar
            $user = R::dispense('users');
            $user-> email = $_POST['email'];
            $user-> password = $_POST['password'];
            $user-> check = $_POST['check'] ?? 'off';
            $id = R::store( $user );
        }
        $allUsers = R::getAll('SELECT * FROM users');
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($allUsers); $i++) { ?>
                <tr>
                    <td><?php echo $allUsers[ $i ]['id']; ?></td>
                    <td><?php echo $allUsers[ $i ]['email']; ?></td>
                    <td><?php echo $allUsers[ $i ]['password']; ?></td>
                    <td><?php echo $allUsers[ $i ]['check']; ?></td>
                    <td>
                        <a href="./info.php?id=<?php echo $allUsers[ $i ]['id']; ?>" class="btn btn-primary">Ver</a>
                    </td>
                </tr>                   
            <?php } ?>
        </tbody>
    </table>
</body>
</html>