<?php

  class Link extends DataObject { 
  
  public static $db = array(
  	'LinkTitle'=>'Varchar(100)',	
	'LinkURL'=>'Varchar(500)',
	'Sort'=>'Int'
  );
 
 
  public static $has_one = array(
    'Page' => 'Page'
  );  

  // Summary fields 
   public static $summary_fields = array( 
      'LinkTitle' => 'LinkTitle', 
      'LinkURL' => 'LinkURL'
   );

   public function getCMSFields(){
        $fields = parent::getCMSFields();
        
        //remove unused fields
        $fields->removeByName('Sort');
        $fields->removeByName('PageID');
        
        return $fields;
      }
 
}