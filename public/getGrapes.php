<?php
  $grape_file = simplexml_load_file("selectFields.xml");
  $xmlText = $grape_file->asXML();
  print"<select name='wine_grape' id='wine_grape'>";
  print"<option>Select grape</option>";
  foreach ($grape_file->children() as $grape => $value){
    print"<option value = '$value'>$value</option>";
  }
  print "</select>";
?>
 