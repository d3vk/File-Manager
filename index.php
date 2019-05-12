<?php
setcookie("user", "Capt", time() + 20);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Management</title>
    <!-- Style -->
    <link rel="stylesheet" href="./vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Style -->
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="filem.php"><i class="fas fa-folder"></i> <b>File</b>Manager</a>
    </nav>
    <!-- Navigation Bar -->

    <!-- Login card -->
    <div class="container">
        <div class="col-sm-4" style="top: 50%;left: 50%;transform: translate(-50%,50%);">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
                    <hr>
                    <p class="text-success text-center">
                        <?php
                        if (isset($_COOKIE["user"])) {
                            echo "Welcome aboard, " . $_COOKIE["user"] . "!<br>";
                        } else {
                            echo "Loading cookies...";
                        }
                        ?>
                    </p>
                    <form action="session_hand.php" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="username" class="form-control" placeholder="username" type="text">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="password" class="form-control" placeholder="password" type="password">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->
        </div>
    </div>
    <!--container end.//-->

    <!-- Script -->
    <script src="./vendor/jquery/dist/jquery.min.js"></script>
    <script src="./vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Script -->
</body>

</html>