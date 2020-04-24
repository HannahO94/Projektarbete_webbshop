function validateForm(event) {
  event.preventDefault();
  return validateName() && validateZipcode() && validateEmail();
}

// Validering av namn-fältet
function validateName() {
  let name = document.querySelector("#name").value;
  let infoText = document.querySelector(".nameValidationText");

  if (name.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (!isNaN(name)) {
    infoText.innerHTML = "OBS! Endast text tillåtet";
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

// Validering av mailadressen
function validate(email) {
  let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function validateEmail() {
  let email = document.querySelector("#email").value;
  let infoText = document.querySelector(".emailValidationText");

  if (email.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (!validate(email)) {
    infoText.innerHTML = "OBS! Ogiltig epostadress";
  } else if (email.length > 64) {
    infoText.innerHTML = "OBS! Otillåtet med fler än 64 tecken";
  } else {
    infoText.innerHTML = "";
  }
}

// Validering av postnummer-fältet
function validateZipcode() {
  let zipcode = document.querySelector("#zipcode").value;
  let infoText = document.querySelector(".zipcodeValidationText");

  if (zipcode.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (zipcode.length != 5) {
    infoText.innerHTML = "OBS! Postnumret måste vara 5 siffror långt";
  } else if (zipcode.charAt(0) == 0) {
    infoText.innerHTML = "OBS! Postnumret får inte börja på siffran 0";
  } else {
    infoText.innerHTML = "";
    return true;
  }
  return false;
}
