const loadClickEvent = (element, method, parameter="") => {
  element.addEventListener("click", () => {
    if(parameter !== "") method(parameter);
    else method();
  });
};

const loadEvent = (element, method, parameter="") => {
  element.addEventListener("load", () => {
    if(parameter !== "") method(parameter);
    else method();
  }, true);
};

export {
  loadClickEvent,
  loadEvent,
};
