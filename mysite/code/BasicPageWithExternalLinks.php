<?php
class BasicPageWithExternalLinks extends BasicPage {

	private static $db = array(
		"LinksListTitle" => "Varchar(100)"
	);

	public static $has_many = array(
    	'Links' => 'Link',
    	
  	);

	

    public function getCMSFields(){
		$fields = parent::getCMSFields();
		// new gridfield to add links
		$config = GridFieldConfig::create();
		$config->addComponent(new GridFieldToolbarHeader());
		$config->addComponent(new GridFieldAddNewButton('toolbar-header-right'));
		$config->addComponent(new GridFieldDataColumns());
		$config->addComponent(new GridFieldEditButton());
		$config->addComponent(new GridFieldDeleteAction());
		$config->addComponent(new GridFieldDetailForm());
		$config->addComponent(new GridFieldSortableHeader());
		$config->addComponent(new GridFieldSortableRows('Sort'));
		$gridField = new GridField("Links", "Links", $this->Links(), $config);
		//title field for links
		$titleField = new TextField('LinksListTitle');

		//add links fields as a group
		$toggleFieldLinks = ToggleCompositeField::create(
			'LinksToggle', $this->fieldLabel('External Links'), array($titleField, $gridField)
		);
		$fields->addFieldToTab('Root.Main', $toggleFieldLinks, 'Metadata');
		//hide unused columns
		$fields->removeByName("ContentSectionList");
		$fields->removeByName("ColumnsToggle");

		return $fields;
	}
}

class BasicPageWithExternalLinks_Controller extends BasicPage_Controller {
	
		
}