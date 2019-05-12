<?php
if ($_POST["action"] == "remove_file") {
    if (is_dir($_POST["path"])) {
        rmdir($_POST["path"]);
    } elseif (file_exists($_POST["path"])) {
        unlink($_POST["path"]);
    }

    echo $_POST["path"] . " Berhasil dihapus";
}
?>