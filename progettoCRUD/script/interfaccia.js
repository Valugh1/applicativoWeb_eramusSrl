const utenti = document.querySelector("#area-utenti");
const inventario = document.querySelector("#area-inventario");


utenti.addEventListener("click", function () {
    location.href = 'utenti/read.php';
});

inventario.addEventListener("click", function () {
    location.href = 'inventario/i_create.php';
});