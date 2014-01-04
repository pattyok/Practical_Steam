<?php

class ApplicationsPage extends Page {
    public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', new CheckboxField('IncludeRequestQuoteForm'), 'Content');
		$fields->removeByName('Content');
		$fields->addFieldToTab("Root.Main", new HTMLEditorField("Content", "Intro Text"), 'Metadata');
		return $fields;
	}
}

class ApplicationsPage_Controller extends Page_Controller {
    
}