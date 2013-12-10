<?php
class ContactFormSubmission extends DataObject {
   static $db = array(
      'FirstName' => 'Varchar',
      'LastName' => 'Varchar',
      'Company' => 'Varchar',
      'Email' => 'Varchar',
      'Phone' => 'Varchar',
      'Contacted' => 'Boolean'
   );
   //fields that show up in admin screen
   private static $summary_fields = array(
      'LastName',
      'Email',
      'Contacted'
   );
}