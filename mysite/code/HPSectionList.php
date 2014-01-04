<?php

class HPSectionList extends DataExtension {
	public static $has_many = array('HPSections' => 'HPSection');

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


		$gridField = new GridField('ContentSections', _t('HPSectionList.ListItem', 'Content Sections'), $this->owner->HPSections(), $config);	
		$fields->addFieldToTab('Root.Main', $gridField, "Metadata");
		$fields->removeFieldFromTab("Root.Main","Content");
		



		return $fields;
	}
}

class HPSectionList_Controller extends SiteTreeExtension { 

	
}