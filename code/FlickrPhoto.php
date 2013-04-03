<?php

class FlickrPhoto extends DataObject implements Mappable {


    static $searchable_fields = array(
        'Title',
        'Description',
        'FlickrID'
    );


    static $db = array(
        'Title' => 'Varchar(255)',
        'FlickrID' => 'Varchar',
        'Description' => 'HTMLText',
        'TakenAt' => 'Datetime',

        // use precision 15 and 10 decimal places for coordiantes
        'Lat' => 'Decimal(18,15)',
        'Lon' => 'Decimal(18,15)',
        'Accuracy' => 'Int',


        'Orientation' => 'Int',
        'ZoomLevel' => 'Int',
        'WoeID' => 'Int',
        'Accuracy' => 'Int',
        'FlickrPlaceID' => 'Varchar(255)',
        'Rotation' => 'Int',
        'IsPublic' => 'Boolean',
        'Aperture' => 'Float',
        'ShutterSpeed' => 'VarChar',
        'ImageUniqueID' => 'Varchar',
        'FocalLength35mm' => 'Int',
        'ISO' => 'Int',

        'SmallURL' => 'Varchar(255)',
        'SmallHeight' => 'Int',
        'SmallWidth' => 'Int',

        'MediumURL' => 'Varchar(255)',
        'MediumHeight' => 'Int',
        'MediumWidth' => 'Int',

        'SquareURL' => 'Varchar(255)',
        'SquareHeight' => 'Int',
        'SquareWidth' => 'Int',

        'LargeURL' => 'Varchar(255)',
        'LargeHeight' => 'Int',
        'LargeWidth' => 'Int',

        'ThumbnailURL' => 'Varchar(255)',
        'ThumbnailHeight' => 'Int',
        'ThumbnailWidth' => 'Int',

        'OriginalURL' => 'Varchar(255)',
        'OriginalHeight' => 'Int',
        'OriginalWidth' => 'Int',
        'TimeShiftHours' => 'Int',
        'PromoteToHomePage' => 'Boolean'
        //TODO - place id
    );




    public static $summary_fields = array(
        'Thumbnail' => 'Thumbnail',
        'Title' => 'Title',
        'TakenAt' => 'TakenAt'
    );


    // imoprt som
    public function requireDefaultRecords() {
        parent::requireDefaultRecords();
        DB::alteration_message( "Checking for default flickr photo records for testing", "changed" );


        if ( DB::getConn()->hasTable( 'FlickrPhoto' ) ) {
            DB::alteration_message('T1');
           $nrecords = DataList::create('FlickrPhoto')->count();
           if ($nrecords == 0) {
                DB::alteration_message('T2');
                $jsonFile = BASE_PATH . '/' . DEMO_MODULE_PATH."/data/images.json";
                DB::alteration_message("IMAGE PATH:".$jsonFile);
                $json_array = file($jsonFile);
                DB::alteration_message("CLASS OF JSON:".$json_array);
                $json = implode("\n", $json_array);
                $ct = 0;
                foreach (json_decode($json) as $imagejson) {
                    $ct++;
                    DB::alteration_message($ct.' Imported image:'.$imagejson->Title);
                    $fp = new FlickrPhoto();
                        $fp->Lat = $imagejson->Lat;
                        $fp->Lon = $imagejson->Lon;
                        $fp->ThumbnalURL = $imagejson->ThumbnalURL;
                        $fp->MediumURL = $imagejson->MediumURL;
                        $fp->SmallURL = $imagejson->SmallURL;
                        $fp->LargeURL = $LargeURL->Lat;
                        $fp->Title = $imagejson->Title;
                        $fp->Description = $imagejson->Description;
                        $fp->write();    
                }
           }
        }
    }






    /*
  Use the scaffolding fields
  */
    function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->push( new TabSet( "Root", $mainTab = new Tab( "Main" ) ) );
        $mainTab->setTitle( _t( 'SiteTree.TABMAIN', "Main" ) );

        return $fields;
    }


    // mappable methods
  public function getMappableLatitude() {
    return $this->Lat;
  }

  public function getMappableLongitude() {
    return $this->Lon;
  }

  public function getMappableMapContent() {
    return MapUtil::sanitize($this->renderWith('FlickrPhotoMapInfoWindow'));
  }

  public function getMappableMapCategory() {
    return 'photo';
  }

  public function getMappableMapPin() {
    return false; //standard pin
  }







}

?>