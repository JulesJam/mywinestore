<?php
  class Wine{
    private $wine_style = "No style";
    private $wine_name = "No name";
    private $wine_grape = "No grape";
    private $wine_producer = "No producer";
    private $wine_year = 0;
    private $wine_region = "No region";
    private $wine_stock = 0;
    private $error_message = "??";



    function __construct($properties_array){
      print "Mmmm..something going on";
      if(method_exists('wine_container', 'create_object')){

      $style_error = $this->set_wine_style($properties_array[0]) == TRUE? 'TRUE,' : 'FALSE,';
      $name_error = $this->set_wine_name($properties_array[1]) == TRUE? 'TRUE,' : 'FALSE,';
      $grape_error = $this->set_wine_grape($properties_array[2]) == TRUE? 'TRUE,' : 'FALSE,';
      $producer_error = $this->set_wine_producer($properties_array[3]) == TRUE? 'TRUE,' : 'FALSE,';
      $year_error = $this->set_wine_year($properties_array[4]) == TRUE? 'TRUE,' : 'FALSE,';
      $region_error = $this->set_wine_region($properties_array[5]) == TRUE? 'TRUE,' : 'FALSE,';
      $stock_error = $this->set_wine_stock($properties_array[6]) == TRUE? 'TRUE,' : 'FALSE,';

      $this->error_message = $style_error.$name_error.$grape_error.$producer_error.$year_error.$region_error.$stock_error;
      
      }else{
        print "error #6";
        exit;
      }
    }

    public function __toString()
    {
      return $this->error_message;
    }

    function set_wine_style($value){
      $error_message = TRUE;
      (ctype_alpha($value) && strlen($value) >= 3 && strlen($value) < 15)? $this->wine_style =$value :  $error_message =FALSE;
      return $error_message;
    }
    function set_wine_name($value){
      $error_message = TRUE;
      (ctype_alnum(str_replace(array(' ','.',',','-'),'',$value)) && strlen($value) > 3 && strlen($value) < 100)? $this->wine_name =$value :  $error_message =FALSE;

      return $error_message;
    }
    function set_wine_grape($value){
      $error_message = TRUE;
      (ctype_alpha(str_replace(array(' ','.',',','-'),'',$value)) &&($this->validator_grape($value) === TRUE) && strlen($value) >= 0 && strlen($value) < 50)? $this->wine_grape =$value :  $error_message =FALSE;

      return $error_message;
    }
    function set_wine_producer($value){
      $error_message = TRUE;
      (ctype_alpha(str_replace(array(' ','.',',','-'),'',$value)) && strlen($value) >= 0 && strlen($value) < 100)? $this->wine_producer =$value :  $error_message =FALSE;

      return $error_message;
    }
    function set_wine_year($value){
      $error_message = TRUE;
      (ctype_digit(strval($value)) && ($value > 1900 && $value <= date("Y")))? $this->wine_year =$value :  $error_message =FALSE;

      return $error_message;
    }
    function set_wine_region($value){
      $error_message = TRUE;
      (ctype_alpha($value) && strlen($value) > 3 && strlen($value) < 10)? $this->wine_region =$value :  $error_message =FALSE;

      return $error_message;
    }
    function set_wine_stock($value){
      $error_message = TRUE;
      (ctype_digit(strval($value)) && ($value >=0 && $value <= 99999))? $this->wine_stock =$value :  $error_message =FALSE;

      return $error_message;
    }

    function get_wine(){
      return "$this->wine_name, $this->wine_style, $this->wine_region, $this->wine_grape, $this->wine_year, $this->wine_producer, $this->wine_stock";
    }

    function get_wine_style(){
      return $this->wine_style;
    }
    function get_wine_name(){
      return $this->wine_name;
    }
    function get_wine_region(){
      return $this->wine_region;
    }
    function get_wine_grape(){
      return $this->wine_grape;
    }
    function get_wine_year(){
      return $this->wine_year;
    }
    function get_wine_producer(){
      return $this->wine_producer;
    }
    function get_wine_stock(){
      return $this->wine_stock;
    }

    private function validator_grape($value){
      $grape_file = simplexml_load_file("grapes.xml");
      $xmlText = $grape_file->asXML();

      if(stristr($xmlText, $value) === FALSE){
        return FALSE;
      } else {
        return TRUE;
      }
    }
    
    
  }