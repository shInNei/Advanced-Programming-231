<?php
                            require_once(__DIR__.'/assets/func/generateDataList.php');
                            require_once(__DIR__.'/classes/control/equipmentControl.php');
                            require_once(__DIR__.'/assets/func/extractArray.php');
                            
                            $mControl = new EquipmentControl();
                            $options = $mControl->equipmentSearchMax();

                            $optionNames = extractByKeyAndVal($options,'ID','equipName');
                            echo var_dump($optionNames)."<br>";
                            // $options = array('foo');
                            echo createDataListWithVal("equipData", $optionNames);                            
                            ?>