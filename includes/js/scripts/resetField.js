// Clear error messages
export const resetField = function(target) {
  const lastElement = target.parentNode.lastElementChild;
  target.classList.remove("error");
  if (lastElement.className === "error")
    target.parentNode.removeChild(lastElement);
}