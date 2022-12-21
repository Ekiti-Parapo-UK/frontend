<?php

$foo = new Upload($_FILES['photo']);
if ($foo->uploaded) {

    // save uploaded image with a new name,
    // resized to 100px wide
    $foo->file_new_name_body = $picid;
    $foo->image_resize = true;
    $foo->image_convert = gif;
    $foo->image_x = 400;
    $foo->image_ratio_y = true;
    $foo->Process('pics');
    if ($foo->processed) {

        $foo->Clean();

        $_SESSION["msg"] = "<font color=green><img src=images/yes.png align=absmiddle> <b>Picture successfully uploaded<br>You may have to refresh your browser to observe changes.</b></font><br><br>";
    } else {
        $_SESSION["msg"] = 'error : ' . $foo->error;
    }
}