<?php

class TwoColumnLinksPage extends Page {
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
		$fields->addFieldToTab('Root.Main', $gridfield, 'Content');

		$fields->addFieldToTab('Root.Main', new CheckboxField('IncludeRequestQuoteForm'), 'Content');
		$fields->addFieldToTab('Root.Main', new TextField('LinksListTitle'), 'Links');
		$fields->removeByName('Content');
		$fields->addFieldToTab("Root.Main", new HTMLEditorField("Content", "Intro Text"), 'LinksListTitle');
		$fields->addFieldToTab('Root', new Tab('Images'));
		$fields->addFieldToTab(
            'Root.Images', 
            $uploadField = new UploadField(
                $name = 'GalleryImages',
                $title = 'Upload one or more images (max 10 in total)'
            )  
        );
        $uploadField->setAllowedMaxFileNumber(10);

		return $fields;
	}
}

class TwoColumnLinksPage_Controller extends Page_Controller {
    
}

class GalleryImageExtension extends DataExtension {
    private static $belongs_many_many = array('GalleryImages' => 'Page');
}
 
Image::add_extension('GalleryImageExtension');