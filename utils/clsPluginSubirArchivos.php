<?php 

class qqUploadedFileXhr {
    protected $_tempFile; 
    //private $path = '../Controller/uploads/';

    public function __construct() {
        $input = fopen("php://input", "r");
        $this->_tempFile = tempnam(sys_get_temp_dir(), 'xhr_upload_');
        file_put_contents($this->_tempFile, $input);
        fclose($input);
    }

    public function checkImageType() {
        switch(exif_imagetype( $this->_tempFile )) {
            case IMAGETYPE_GIF:
            case IMAGETYPE_JPEG:
            case IMAGETYPE_PNG:
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        if (filesize($this->_tempFile) != $this->getSize()){           
            return false;
        }
        copy($this->_tempFile, $path);
        return true;
    	
    	
    	/*if(file_exists($this->_tempFile)){
    		echo 'si existe';
    		
    	}else{
    		echo 'no existe';
    		
    	}*/
    }
    
    
    
    
    
    function getName() {
       	return $_REQUEST['qqfile'];
       
    	//return $_FILES['qqfile'];
    }
    
    
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];           
        } else {
            throw new Exception('Getting content length is not supported.');
        }     
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}


?>