<?php

// ${license.statement}

require_once 'pluginbuilder.php';
$PARAMS = array_merge($_GET, $_POST);
$cas = $pluginBuilder->newCas();

// Adding - if necessary - CORS headers
$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : "";
$res = new com_wiris_system_service_HttpResponse();
$pluginBuilder->addCorsHeaders($res, $origin);
$cleanCache = $pluginBuilder->newCleanCache();
$cleanCache->init($PARAMS);
echo $cleanCache->getCacheOutput();
