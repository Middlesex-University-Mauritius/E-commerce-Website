const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

const fullName = document.getElementById("full-name");
const email = document.getElementById("email");
const age = document.getElementById("age");
const phone = document.getElementById("phone");

window.onload = function () {
  axios
    .get("/web/includes/controllers/getProfile.controller.php", {
      params: {
        customer_id: params.id,
      },
    })
    .then((response) => {
      const { success, user } = response.data;

      if (success) {
        fullName.innerText = `${user.firstName} ${user.lastName}`;
        email.innerText = user.email;
        age.innerText = user.age;
        phone.innerText = user.phone;
      } else {
        window.location.href = "/web/signin";
      }
    });
};
