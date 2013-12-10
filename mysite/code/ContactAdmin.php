<?php
class ContactAdmin extends ModelAdmin {
  private static $managed_models = array('ContactFormSubmission'); // Can manage multiple models
  private static $url_segment = 'contacts'; // Linked as /admin/products/
  private $menu_title = 'Contacts Admin';
}