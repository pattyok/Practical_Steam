<?php

class Slide extends DataObject {
	public static $db = array(
		'Title' => 'Varchar(100)',
		"SortOrder" => "Int",
		"FontColor" => "Boolean",
		"Archived" => "Boolean"
	);
	public static $has_one = array(
		'Image' => 'Image',
		"Page" => "Page", 
		'LinkedPage' => 'SiteTree'
	);

	static $default_sort = 'SortOrder';
	
	static $field_labels = array(
		'Title' => 'Alternate text'	
	);
	
	static $summary_fields = array(
		'Thumbnail',
		'Title'
	);
	
	function getThumbnail() {
		if (((int) $this->ImageID > 0) && (is_a($this->Image(),'Image')))  {
	   return $this->Image()->SetWidth(50); 
		} else {
			return _t('Slide.NOTHUMBNAILSAVAILABLE',"No thumbnails available") ;
		}
	}
	
	function ArchivedReadable(){
		if($this->Archived == 1) return _t('GridField.Archived', 'Archived');
		return _t('GridField.Live', 'Live');
	}
	
	
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		
		//remove unused fields
		$fields->removeByName('Image'); //this is added manually later
		$fields->removeByName('PageID');
		$fields->removeByName('SortOrder');
		$fields->removeByName('Archived');
		$fields->removeByName('FontColor');
		$fields->removeByName('LinkedPageID');
		
		//replace existing fields with own versions
		$fields->replaceField('Title', new TextField('Title',_t('Slide.TITLE',"Title")));
		$fields->addFieldToTab('Root.Main', new CheckboxField('FontColor', 'Make Caption White'));
		$fields->addFieldToTab('Root.Main', new TreeDropdownField('LinkedPageID', 'Page to link to', 'SiteTree'));

		$fields->addFieldToTab('Root.Main', new CheckboxField('Archived', 'Archive this slide?'));
	
		$UploadField = new UploadField('Image', _t('Slide.MainImage',"Image"));
		$UploadField->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
		$UploadField->setConfig('allowedMaxFileNumber', 1);
		$UploadField->setFolderName("Slides");
		$fields->addFieldToTab('Root.Main', $UploadField, 'Archived');
		
		//allow extending this object with another 
		$this->extend('updateCMSFields', $fields);
		
		return $fields;
	}
}
