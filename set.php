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

if ($_GET['force']){
	$InstanceCache->clean();
}

$dataArray = array();
if ($InstanceCache->get('data')==''){
	
	$dataArray['start1'] = "Hello";
	$dataArray['start2'] = "World";
	$data = json_encode($dataArray);
	$InstanceCache->set('data', $data, 1800);// 30 minutes
}

echo $data;
?>