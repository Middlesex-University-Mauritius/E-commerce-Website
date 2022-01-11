import Message from "../view/message.view.js";

const reset = function(target) {
  const lastElement = target.parentNode.lastElementChild;
  target.classList.remove("error");
  if (lastElement.className === "error")
    target.parentNode.removeChild(lastElement);
}

export const validate = (target) => {
  const { id, value } = target;
  let error = false;
  let message = null;

  if (value.length <= 0)
    return reset(target);

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
    target.classList.add("error");

    const messageView = new Message(message)

    const parent = target.parentNode;

    if (parent.lastElementChild.className !== "error")
      messageView.render(parent, "error");

    return false
  } else {
    reset(target);
  }
  return true
}

export const validateFields = (fields) => {
  // valid each input fields
  Object.values(fields).forEach((field) => field.addEventListener("input", (event) => validate(event.target)))
}