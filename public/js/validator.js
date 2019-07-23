console.log("JS works - validating");

function allAlphabetic(stringToValidate){
  var letters = /^[a-zA-Z,0-9 ,\-]+$/;
  if(stringToValidate.match(letters)){
    return true;
  } else{
    return false;
  }
}

function validate_string(stringToValidate, minLength, maxLength){
  console.log(`string being checked is ${stringToValidate}`);
  if ((stringToValidate.length >= minLength) && (allAlphabetic(stringToValidate)) && (stringToValidate.length <= maxLength )){
    return true;
  } else {
    return false;
  }
}

function validate_number(numberToValidate, minValue, maxValue){
  console.log(`number being checked is ${numberToValidate}`);
  if ((numberToValidate >= minValue && numberToValidate <= maxValue) && (!isNaN(numberToValidate))){
    return true;
  } else {
    return false;
  }
}

function remove_error(currentID){
  document.getElementById(currentID).classList.remove("invalid");
  document.getElementById(`${currentID}_error`).innerHTML = "";
}

function validate_input(wine){

  let error_message = "";
  let currentID ="";

  currentID = 'wine_style';
  if(!validate_string(wine.wine_style.value, 3, 15)){
    error_message += "Invalid Wine Style - please check...";
    console.log(`Error is ${error_message}`);
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = " You must delect an option"

  } else {
    remove_error(currentID);
  };


  currentID = 'wine_name';

  if(!validate_string(wine.wine_name.value, 2, 100)){ 
    console.log(`Name test is ${wine.wine_name.value}`)
    error_message += "Invalid Wine Name - please check...";
    console.log(`Error is ${error_message}`);
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = " Must be 2 to 100 letters or -"

  } else {
    remove_error(currentID);
  };

  currentID = 'wine_grape';

  if(wine.wine_grape.value == "Select grape"){
    error_message += "Grape Not Selected";
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = " Please select a grape from the list..."
    console.log(document.getElementById(`${currentID}_error`));
  };

  
  currentID = 'wine_producer';

  if(!validate_string(wine.wine_producer.value, 2, 100)){ 
    console.log(`Name test is ${wine.wine_producer.value}`)
    error_message += "Invalid Grape - please check...";
    console.log(`Error is ${error_message}`);
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = " Must be 2 to 100 letters"

  } else {
    remove_error(currentID);
  };

  

  currentID = 'wine_year';
  let today = new Date();
  let thisYear = today.getFullYear();
  let wineYear = parseInt(wine.wine_year.value);

  if(!validate_number(wineYear, 1900, thisYear)){ 
    console.log(`Number test is ${wineYear}`)
    error_message += "Invalid Year - please check...";
    console.log(`Error is ${error_message}`);
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = ` Must be betwee 1900 and ${thisYear}`
  } else {
    remove_error(currentID);
  };

  currentID = 'wine_region';

  if(!validate_string(wine.wine_region.value, 2, 100)){ 
    console.log(`Name test is ${wine.wine_region.value}`)
    error_message += "Invalid Grape - please check...";
    console.log(`Error is ${error_message}`);
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = " Must be 2 to 100 letters"

  } else {
    remove_error(currentID);
  };

  currentID = 'wine_stock';
 
  let wineStock = parseInt(wine.wine_stock.value);

  if(!validate_number(wineStock, 0, 9999)){ 
    alert();
    console.log(`Number test is ${wineStock}`)
    error_message += "Invalid Qty - please check...";
    console.log(`Error is ${error_message}`);
    document.getElementById(currentID).classList.add ("invalid");
    document.getElementById(`${currentID}_error`).innerHTML = ` Must be betwee 0 and 9999`
  } else {
    remove_error(currentID);
  };


  if(error_message.length > 0){
    alert(`Please check and correct the errors ${error_message}`);
    return false;
  } else {
    return true
  };
}