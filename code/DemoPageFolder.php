<?php
class DemoPageFolder extends Page {


  static $allowed_children = array( 'DemoPage', 'DemoPageFolder','ContactPage');

  static $has_one = array(
    'Photo' => 'Image'
  );

  static $db = array(
    'BriefDescription' => 'HTMLText'
  );


  function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab( "Root.MainImage", new UploadField( 'Photo' ) );
    $fields->addFieldToTab( "Root.Main", new HTMLEditorField( 'BriefDescription' ), 'Content' );
    return $fields;
  }
}

class DemoPageFolder_Controller extends Page_Controller {
  

}

?>