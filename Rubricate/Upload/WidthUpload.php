<?php


/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/upload 
 * @copyright   2017
 * 
 */


namespace Rubricate\Upload;

class WidthUpload implements IGetSizeUpload
{
    private $size;


    public function __construct($size)
    {
        self::setSize($size);
    }


    public function setSize($size)
    {
        if ((int) $size < 1) {
            throw new \Exception('invalid widht');
        }

        $this->size = (int) $size;

        return $this;
    }


    public function getSize()
    {
        return $this->size;
    }
}
