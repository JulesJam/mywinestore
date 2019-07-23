<?php
  class Wine_container
    {
      private $app
      private $dog_location;
      function __construct($value){
        if (function_exists('clean_input')){
          $this->app = $value;
        }
        else{
          exit;
        }
      }

      public function set_app($value){
        $this->app = $value;
      }

      public function get_wine_application(){
        $xmlDoc = new DOMDocument();
        if (file_exists("wine_applications.xml")){
          $xmlDoc->load('wine_applications.xml');
          $searchNode = $xmlDoc->getElementsByTagName("type");
          foreach ($searchNode as $searchNode ) {
            $valueID = $searchNode->getAttribute('ID');
            if($valueID == $this->app){
              $xmlLocation = $searchNode->getElementsByTagName("location");
              return $xmlLocation->item(0)->nodeValue;
              break
            }
          }
        }
        return FALSE
      }

      function create_object($properties_array){
        $wine_loc = $this->get_wine_application();
        if(($wine_loc == FALSE) || (!file_exists($wine_loc))){
          return FALSE;
        } 
        else {
          require_once($wine_loc);
          $class_array = get_declared_classes();
          $class_name = $class_array[$last_position];
          $wine_object = new $class_name($properties_array);

          return $wine_object;
        }
      }
    }
  ?>