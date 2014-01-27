<?php

class SalesRepList extends DataExtension {
	public static $has_many = array('SalesReps' => 'SalesRep');

	public function updateCMSFields(FieldList $fields) {
		$config = GridFieldConfig::create();
		$config->addComponent(new GridFieldToolbarHeader());
		$config->addComponent(new GridFieldAddNewButton('toolbar-header-right'));
		$config->addComponent(new GridFieldDataColumns());
		$config->addComponent(new GridFieldEditButton());
		$config->addComponent(new GridFieldDeleteAction());
		$config->addComponent(new GridFieldDetailForm());


		$gridField = new GridField('SalesReps', 'Sales Reps', $this->owner->SalesReps(), $config);
		$fields->addFieldToTab('Root', new Tab('SalesRepsList', 'Sales Reps'));
		$fields->addFieldToTab('Root.SalesRepsList', $gridField);
		return $fields;
	}
}

class SalesRepList_Controller extends SiteTreeExtension { 

	
}