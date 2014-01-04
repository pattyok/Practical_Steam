<?php
 
class HPSection extends DataObject {

    private static $db = array(
    	'Title'=>'Varchar(80)',
    	'Headline' => 'Varchar',	
  	   	'Details'=>'HTMLText',
       	'Sort'=>'Int',
       	'LinkTitle' =>'Varchar(80)',
       	'LinkUrl' => 'Varchar'
    );
    
    static $default_sort = "Sort";

    public static $has_one = array(
      'Image' => 'Image',
      'Page' => 'Page'
    );  
    
    // Summary fields show up in admin view
     public static $summary_fields = array( 
        'Image.StripThumbnail' => 'Thumbnail', 
        'Title' => 'HPSection'
     );

     public function getCMSFields(){
        $fields = parent::getCMSFields();
        
        //remove unused fields
        $fields->removeByName('Sort');
        $fields->removeByName('PageID');
        $fields->removeByName('Image');
        
        
        $UploadField = new UploadField('Image', _t('HPSection.Root',"Image"));
        $UploadField->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
        $UploadField->setConfig('allowedMaxFileNumber', 1);
        $UploadField->setFolderName("HomePage");
      
        $fields->push($UploadField);
        
        //allow extending this object with another 
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
      }
     
}