console.log("This is project");

const name = document.getElementById("name");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
let validPhone = false;
let validEmail = false;
let validName = false;

// console.log(name, email, phone)

name.addEventListener("blur", () => {
  console.log("name is blurred");
  //Validate Name

  let regex = /^[a-zA-Z]([0-9a-zA-Z]){2,10}$/;

  let str = name.value;

  console.log(regex, str);

  if (regex.test(str)) {
    console.log("username is valid");
    name.classList.remove("is-invalid");
    validName = true;
  } else {
    console.log("username is not valid");
    name.classList.add("is-invalid");
    validName = false;
  }
});

email.addEventListener("blur", () => {
  console.log("email is blurred");
  //validate email here

  let regex = /^([a-zA-Z0-9\.\-\_]+)@([a-zA-Z0-9.\_\-]+)\.([a-zA-Z]){2,8}$/;

  let str = email.value;

  console.log(regex, str);

  if (regex.test(str)) {
    email.classList.remove("is-invalid");
    console.log("your email is valid");
    validEmail = true;
  } else {
    email.classList.add("is-invalid");
    console.log("your email id is not valid");
    validEmail = false;
  }
});

phone.addEventListener("blur", () => {
  console.log("phone is blurred");
  //validate phone

  let regex = /^([0-9]){10}$/;

  let str = phone.value;

  console.log(regex, str);

  if (regex.test(str)) {
    phone.classList.remove("is-invalid");
    console.log("phone number is valid");
    validPhone = true;
  } else {
    phone.classList.add("is-invalid");
    console.log("phone number is not valid");
    validPhone = false;
  }
});

let submit = document.getElementById("submit");
submit.addEventListener("click", (e) => {
  e.preventDefault();
  console.log("You clicked on submit button");

  if (validEmail && validPhone && validName) {
    console.log("Phone, email, and user are valid. Submitting the form");
    let success = document.getElementById("success");
    if (success) {
      success.classList.add("show");
    }
    // Hide failure message
    let failure = document.getElementById("failure");
    if (failure) {
      failure.classList.remove("show");
    }
    $('#failure').hide();
    $('#success').show();
  } else {
    console.log("Phone, email, and user are not valid. Please correct the details.");
    let failure = document.getElementById("failure");
    if (failure) {
      failure.classList.add("show");
    }
    // Hide success message
    let success = document.getElementById("success");
    if (success) {
      success.classList.remove("show");
    }
    $('#success').hide();
    $('#failure').show();
  }
});
