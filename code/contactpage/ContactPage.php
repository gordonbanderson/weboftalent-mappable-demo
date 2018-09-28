<?php

use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldPaginator;
use SilverStripe\Forms\GridField\GridField;
use PageController;
class ContactPage extends DemoPage {

  static $has_many = array(
    'Locations' => 'ContactPageAddress'
  );

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $gridConfig = GridFieldConfig_RelationEditor::create();
    $gridConfig->getComponentByType( GridFieldAddExistingAutocompleter::class )->setSearchFields( array( 'PostalAddress' ) );
    $gridConfig->getComponentByType( GridFieldPaginator::class )->setItemsPerPage( 100 );
    $gridField = new GridField( "Locations", "List of Addresses:", $this->Locations(), $gridConfig );
    $fields->addFieldToTab( "Root.Addresses", $gridField );

    return $fields;
  }
}

class ContactPage_Controller extends PageController {


}

?>