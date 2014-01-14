<?php

class ContentSectionList extends DataExtension {
	public static $has_many = array('ContentSections' => 'ContentSection');

	public function updateCMSFields(FieldList $fields) {
		$config = GridFieldConfig::create();
		$config->addComponent(new GridFieldToolbarHeader());
		$config->addComponent(new GridFieldAddNewButton('toolbar-header-right'));
		$config->addComponent(new GridFieldDataColumns());
		$config->addComponent(new GridFieldEditButton());
		$config->addComponent(new GridFieldDeleteAction());
		$config->addComponent(new GridFieldDetailForm());
		$config->addComponent(new GridFieldSortableHeader());
		$config->addComponent(new GridFieldSortableRows('Sort'));


		$gridField = new GridField('Sections', 'Content Sections', $this->owner->ContentSections(), $config);
		$fields->addFieldToTab('Root', new Tab('ContentSectionList', 'Content Sections'));
		$fields->addFieldToTab('Root.ContentSectionList', $gridField);
		return $fields;
	}
}

class ContentSectionList_Controller extends SiteTreeExtension { 

	
}