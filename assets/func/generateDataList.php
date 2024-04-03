<?php

function createDataList($id, array $options){

   $html = array('<datalist id="'.$id.'">');

   foreach($options as $value){
      $html[] = '<option value="'.$value.'"></option>';

   } 
   $html[] ='</datalist>';

   return implode("\n", $html);
}