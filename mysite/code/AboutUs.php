<?php
class AboutUs extends BasicPage {
		public function getCMSFields(){
		$fields = parent::getCMSFields();
    
		$fields->removeByName("ContentSectionList");
		return $fields;
		}
		
}
class AboutUs_Controller extends BasicPage_Controller {
	
	public function init() {
		parent::init();
		Requirements::javascript("themes/practical-steam/javascript/thirdparty/jquery.imagemapster.js");
		Requirements::javascript("themes/practical-steam/javascript/imagemap.js");
		Requirements::css("themes/practical-steam/css/imagemap.css");
	}	
}