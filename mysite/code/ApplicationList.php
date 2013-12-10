<?php

class ApplicationList extends DataExtension {
	public static $has_many = array('Applications' => 'Application');

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


		$gridField = new GridField('Slides', _t('ApplicationList.ListItem', 'Applications'), $this->owner->Applications(), $config);
		$fields->addFieldToTab('Root', new Tab('ApplicationList', _t('ApplicationList.APPLICATIONTAB', 'ApplicationList')));
		$fields->addFieldToTab('Root.ApplicationList', $gridField);
		return $fields;
	}
}

class ApplicationList_Controller extends SiteTreeExtension { 

	
}