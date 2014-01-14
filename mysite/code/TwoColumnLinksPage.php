<?php

class TwoColumnLinksPage extends BasicPage {
	private static $db = array(
		"LinksListTitle" => "Varchar(100)"
	);

	public static $has_many = array(
    	'Links' => 'Link',
    	
  	);

	private static $many_many = array(
        'GalleryImages' => 'Image'
    );

    public function getCMSFields(){
		$fields = parent::getCMSFields();
		$config = GridFieldConfig::create();
		$config->addComponent(new GridFieldToolbarHeader());
		$config->addComponent(new GridFieldAddNewButton('toolbar-header-right'));
		$config->addComponent(new GridFieldDataColumns());
		$config->addComponent(new GridFieldEditButton());
		$config->addComponent(new GridFieldDeleteAction());
		$config->addComponent(new GridFieldDetailForm());
		$config->addComponent(new GridFieldSortableHeader());
		$config->addComponent(new GridFieldSortableRows('Sort'));
		$gridfield = new GridField("Links", "Link", $this->Links(), $config);			
		$fields->addFieldToTab('Root.Main', $gridfield, 'Metadata');

		$fields->addFieldToTab('Root.Main', new CheckboxField('IncludeRequestQuoteForm'), 'Content');
		$fields->addFieldToTab('Root.Main', new TextField('LinksListTitle'), 'Links');
		$fields->removeByName('Content');
		$fields->addFieldToTab("Root.Main", new HTMLEditorField("Content", "Intro Text"), 'LinksListTitle');
		$fields->addFieldToTab('Root', new Tab('Images'));
		$fields->addFieldToTab(
            'Root.Images', 
            $uploadField = new UploadField(
                $name = 'GalleryImages',
                $title = 'Upload one or more images (max 10 in total)',
                $description = 'Multiple will be displayed as tabs. To edit the tab title, click on "Edit" for each image'
            )  
        );
        $uploadField->setAllowedMaxFileNumber(10);

		return $fields;
	}
}


class TwoColumnLinksPage_Controller extends BasicPage_Controller {
	

}

