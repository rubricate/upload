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

class PathUpload implements IGetPathUpload
{

    private $path;
    
    public function __construct($path)
    {
        $this->path = $path;
    }



    public function getPath()
    {
       return  $this->path;
    } 




}




