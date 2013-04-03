<?php
class ContactPage extends DemoPage {

  static $has_many = array(
    'Locations' => 'ContactPageAddress'
  );

  function getCMSFields() {
    $fields = parent::getCMSFields();

    $gridConfig = GridFieldConfig_RelationEditor::create();
    $gridConfig->getComponentByType( 'GridFieldAddExistingAutocompleter' )->setSearchFields( array( 'PostalAddress' ) );
    $gridConfig->getComponentByType( 'GridFieldPaginator' )->setItemsPerPage( 100 );
    $gridField = new GridField( "Locations", "List of Addresses:", $this->Locations(), $gridConfig );
    $fields->addFieldToTab( "Root.Addresses", $gridField );

    return $fields;
  }
}

class ContactPage_Controller extends Page_Controller {


}

?>