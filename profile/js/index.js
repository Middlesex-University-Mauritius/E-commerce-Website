import { Storage } from "../../includes/js/scripts/storage.js";

const fullName = document.getElementById("full-name");
const email = document.getElementById("email");
const age = document.getElementById("age");
const phone = document.getElementById("phone");

const storage = new Storage("user", {});

window.onload = function() {
  const customer_id = storage.get();

  if (!customer_id) window.location.href = "/web/signin"

  axios.get("/web/includes/services/customer/profile.php", {
    params: {
      customer_id: customer_id.$oid
    }
  }).then((response) => {
    console.log(response.data)

    const { success, user } = response.data;

    if (success) {
      fullName.innerText = `${user.firstName} ${user.lastName}`;
      email.innerText = user.email;
      age.innerText = user.age;
      phone.innerText = user.phone;
    } else {
      window.location.href = "/web/signin"
    }

  })
}