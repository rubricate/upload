<?php 

require '../vendor/autoload.php';

use Rubricate\Upload\FileUpload;

if( isset($_POST['submit']) )
{
    $file = $_FILES['file'];
    $path = dirname(__FILE__) . '/upload/';

    $upload = new FileUpload($file, $path);
    $upload->moveFile();
}

?><!DOCTYPE HTML>
<html lang="en">
    <head>
      <meta charset="UTF-8"/>
      <title>Example Upload</title>
    </head>
<body>


    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="submit" name="submit" value="ok"/>
    </form>



</body>
</html>
