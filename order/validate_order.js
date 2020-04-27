function validateForm(event) {
  event.preventDefault();
  return (
    validateName() && validateZipcode() && validateEmail() && validatePhone()
  );
}

// Validering av namn-fältet
function validateName() {
  let name = document.querySelector("#name").value;
  let infoText = document.querySelector(".nameValidationText");

  if (name.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (new RegExp("[0-9]").test(name)) {
    infoText.innerHTML = "OBS! Inga siffror tillåtna";
  } else if (name.length > 20) {
    infoText.innerHTML = "OBS! Otillåtet med fler än 20 tecken";
  } else if (name.length < 2) {
    infoText.innerHTML = "OBS! Måste skriva mer än 2 tecken";
  } else if (isValidName(name)) {
    infoText.innerHTML = "OBS! Ogiltigt namn";
  } else {
    infoText.innerHTML = "";
    return true;
  }
  return false;
}
function isValidName(name) {
  let re = /[^a-öA-Ö\s:]/;
  return re.test(String(name));
}

// Validering av mailadressen
function validateEmail() {
  let email = document.querySelector("#email").value;
  let infoText = document.querySelector(".emailValidationText");

  if (email.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (!isValidEmail(email)) {
    infoText.innerHTML = "OBS! Ogiltig epostadress";
  } else if (email.length > 64) {
    infoText.innerHTML = "OBS! Otillåtet med fler än 64 tecken";
  } else {
    infoText.innerHTML = "";
    return true;
  }
  return true;
}
function isValidEmail(email) {
  let re = /^(([^<>()\[\]\\%.,;:\s@"]+(\.[^<>()\[\]\\%.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

// Validering av mobilnummer
function validatePhone() {
  let phone = document.querySelector("#phone").value;
  let infoText = document.querySelector(".phoneValidationText");

  if (phone.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (new RegExp("[a-öA-Ö]").test(phone)) {
    infoText.innerHTML = "OBS! Inga bokstäver tillåtna";
  } else if (isValidPhone(phone)) {
    infoText.innerHTML = "OBS! Ogiltigt mobilnummer";
  } else if (phone.length != 10) {
    infoText.innerHTML = "OBS! Numret måste vara 10 siffror långt";
  } else {
    infoText.innerHTML = "";
    return true;
  }
  return false;
}
function isValidPhone(phone) {
  let re = /[^0-9:]/;
  return re.test(String(phone));
}

// Validering av postnummer-fältet
function validateZipcode() {
  let zipcode = document.querySelector("#zip").value;
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
