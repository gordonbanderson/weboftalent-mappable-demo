<?php
namespace WebOfTalent\MappableDemo;

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class DemoPageFolder extends \Page
{
    private static $table_name = 'DemoPageFolder';


    private static $allowed_children = array( 'DemoPage', 'DemoPageFolder','ContactPage');

    private static $has_one = array(
    'Photo' => Image::class
    );

    private static $db = array(
    'BriefDescription' => 'HTMLText'
    );


    function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.MainImage", new UploadField('Photo'));
        $fields->addFieldToTab("Root.Main", new HTMLEditorField('BriefDescription'), 'Content');
        return $fields;
    }
}
