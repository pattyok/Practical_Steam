<?php
class HomePage extends BasicPage {
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		//hide unused columns
		$fields->removeByName("ColumnsToggle");
		$fields->removeByName("IncludeRequestQuoteForm");
		return $fields;
	}
}
class HomePage_Controller extends BasicPage_Controller {
}

