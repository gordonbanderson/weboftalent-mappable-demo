<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

/**
* Defines the StaffPage page type
*/
class DemoPage extends Page
{

    static $db = array(
    'BriefDescription' => 'HTMLText'
    );



    static $has_one = array(
    'Photo' => Image::class
    );

  // allow restful access for migration purposes
    static $api_access = true;
    
  
    function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.MainImage", new UploadField('Photo'));

        $fields->addFieldToTab("Root.Main", new HTMLEditorField('BriefDescription'), 'Content');
        return $fields;
    }
}

class DemoPage_Controller extends PageController
{
  
}
