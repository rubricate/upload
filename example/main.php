<?php 

require '../vendor/autoload.php';

use Rubricate\Upload;

if( isset($_POST['submit']) )
{
    $httpUpload = new Upload\HttpUpload(
        new Upload\RequestFilesUpload('file'),
        new Upload\PathUpload(dirname(__FILE__) . '/upload/')
    );

    $upload = new Upload\FileUpload($httpUpload);
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
