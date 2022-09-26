let nav = document.getElementsByClassName("navigation")[0];
let ul = nav.getElementsByTagName("ul")[0];
let li = document.createElement("li");
let a = document.createElement("a");
a.setAttribute("href", "?c=Sesion&a=iniciarSesion");
a.textContent = "Iniciar Sesión";
li.appendChild(a);
ul.appendChild(li);
