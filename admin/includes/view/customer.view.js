class Customer {
  id = null;
  date = null;
  name = null;

  constructor(id, date, name) {
    this.id = id;
    this.date = date;
    this.name = name;
  }

  render(parent) {

    const tr = document.createElement("tr");

    const idData = document.createElement("td");
    const dateData = document.createElement("td");

    const customerData = document.createElement("td");
    const customerContainer = document.createElement("div")
    customerContainer.className = "flex space-x-3";
    const customerImage = document.createElement("img");
    customerImage.className = "rounded-full w-8 h-8 border"
    customerImage.src = "/web/includes/img/avatar.png"
    const customerName = document.createElement("p");
    customerName.className = "my-auto";
    customerName.innerText = this.name;
    customerData.append(customerContainer);

    const idData = document.createElement("td");
    idData.innerText = this.id;

    const dateData = document.createElement("td");
    dateData.innerText = this.date;

    tr.append(idData, dateData, customerData);
    parent.append(tr);
  }

}