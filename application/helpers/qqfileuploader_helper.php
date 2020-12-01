<?php

class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    public function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }

    /**
* Get the original filename
* @return string filename
*/
    public function getName() {
        return $_GET['qqfile'];
    }
    
    /**
* Get the file size
* @return integer file-size in byte
*/
    public function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];
        } else {
            throw new Exception('Getting content length is not supported.');
        }
    }

}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {
	  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    public function save($path) {
        return move_uploaded_file($_FILES['qqfile']['tmp_name'], $path);
    }
    
    /**
     * Get the original filename
     * @return string filename
     */
    public function getName() {
        return $_FILES['qqfile']['name'];
    }
    
    /**
     * Get the file size
     * @return integer file-size in byte
     */
    public function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

/**
 * Class that encapsulates the file-upload internals
 */
class qqFileUploader {
    private $allowedExtensions;
   // private $sizeLimit;
    private $file;
	private $uploadName;


    function __construct(){
    
    	
            $this->file = new qqUploadedFileXhr();
        
    }
    
    /**
     * Get the name of the uploaded file
     * @return string
     */
	public function getUploadName(){
		if( isset( $this->uploadName ) )
			return $this->uploadName;
	}
	
	/**
	 * Get the original filename
	 * @return string filename
	 */
	public function getName(){
		if ($this->file)
			return $this->file->getName();
	}
    
	/**
	 * Internal function that checks if server's may sizes match the
	 * object's maximum size for uploads
	 */
    private function checkServerSettings(){        
       // $postSize = $this->toBytes(ini_get('post_max_size'));
       // $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        //if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
          //  $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
           // die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
      //  }        
    }
    
    /**
     * Convert a given size with units to bytes
     * @param string $str
     */
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
	/**
	 * Handle the uploaded file
	 * @param string $uploadDirectory
	 * @param string $replaceOldFile=true
	 * @returns array('success'=>true) or array('error'=>'error message')
	 */
	 
  	 
    function handleUpload(){

        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
       // if ($size > $this->sizeLimit) {
           // return array('error' => 'File is too large');
      //  }
        //if(empty($filename)){
                $pathinfo = pathinfo($this->file->getName());
                $filename = $pathinfo['filename'];
       
	
        //}
        //$filename = md5(uniqid());
        $ext = @$pathinfo['extension'];		// hide notices if extension is empty
        
      
        
        $ext = ($ext == '') ? $ext : '.' . $ext;
        

        
		$this->uploadName = $filename;
		
       
     
	      
            return json_encode(array('success'=> $filename));
       
    }  
   
}
