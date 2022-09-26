import {
  loadClickEvent,
} from './Events.js';
let menu = document.querySelector(".navigation ul");
let container = document.querySelector(".container");
let bodycontact = document.querySelector(".bodyContact");
let containerAbout = document.querySelector(".container-about");
let menuBtn = document.querySelector(".menu-icon");
let inicioBtn = document.querySelector(".nav-inicio");
let aboutBtn = document.querySelector(".nav-about");
let productosBtn = document.querySelector(".nav-productos");
let contactoBtn = document.querySelector(".nav-contacto");

const removeClass = () => {
  menu.classList.remove("show");
};

const addClass = () => {
  if (!menu.classList.contains("show")) {
    menu.classList.add("show");
  } else removeClass();
};

const openModal = () => {
  let element = document.getElementById("myDropdown");
  element.classList.toggle("show");
};

let iconBtn = document.getElementById("btnOpenDropdown");
if(iconBtn !== null) iconBtn.addEventListener("click", openModal);
let element = document.getElementsByClassName("popup-close")[0];
let popup = document.getElementById("myPopup");
if(element !== undefined) loadClickEvent(element, () => { popup.classList.add("popup-invisible"); })

loadClickEvent(menuBtn, addClass);
loadClickEvent(inicioBtn, removeClass);
loadClickEvent(aboutBtn, removeClass);
loadClickEvent(productosBtn, removeClass);
if(contactoBtn !== null) loadClickEvent(contactoBtn, removeClass);
if(container !== null) loadClickEvent(container, removeClass);
if(containerAbout !== null) loadClickEvent(containerAbout, removeClass);
if(bodycontact !== null) loadClickEvent(bodycontact, removeClass);
