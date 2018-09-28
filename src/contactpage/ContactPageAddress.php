<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
class ContactPageAddress extends DataObject {
	static $db = array(
		'PostalAddress' => 'Text'
	);

	static $has_one = array( 'ContactPage' => 'ContactPage' );


	public static $summary_fields = array(
		'PostalAddress' => 'PostalAddress'
	);


	function getCMSFields() {
		$fields = new FieldList();
		$fields->push( new TabSet( "Root", $mainTab = new Tab( "Main" ) ) );
		$mainTab->setTitle( _t( 'SiteTree.TABMAIN', "Main" ) );
		$fields->addFieldToTab( "Root.Main", new TextField( 'PostalAddress' ) );

		$this->extend( 'updateCMSFields', $fields );

		return $fields;
	}
}
?>