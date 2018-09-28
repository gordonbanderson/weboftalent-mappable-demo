<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use PageController;
class DemoPageFolder extends Page {


  static $allowed_children = array( 'DemoPage', 'DemoPageFolder','ContactPage');

  static $has_one = array(
    'Photo' => Image::class
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

class DemoPageFolder_Controller extends PageController {
  

}

?>