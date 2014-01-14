<?php
class BasicPageWithSlides extends BasicPage {

		public function getCMSFields(){
		$fields = parent::getCMSFields();
    
		$fields->addFieldToTab("Root.ContentSectionList", new LiteralField("Instructions", "Using this template, each section will be displayed as a slide"), "Sections");
	
		return $fields;
		}
}
class BasicPageWithSlides_Controller extends BasicPage_Controller {
	
	public function init() {
		parent::init();
		Requirements::javascript("Slideshow/thirdparty/jquery.slides.js");
		Requirements::javascript("themes/practical-steam/javascript/customslides.js");
		Requirements::css("Slideshow/css/SlideshowJS.css");
	}	
}