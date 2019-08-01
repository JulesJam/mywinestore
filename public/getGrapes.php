<?php
  class GetGrapes {
    function __construct($properties_array){
      //get grapes constructor
      if(!(method_exists('wine_container', 'create_object'))){
         exit;}
    }

    private $result = "??";

    public function get_select($wine_app){
      if(($wine_app != FALSE) && (file_exists($wine_app))){
        $grape_file = simplexml_load_file("grapes.xml");
        $xmlText = $grape_file->asXML();
        $this->result = "<select name='wine_grape' id='wine_grape'>";
        $this->result = $this->result ."<option>Select grape</option>";
        foreach ($grape_file->children() as $grape => $value){
          $this->result = $this->result . "<option value = '$value'>$value</option>";
        }
        $this->result = $this->result . "</select>";
        return $this->result;
      } else {
        return FALSE;
      }

    }
  }
  
?>
 