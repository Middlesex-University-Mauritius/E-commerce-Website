"use strict"

/**
 * 
 * @param {HTMLElement} parent 
 * @param {Array} headers 
 * @param {String} key 
 */
export const renderTable = (parent, headers, key) => {
  parent.innerHTML = null;

  const table = document.createElement("table");
  const thead = document.createElement("thead");
  const tbody = document.createElement("tbody");
  const tr = document.createElement("tr");

  tbody.id = key;

  headers.forEach((header) => {
    const th = document.createElement("th");
    th.innerText = header;
    tr.append(th);
  })

  thead.append(tr);
  table.append(thead, tbody);
  parent.append(table);
}