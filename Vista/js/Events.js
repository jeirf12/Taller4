const addParemeterIfneeded = (method, parameter) => {
  return parameter !== "" 
    ? () => method(parameter)
    : method;
};

const loadClickEvent = (element, method, parameter = "") => {
  element.addEventListener("click", addParemeterIfneeded(method, parameter));
};

const loadEvent = (element, method, parameter = "") => {
  element.addEventListener(
    "load",
    addParemeterIfneeded(method, parameter),
    true
  );
};
const addResizeEvent = (element, methodResize, parameter = "") => {
  element.addEventListener(
    "resize",
    addParemeterIfneeded(methodResize, parameter)
  );
};

export { loadClickEvent, loadEvent, addResizeEvent };
