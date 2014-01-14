<?php
class BasicPageWithInternalLinks extends BasicPage {

		public function getCMSFields(){
		$fields = parent::getCMSFields();
    
		$fields->addFieldToTab("Root.ContentSectionList", new LiteralField("Instructions", "Using this template, a link will be created to each section."), "Sections");
	
		return $fields;
		}
}
class BasicPageWithInternalLinks_Controller extends BasicPage_Controller {
	
		
}