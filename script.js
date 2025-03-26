//For toggle mobile menu
function toggleMenu() {
    const menu = document.querySelector('.main_menu');
    const menuToggle = document.querySelector('.menu_toggle');
    menu.classList.toggle('show_menu');
    menuToggle.classList.toggle('close_menu');
}

document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.main_menu a');
    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            document.querySelector('.main_menu').classList.remove('show_menu');
            document.querySelector('.menu_toggle').classList.remove('close_menu');
        });
    });
});
//footer year
document.addEventListener("DOMContentLoaded", function() {
    var currentYear = new Date().getFullYear();
    document.getElementById("currentYear").textContent = currentYear;
});