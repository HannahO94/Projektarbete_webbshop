let submitBtn = document.querySelector(".form-container__submit-button");

function validateForm() {
  let ret =
    validateName() &&
    validateEmail() &&
    validatePhone() &&
    validateStreet() &&
    validateZipcode() &&
    validateCity();
  return ret;
}

let isNameValid = false;
let isEmailValid = false;
let isPhoneValid = false;
let isStreetValid = false;
let isZipcodeValid = false;
let isCityValid = false;

// Validering av namn
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
    isNameValid = true;
    if (
      isEmailValid &&
      isPhoneValid &&
      isStreetValid &&
      isZipcodeValid &&
      isCityValid
    ) {
      submitBtn.disabled = false;
    }
    return true;
  }
  submitBtn.disabled = true;
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
    isEmailValid = true;
    if (
      isNameValid &&
      isPhoneValid &&
      isStreetValid &&
      isZipcodeValid &&
      isCityValid
    ) {
      submitBtn.disabled = false;
    }
    return true;
  }
  submitBtn.disabled = true;
  return false;
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
    isPhoneValid = true;
    if (
      isNameValid &&
      isEmailValid &&
      isStreetValid &&
      isZipcodeValid &&
      isCityValid
    ) {
      submitBtn.disabled = false;
    }
    return true;
  }
  submitBtn.disabled = true;
  return false;
}
function isValidPhone(phone) {
  let re = /[^0-9:]/;
  return re.test(String(phone));
}

// Validering av gatuadress
function validateStreet() {
  let street = document.querySelector("#street").value;
  let infoText = document.querySelector(".streetValidationText");

  if (street.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (street.length > 40) {
    infoText.innerHTML = "OBS! Otillåtet med fler än 40 tecken";
  } else if (street.length < 2) {
    infoText.innerHTML = "OBS! Måste skriva mer än 2 tecken";
  } else if (isValidStreet(street)) {
    infoText.innerHTML = "OBS! Ogiltigt adress";
  } else {
    infoText.innerHTML = "";
    isStreetValid = true;
    if (
      isNameValid &&
      isEmailValid &&
      isPhoneValid &&
      isZipcodeValid &&
      isCityValid
    ) {
      submitBtn.disabled = false;
    }
    return true;
  }
  submitBtn.disabled = true;
  return false;
}
function isValidStreet(street) {
  let re = /[^a-öA-Ö\s+0-9]/;
  return re.test(String(street));
}

// Validering av postnummer
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
    isZipcodeValid = true;
    if (
      isNameValid &&
      isEmailValid &&
      isPhoneValid &&
      isStreetValid &&
      isCityValid
    ) {
      submitBtn.disabled = false;
    }
    return true;
  }
  submitBtn.disabled = true;
  return false;
}

// Validering av ort
function validateCity() {
  let city = document.querySelector("#city").value;
  let infoText = document.querySelector(".cityValidationText");

  if (city.length === 0) {
    infoText.innerHTML = "OBS! Obligatorisk fält";
  } else if (new RegExp("[0-9]").test(city)) {
    infoText.innerHTML = "OBS! Inga siffror tillåtna";
  } else if (city.length > 20) {
    infoText.innerHTML = "OBS! Otillåtet med fler än 20 tecken";
  } else if (city.length < 2) {
    infoText.innerHTML = "OBS! Måste skriva mer än 2 tecken";
  } else if (isValidCity(city)) {
    infoText.innerHTML = "OBS! Ogiltig ort";
  } else {
    infoText.innerHTML = "";
    isCityValid = true;
    if (
      isNameValid &&
      isEmailValid &&
      isPhoneValid &&
      isStreetValid &&
      isZipcodeValid
    ) {
      submitBtn.disabled = false;
    }
    return true;
  }
  submitBtn.disabled = true;
  return false;
}
function isValidCity(city) {
  let re = /[^a-öA-Ö\s:]/;
  return re.test(String(city));
}
