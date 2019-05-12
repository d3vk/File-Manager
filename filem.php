<?php
session_start();
if (isset($_SESSION["user"])) {

} else {
    header("Location: index.php?login=failed");
}
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
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" href="filem.php"><i class="fas fa-folder"></i> <b>File</b>Manager</a>
        <a href="logout.php"><button class="btn btn-danger btn-sm" type="submit">Logout</button></a>
    </nav>
    <!-- Navigation Bar -->

    <!-- File Manager Function -->
    <div class="container" id="btnOperate" style="margin-top:15px;">
        <form action="create.php" method="post">
            Directory Name: <input type="text" name="dirname" class="dirname form-control-sm">
            <button type="submit" name="create" value="Create Directory" class="create btn btn-sm btn-dark">Create</button>
        </form>
        <hr>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Upload file(s): <input type="file" name="files" class="form-control-sm">
            <button type="submit" name="upload" value="Upload" class="btn btn-sm btn-dark"><i class="fas fa-upload"></i> Upload</button>
        </form>
        <hr>
    </div>
    <!-- File Manager Function -->

    <!-- Panel -->
    <div class="container" style="margin-top:15px;">
        <div class="row">
            <div class="col-md-12">
                <h4>Directory Panel</h4>
                <div class="table-responsive">

                    <?php
                    $dir = "uploads";

                    $myDirectory = opendir($dir);

                    while ($entryName = readdir($myDirectory)) {
                        $dirArray[] = $entryName;
                    }
                    closedir($myDirectory);

                    $indexCount = count($dirArray);

                    sort($dirArray);

                    print("<table id='mytable' class='table table-sm table stripped'>");
                    print("<thead>");
                    print("<th>Name</th>
                    <th>Size</th>
                    <th>Last Modified</th>
                    <th>Type</th>
                    <th>Delete</th>");
                    print("<thead>");

                    for ($index = 0; $index < $indexCount; $index++) {
                        if (substr("$dirArray[$index]", 0, 1) != "." && substr("$dirArray[$index]", 0, 1) != "..") { // don't list hidden files

                            $fullFilePath = $dir . '/' . $dirArray[$index];
                            $size = filesize($fullFilePath);

                            print("<tbody>");
                            print("<tr>");
                            print("<td><a href=\"$fullFilePath\" style='text-decoration:none; color:#000;'>$dirArray[$index]</a></td>");
                            if (filetype($fullFilePath) == "file") {
                                if ($size >= 1073741824) {
                                    $size = number_format($size / 1073741824, 2) . ' GB';
                                    print("<td>" . $size . "</td>");
                                } elseif ($size >= 1048576) {
                                    $size = number_format($size / 1048576, 2) . ' MB';
                                    print("<td>" . $size . "</td>");
                                } elseif ($size >= 1024) {
                                    $size = number_format($size / 1024, 2) . ' KB';
                                    print("<td>" . $size . "</td>");
                                } elseif ($size > 1) {
                                    $size = $size . ' bytes';
                                    print("<td>" . $size . "</td>");
                                } elseif ($size == 1) {
                                    $size = $size . ' byte';
                                    print("<td>" . $size . "</td>");
                                } else {
                                    $size = '0 bytes';
                                    print("<td>" . $size . "</td>");
                                }
                            } else {
                                print("<td>DIR</td>");
                            }
                            print("<td>" . date("M d Y", filemtime($fullFilePath)) . "</td>");
                            print("<td>" . filetype($fullFilePath) . "</td>");
                            // print("<td>" . substr(sprintf('%o', fileperms($fullFilePath)), -4) . "</td>");
                            print("<td><button type='button' name='remove_file' id = '" . $fullFilePath . "' class='remove_file btn btn-danger btn-sm'><i class='fas fa-trash'></i></button></td>");
                            print("</tr>");
                            print("</tbody>");
                        }
                    }
                    print("</table>");
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Panel -->

    <!-- Script -->
    <script src="./vendor/jquery/dist/jquery.min.js"></script>
    <script src="./vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove_file', function() {
                var path = $(this).attr("id");
                var action = "remove_file";
                if (confirm("Apakah anda ingin menghapus file ini?")) {
                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data: {
                            path: path,
                            action: action
                        },
                        success: function(data) {
                            alert(data);
                            location.reload();
                        }
                    })
                }
            })
        })
    </script>
    <!-- Script -->
</body>

</html>