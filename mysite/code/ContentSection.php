<?php
class ContentSection extends DataObject { 
  
    public static $db = array(
    	 'Title'=>'Varchar',
    	 'Headline' => 'Varchar',	
  	   'BackgroundColor'=>"Enum('Default, Green, Orange, Blue')",
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

        //allow extending this object with another 
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
      }
}