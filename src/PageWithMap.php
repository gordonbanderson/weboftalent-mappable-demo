<?php
namespace WebOfTalent\MappableDemo;

use SilverStripe\ORM\FieldType\DBBoolean;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\DataList;

class PageWithMap extends DemoPage
{
    private static $table_name = 'PageWithMap';

    private static $db = array(
    'ShowExampleLines' => DBBoolean::class,
    'ShowExampleDataset' => DBBoolean::class,
    'ClusterExampleDataset' => DBBoolean::class
    );

    function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Example', new CheckboxField('ShowExampleLines', 'Render this map with example lines?'));
        $fields->addFieldToTab('Root.Example', new CheckboxField('ShowExampleDataset', 'Render this map with an example dataset?'));
        $fields->addFieldToTab('Root.Example', new CheckboxField('ClusterExampleDataset', 'Cluster points for example dataset?'));


        return $fields;
    }


  /*
  Render a triangle around the provided lat,lon, zoom from the editing functions,
  */
    public function MapWithLines()
    {
        $map = $this->owner->getRenderableMap();
        $map->setZoom($this->ZoomLevel);
        $map->setAdditionalCSSClasses('fullWidthMap');
        $map->setShowInlineMapDivStyle(true);

        $scale = 0.3;

      // draw a triangle
        $point1 = array(
        $this->Lat - 0.5*$scale, $this->Lon
        );
        $point2 = array(
        $this->Lat + 0.5*$scale, $this->Lon-0.7*$scale
        );

        $point3 = array(
        $this->Lat + 0.5*$scale, $this->Lon+0.7*$scale
        );

        $map->addLine($point1, $point2);
        $map->addLine($point2, $point3, '#000077');
        $map->addLine($point3, $point1, '#007700');

        return $map;
    }


    public function MapWithDataSet()
    {

        $flickrPhotos = DataList::create('FlickrPhoto')->where('Lat != 0 AND Lon !=0');
        if ($flickrPhotos->count() == 0) {
            return ''; // don't render a map
        }

        $map = $flickrPhotos->getRenderableMap();
        $map->setZoom($this->ZoomLevel);
        $map->setAdditionalCSSClasses('fullWidthMap');
        $map->setShowInlineMapDivStyle(true);
        if ($this->ClusterExampleDataset) {
            $map->setClusterer(true);
        }

        return $map;
    }
}
