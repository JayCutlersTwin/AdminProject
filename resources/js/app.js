require('./bootstrap');

var Header = document.getElementById('DROPDOWNLI');
const Menu = document.getElementById('DROPPEDMENU');

Header.addEventListener('click', () => Menu.classList.toggle("hide") );
