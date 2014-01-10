<?php
 
class MySiteConfig extends DataExtension {     
	
	 public static $db = array(
		'PhoneNumber' => 'Varchar',
		'ContactEmailAddress' => 'Varchar'	
	);
	
    public function updateCMSFields(FieldList $fields) {
    	$headerPhone = TextField::create("PhoneNumber", "Phone Number")->setMaxLength(12);
 		$headerEmail = EmailField::create("ContactEmailAddress", "Contact Email")->setMaxLength(100);


	   $fields->addFieldToTab("Root.Main", FieldGroup::create(
	   		$headerEmail,
	   		$headerPhone)
	   		->setTitle("Header Contact Info") 
		);
	   
   	}		
}