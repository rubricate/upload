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

class RequestFilesUpload implements IRequestFilesUpload
{

    private $files;
    
    public function __construct($key)
    {
        if(!array_key_exists($key, $_FILES))
        {
            throw new \Exception("Erro \$_FILES - key: {$key} not found. \n");
        }

        $this->files = $_FILES[$key];
    }



    public function getFiles()
    {
       return  $this->files;
    } 




}



