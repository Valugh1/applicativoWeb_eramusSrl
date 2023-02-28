const utenti = document.querySelector("#area-utenti");
const inventario = document.querySelector("#area-inventario");
const logout = document.getElementById("logout");

utenti.addEventListener("click", function () {
    location.href = 'utenti/read.php';
});

inventario.addEventListener("click", function () {
    location.href = 'inventario/i_read.php';
});


