function validateForm(event) {
  event.preventDefault();
  return validateName() && validateZipcode();
}

// Validering av namn-fältet
function validateName() {
  let name = document.querySelector("#name").value;
  let infoText = document.querySelector(".nameValidationText");

  if (name.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (!isNaN(name)) {
    infoText.innerHTML = "Endast text tillåtet";
  } else if (name.length > 20) {
    infoText.innerHTML = "OBS! Otillåtet med fler än 20 tecken";
  } else if (name.length < 2) {
    infoText.innerHTML = "OBS! Måste skriva mer än 2 tecken";
  } else {
    infoText.innerHTML = "";
    return true;
  }
  return false;
}

// Validering av postnummer-fältet
function validateZipcode() {
  let zipcode = document.querySelector("#zipcode").value;
  let infoText = document.querySelector(".zipcodeValidationText");

  if (zipcode.length === 5) {
    //"OBS! Postnumret måste vara 5 siffror långt"
    infoText.innerHTML = zipcode;
    // else if (zipcode.charAt(0) === 0) {
    //     infoText.innerHTML = "OBS! Postnumret får inte börja på siffran 0";
  } else {
    infoText.innerHTML = "";
    return true;
  }
  return false;
}
// (isNaN(zipcode)) {
//     infoText.innerHTML = "OBS! Endast siffror tillåtet";
//   }
