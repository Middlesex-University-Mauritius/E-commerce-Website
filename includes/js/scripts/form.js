/**
 * file: form
 * description: Validate input fields when doing authentication
 */

import Message from "../view/message.view.js";

// Clear error messages
export const resetField = function(target) {
  const lastElement = target.parentNode.lastElementChild;
  target.classList.remove("error");
  if (lastElement.className === "error")
    target.parentNode.removeChild(lastElement);
}

// Render field error messages manually
export const setError = (target, message) => {
  target.classList.add("error");

  const messageView = new Message(message)

  const parent = target.parentNode;

  if (parent.lastElementChild.className !== "error")
    messageView.render(parent, "error");
}

// Validate inputs
export const validate = (target) => {
  const { id, value } = target;
  let error = false;
  let message = null;
  
  // Field is empty
  if (target.hasAttribute("required") && value.length <= 0) {
    error = true;
    message = "This field is required";
    setError(target, message);
    return true;
  }

  // Email validation
  if (id === "email") {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    error = !re.test(value);
    message = "Invalid email address";
  }

  // password length is less than or equal to 5 
  if (id === "password") {
    error = value.length <= 5
    message = "Password must have at least 5 characters";
  }

  // passwords do not match
  if (id === "confirmPassword") {
    error = value !== password.value
    message = "Passwords do not match";
  }

  // phone must contain numbers
  if (id === "phone") {
    error = new RegExp("\d").test(value)
    message = "Invalid phone number";
  }

  // append error message if error 
  if (error) {
    setError(target, message);
    return true
  } else {
    resetField(target);
    return false;
  }
}

// Validate input withs on input change live
export const validateFieldsWithInput = (fields) => {
  // valid each input fields
  Object.values(fields).forEach((field) => field.addEventListener("input", (event) => {
    resetField(event.target);
    validate(event.target);
  }))
}

// Trigger input validation manually. eg when submit button is clicked
export const validateFieldsWithoutInput = (fields) => {
  // Initialize error object
  let errors = {}

  // Check if field has errors
  Object.keys(fields).map((field) => {
    errors[field] = validate(fields[field]);
  })

  // Has form errors
  const hasErrors = Object.values(errors).includes(true);

  // Return payload
  return {
    hasErrors,
    errors
  };
}