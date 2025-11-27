<footer>
    <div class="footer-column">
        <h3>Endereço</h3>
        <p>Rua da Amostra, 123</p>
        <p>Cidade, Estado</p>
    </div>
    <div class="footer-column">
        <h3>Contato</h3>
        <p>Email: joaowladson.com</p>
        <p>Telefone: (11) 9515-88928</p>
    </div>
    <div class="footer-column">
        <h3>Mídias Sociais</h3>
        <a href="#" class="social-link">Facebook</a>
        <a href="#" class="social-link">Instagram</a>
        <a href="#" class="social-link">Twitter</a>
    </div>

    {{-- Botão de voltar ao topo --}}
    <button id="back-to-top" class="back-to-top-btn" title="Voltar ao topo">
        ↑
    </button>
</footer>

<style>
    .back-to-top-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #2d3748;
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition:
            background-color 0.3s,
            transform 0.3s;
        z-index: 1000;
    }

    .back-to-top-btn:hover {
        background-color: #4a5568;
        transform: translateY(-3px);
    }

    .back-to-top-btn.show {
        display: flex;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const backToTopBtn = document.getElementById('back-to-top');

        // Mostrar/ocultar botão ao rolar a página
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        // Voltar ao topo ao clicar
        backToTopBtn.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        });
    });
</script>
