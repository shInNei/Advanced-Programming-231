<?php
function createDataList($id, array $options){
   $html = array('<datalist id="'.$id.'">');

   foreach($options as $value){
        array_push($html,'<option value="'.$value.'"></option>');
   } 
   array_push($html,'</datalist>');
   return implode("\n", $html);
}