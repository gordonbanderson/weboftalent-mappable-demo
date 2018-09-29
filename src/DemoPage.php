<?php
namespace WebOfTalent\MappableDemo;

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

/**
* Defines the DemoPage page type
*/
class DemoPage extends \Page
{
    private static $table_name = 'DemoPage';

    private static $db = array(
        'BriefDescription' => 'HTMLText'
    );

    private static $has_one = array(
        'Photo' => Image::class
    );

    // allow restful access for migration purposes
    private static $api_access = true;

  
    function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.MainImage", new UploadField('Photo'));

        $fields->addFieldToTab("Root.Main", new HTMLEditorField('BriefDescription'), 'Content');
        return $fields;
    }
}
