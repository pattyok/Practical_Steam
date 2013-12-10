<?php
class Application extends DataObject { 
  
    public static $db = array(
    	 'Title'=>'Varchar',
    	 'Headline' => 'Varchar',	
  	   'Details'=>'HTMLText',
       'Sort'=>'Int'
    );
   
    static $default_sort = "Sort";

    public static $has_one = array(
      'Image' => 'Image',
      'Page' => 'Page'
    );  
    
    // Summary fields show up in admin view
     public static $summary_fields = array( 
        'Image.StripThumbnail' => 'Thumbnail', 
        'Title' => 'Application'
     );

     public function getCMSFields(){
        $fields = parent::getCMSFields();
        
        //remove unused fields
        $fields->removeByName('Sort');
        $fields->removeByName('PageID');
        $fields->removeByName('Image');
        
        
        $UploadField = new UploadField('Image', _t('Application.MainImage',"Image"));
        $UploadField->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
        $UploadField->setConfig('allowedMaxFileNumber', 1);
        $UploadField->setFolderName("Applications");
      
        $fields->push($UploadField);
        
        //allow extending this object with another 
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
      }
}