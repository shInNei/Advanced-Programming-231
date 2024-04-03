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