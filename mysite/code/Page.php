<?php
class Page extends SiteTree {

	private static $db = array(
		"IncludeRequestQuoteForm" => "Boolean"
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
		'ContactForm'
	);

	public function init() {
		parent::init();

		Requirements:: css("framework/thirdparty/jquery-ui-themes/smoothness/jquery-ui.css");
		Requirements::themedCSS('reset');
		Requirements::themedCSS('layout'); 
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form'); 
		Requirements::themedCSS('cmsadmin'); 

		Requirements::javascript('framework/thirdparty/jquery/jquery.js');
		Requirements:: javascript("framework/thirdparty/jquery-ui/jquery-ui.js");
		Requirements:: javascript("themes/practical-steam/javascript/script.js");
	}
	// Template method
    public function ContactForm() {
        return new ContactForm($this, 'ContactForm');
    }

    public function EditURL(){
      return "/admin/pages/edit/show/".$this->ID."/"; 
    } 

    function ShowRequestForm(){
    $get = DataObject::get_one('SiteTree', "UrlSegment = 'request-a-quote'");
    return new UserDefinedForm_Controller($get); 
	}


}
