<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating Directory . . .</title>
    <link rel="stylesheet" href="./vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
</head>

<body>
    <?php
    $dirname = $_POST["dirname"];
    if (!is_dir("uploads/" . $dirname)) {
        mkdir("uploads/" . $dirname, 0777, true);
        print("<div class='container' style='width: 300px;height: 200px;margin-top: 5%;'>");
        print("<h3 style='font-size: 200px;text-align: center;color: #28a745;'><i class='fas fa-check-circle'></i></h3>");
        print("<h3 style='text-align: center;'>Directory Created</h3>");
        print("</div>");
        header("Refresh:1; url=filem.php", true, 303);
        exit();
    } else {
        print("<div class='container' style='width: 300px;height: 200px;margin-top: 5%;'>");
        print("<h3 style='font-size: 200px;text-align: center;color: #28a745;'><i class='fas fa-check-circle'></i></h3>");
        print("<h3 style='text-align: center;'>Already Created</h3>");
        print("</div>");
        header("Refresh:1; url=filem.php", true, 303);
        exit();
    }
    ?>

    <script src="./vendor/jquery/dist/jquery.min.js"></script>
    <script src="./vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>