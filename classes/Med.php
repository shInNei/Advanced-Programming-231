<?php
class Med{
    private $name;
    private $manufacturer;
    private $price;
    private $type;
    private $usage;
    private $quantity;
    private $expireDate;
    private $manuDate;
    public function __construct($name, $manufacturer, $price, $type,$usage,$quantity, $expireDate, $manuDate){
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->type = $type;
        $this->usage = $usage;
        $this->quantity = $quantity;
        $this->expireDate = date_create_from_format("Y-m-d",$expireDate);
        $this->manuDate = date_create_from_format("Y-m-d",$manuDate);
        
    }

    public function getName(){
        return $this->name;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function attributeMapToDb(){
        return array(
            'medName' => $this->name,
            'manufacturer' => $this->manufacturer,
            'price' => $this->price,
            'medType' => $this->type,
            'medUsage' => $this->usage,
            'expirationDate' => date_format($this->expireDate,'Y-m-d'),
            'manufactureDate' => date_format($this->manuDate,'Y-m-d'),
        );
    }

}
?>
