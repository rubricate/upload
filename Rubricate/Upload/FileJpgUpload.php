<?php


/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/upload 
 * @copyright   2013 - 2017
 * 
 */


namespace Rubricate\Upload;


class FileJpgUpload implements IMoveFileUpload
{
    private $http;
    private $width = 1024;


    public function __construct(IHttpUpload $http)
    {
        $this->http  = $http;
        $this->width = new WidthUpload($this->width);
    }


    public function setWidth($width)
    {
        $this->width->setSize($width);
        return $this;
    } 


    public function moveFile() 
    {
        $i = imagecreatefromjpeg($this->http->getFile('tmp_name'));
        $p = $this->http->getPath() . $this->http->getFile('name');
        $w = $this->width->getSize();

        $x = imagesx($i);
        $y = imagesy($i);

        $ix = ($w < $x)? $w: $x;
        $iy = ($ix * $y)/ $x;
        $n  = imagecreatetruecolor($ix, $iy);

        imagesavealpha($n, TRUE);
        imagecopyresampled($n, $i, 0, 0 , 0, 0, $ix, $iy, $x, $y);
        imagejpeg($n, $p);

        return $this;
    }
}

