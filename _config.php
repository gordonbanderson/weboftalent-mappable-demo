<?php
if(!defined('DEMO_MODULE_PATH'))
{
	define('DEMO_MODULE_PATH', rtrim(basename(dirname(__FILE__))));
}


Object::add_extension('ContactPageAddress','MapExtension');
Object::add_extension('PageWithMap', 'MapExtension');
Object::add_extension('PageWithMapAndLayers', 'MapLayerExtension');
?>