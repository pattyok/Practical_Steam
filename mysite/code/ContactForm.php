<?php
class ContactForm extends Form {
 
    public function __construct($controller, $name) {
        $fields = new FieldList(
            TextField::create("FirstName")->setTitle('First Name'),
            TextField::create("LastName")->setTitle('Last Name'),          
            TextField::create("Company")->setTitle('Company'),
            EmailField::create("Email")->setTitle("Email address")->setAttribute('type', 'email'),
            TextField::create("Phone")->setTitle('Phone')->setAttribute('type', 'phone')
        );
        $validator = new RequiredFields('Email', 'LastName', 'FirstName', 'Company', 'Phone');
        $actions = new FieldList(FormAction::create("doContactForm")->setTitle("Submit"));
         
        parent::__construct($controller, $name, $fields, $actions, $validator);


    }
     
    public function doContactForm($data, $form) {
        $email = new Email();
          
        $email->setTo('patty.ohara@gmail.com');
        $email->setFrom($data['Email']);
        $email->setSubject("Contact Message from {$data["LastName"]}");
          
        $messageBody = "
            <p><strong>Name:</strong> {$data['LastName']}</p>
        ";
        $email->setBody($messageBody);
        $email->send();
        $submission = new ContactFormSubmission();
        $form->saveInto($submission);
        $submission->write();
        return array(
            'ContactForm' => '<p>Thank you, we will be in touch with you shortly.</p>'
        );
    }

    

    
}




