window.onscroll = function () {
    var nav = document.querySelector("nav");
    if (window.scrollY > 50) {
        // Quando rolar mais de 50px
        nav.classList.add("scrolled"); // Adiciona a classe 'scrolled'
    } else {
        nav.classList.remove("scrolled"); // Remove a classe 'scrolled' se estiver no topo
    }
};

window.addEventListener("scroll", function () {
    let body = document.querySelector("body");
    body.classList.toggle("rolagem", window.scrollY > 0);
});
