<?php
namespace WebOfTalent\MappableDemo;

use SilverStripe\Admin\ModelAdmin;

class FlickrPhotoAdmin extends ModelAdmin
{

    private static $managed_models = array(   //since 2.3.2
      FlickrPhoto::class
    );

    private static $url_segment = 'flickr_photos';
    private  static $menu_title = 'Flickr Photos';
}
