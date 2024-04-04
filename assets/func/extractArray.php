<?php
function extractItemsByKey($assocArray, $key) {
    $extractedItems = array();

    foreach ($assocArray as $item) {
        if (isset($item[$key])) {
            $extractedItems[] = $item[$key];
        }
    }

    return $extractedItems;
}
function extractByKeyAndVal($array, $key, $val){
    $extractedItems = array();
    foreach($array as $item){
        
        if(isset($item[$key]) && isset($item[$val])){
            $extractedItems[$item[$key]] = $item[$val];
        }
    }
    return $extractedItems;
}