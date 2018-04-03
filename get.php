<?php
require_once("src/autoload.php");

use phpFastCache\CacheManager;
CacheManager::setup(array(
    "path" => sys_get_temp_dir(), // or in windows "C:/tmp/"
));
// Accepted value: "normal" < "memory" < "phpfastcache"
CacheManager::CachingMethod("phpfastcache");

// In your class, function, you can call the Cache
$InstanceCache = CacheManager::Files();

if ($InstanceCache->get('data')!=''){
	$data = $InstanceCache->get('data');
}

echo $data;

?>