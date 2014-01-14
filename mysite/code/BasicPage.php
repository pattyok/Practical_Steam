<?php

class BasicPage extends Page {
	private static $db = array(
		"LeftColumn" => "HTMLText",
		"RightColumn" => "HTMLText"
	);

    private static $many_many = array(
        'GalleryImages' => 'Image'
    );

    public function getCMSFields(){
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Main', new CheckboxField('IncludeRequestQuoteForm'), 'Content');
		
		//Two column layout section
		$columns = array(new HTMLEditorField("LeftColumn", "Left", 5), new HTMLEditorField("RightColumn", "Right", 5));
		$toggleFieldColumns = ToggleCompositeField::create(
			'ColumnsToggle', $this->fieldLabel('Two Column Text Section'), $columns
		);
		$fields->addFieldToTab('Root.Main', $toggleFieldColumns, 'Metadata');

		//Main images on pages - is configured in the layouts to display as tabs if multiple images are added
		$uploadField = new UploadField(
                $name = 'GalleryImages',
                $title = 'Upload one or more images (max 10 in total)'
            );
		$toggleFieldImages = ToggleCompositeField::create(
			'ImagesToggle', $this->fieldLabel('Images'), $uploadField
		);
		$uploadField->setAllowedMaxFileNumber(10)->setRightTitle('Multiple images will be displayed as tabs. To edit the tab title, click on "Edit" for each image');
		$fields->addFieldToTab('Root.Main', $toggleFieldImages, 'ColumnsToggle');
		
		//Re-Label main Content field
		$fields->removeByName('Content');       
		$fields->addFieldToTab("Root.Main", new HTMLEditorField("Content", "Intro Text", 10), 'ImagesToggle');
	
		return $fields;
		}
}

class BasicPage_Controller extends Page_Controller {
    
}

class GalleryImageExtension extends DataExtension {
    private static $belongs_many_many = array('GalleryImages' => 'Page');
}
 
Image::add_extension('GalleryImageExtension');