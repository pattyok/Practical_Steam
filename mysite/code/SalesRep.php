<?php
class SalesRep extends DataObject { 
  
    public static $db = array(
    	 'FirstName'=>'Varchar',
       'LastName'=>'Varchar',
    	 'JobTitle' => 'Varchar(100)',
       'Email'=>'Varchar',
       'OfficePhone'=>'Varchar',
       'CellPhone'=>'Varchar',
       'Area'=>'Varchar' 	   
    );

    public static $has_one = array(
      'Page' => 'Page'
    ); 
   
    static $default_sort = "LastName";
 
    
    // Summary fields show up in admin view
     public static $summary_fields = array( 
        'LastName' => 'Last Name',
        'JobTitle' => 'Job Title', 
        'Area' => 'Serves Area'
     );

     public function getCMSFields(){
        $fields = parent::getCMSFields();
        
        //set up Area as a composite field
        $fields->removeByName('Area');
        $fields->removeByName('PageID');

        //add links fields as a group
        $composite = new CompositeField(
            new TextField("Area", "States"),
            new LiteralField("instructions", "Enter states as abbreviations, separated by commas")
          );
        $fields->addFieldToTab('Root.Main', $composite);

        //allow extending this object with another 
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
      }
}