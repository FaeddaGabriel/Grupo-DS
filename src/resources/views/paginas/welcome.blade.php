<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sports King - Home</title>
        <link
            rel="stylesheet"
            href="{{ asset("css/pages/pagina-home.css") }}"
        />

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="hero">
            @include("componentes.navbar")
        </div>

        @if (session("success"))
            <div id="alert-message" class="alert-message">
                {{ session("success") }}
            </div>

            <script>
                const alertDiv = document.getElementById('alert-message');
                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            </script>
        @endif

        <div class="destaques">
            <h3>Destaques</h3>
            <p>Modas Esportivas</p>
        </div>

        <div class="cards-container">
            <div class="card">
                <div class="card-content">
                    <h3>Casual</h3>
                    <p>Ver mais.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Retrô</h3>
                    <p>Ver mais.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Profissional</h3>
                    <p>Ver mais.</p>
                </div>
            </div>
        </div>

        <!-- Banner do site -->
        <div class="full-width-banner">
            <h2>Conhça mais do basquete!</h2>
            <a href="">Ver mais</a>
        </div>

        <!-- Seção de Cards de Compra -->
        <div class="destaques">
            <h3>Camisas de time de Basquete</h3>
            <br />
            <a>Ver mais</a>
        </div>

        <div class="product-container">
            <div class="product-card">
                <img
                    src="https://acdn-us.mitiendanube.com/stores/162/062/products/originaldasruasroxa01-a4df224a26be9435a717016948626339-1024-1024.jpg"
                    alt="Produto 1"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Jordan</h3>
                    <p>Regata Original Do time Jordan</p>
                    <p>R$ 99,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
            <div class="product-card">
                <img
                    src="https://acdn-us.mitiendanube.com/stores/162/062/products/ogstylepreta01-a05717aa8871d145b917016955299490-640-0.jpg"
                    alt="Produto 2"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Lebron</h3>
                    <p>Regata Original Do time Lebron</p>
                    <p>R$ 149,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
            <div class="product-card">
                <img
                    src="https://static.netshoes.com.br/produtos/regata-basquete-trip-side-rb01/06/S02-0107-006/S02-0107-006_zoom1.jpg?ts=1731602996"
                    alt="Produto 3"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Bulls</h3>
                    <p>Regata Original Do time Bulls</p>
                    <p>R$ 199,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
        </div>

        <!-- Banner com vídeo -->
        <div class="full-width-banner2">
            <video autoplay muted loop class="background-video">
                <source
                    src="{{ asset("images/Picsart_25-03-15_18-37-11-592.mp4") }}"
                    type="video/mp4"
                />
            </video>
        </div>

        <!-- Cards de Compra 2 -->
        <div class="destaques">
            <h3>Camisas de time</h3>
            <br />
            <br />
            <a>Ver mais</a>
        </div>

        <div class="product-container">
            <div class="product-card">
                <img
                    src="https://acdn-us.mitiendanube.com/stores/001/986/628/products/camisa-nike-brasil-ii-202021-torcedor-pro-masculina-cd0688-427-1-11626441450-depositphotos-bgremover1-2926c3241679d6e84b16553282710787-1024-1024.png"
                    alt="Produto 1"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Camisa Oficial Brasil</h3>
                    <p>Seja torcedor com orgulho!</p>
                    <p>R$ 599,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
            <div class="product-card">
                <img
                    src="https://static.shoptimao.com.br/produtos/camisa-corinthians-ii-1920-cassio-n-12-torcedor-nike-masculina/26/HZM-4008-026/HZM-4008-026_zoom2.jpg?ts=1591262771&"
                    alt="Produto 2"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Camisa Corinthians</h3>
                    <p>Seja torcedor com orgulho!</p>
                    <p>R$ 549,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
            <div class="product-card">
                <img
                    src="https://images.tcdn.com.br/img/img_prod/1052037/camisa_argentina_retro_1986_maradona_1709_2_4ae0a6aafce6cc69b2e964e2007990ef.jpg"
                    alt="Produto 3"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Retrô Maradona</h3>
                    <p>Seja torcedor com orgulho!</p>
                    <p>R$ 999,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
        </div>

        <!-- Promo Card Carrossel -->
        <div class="carrosselC">
            <div class="destaquesP">
                <h3>Super Promoções</h3>
                <h3>Só Aqui!</h3>
            </div>
            <div class="cardsCarrossel-container">
                <div class="cardC">
                    <img
                        src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSr5zroLjkMLZIop5KIZZRn7j4MKH10E9mtp9CyNoCDDVA4YnZ6rbCh4TcA-AT8FPtTBglDE2NocUDl9cY68KGnmth-vKJMXveEdsqlw75wxHKQgVHmmwzlXA3XTxhfqCrzFbtb-Q&usqp=CAc"
                        alt="Roupa 1"
                    />
                    <h3>Camisa Masculina</h3>
                    <p>De R$ 99,90 por R$ 79,90</p>
                </div>
                <div class="cardC">
                    <img
                        src="data:image/jpeg;base64,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"
                        alt="Roupa 2"
                    />
                    <h3>Luvas Esportivas</h3>
                    <p>De R$ 149,90 por R$ 119,90</p>
                </div>
                <div class="cardC">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXJ6OzxvgZ4WuPFKf6iay9BoviD5AZpwaIqw&s"
                        alt="Roupa 3"
                    />
                    <h3>Calça Jeans</h3>
                    <p>De R$ 129,90 por R$ 99,90</p>
                </div>
                <div class="cardC">
                    <img
                        src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEBUSEhIVFRUVFRUXFhUVFRUVEhUWFRcYFhUXFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDQ0OFQ8PFSsdFRkrKzcrKysrNy0tNy0rLS0rNysrKzctNzcrLSstNzcrKys3Ky0tKysrNy0tKzc3LTctLf/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAgEDBgcIBAX/xABREAACAgEBAwcHBQsICAcAAAAAAQIDEQQFEiEGBxMxQVFxIlJhgZGhsQgjMpLBFCRTcoKis8LR4fAVF2J0lLLD0iU1Q3ODk6PxFjM0QlRjZP/EABYBAQEBAAAAAAAAAAAAAAAAAAABAv/EABcRAQEBAQAAAAAAAAAAAAAAAAABESH/2gAMAwEAAhEDEQA/AN4gAAAAAAAAAAAAAAAA+Tyn5QU6DTT1N7e7HCSjxnOUuEYRXa37OtvgjRXKLne2jfJ/c8o6WvsUIxnY1/SsmsfVSA6LBy5VzibWTz93WeuNTXscDYvN9ztzuuhpdeoKVjUa74Ldi5PhGNkepNvgpLhlpYXWBt4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8Ov2tTTjpJpN9UVxnL0RiuLYGrflEan5rSVby4ztm49uYRjFS9SnJes0pEy/nf5SS1e0mnHcjp49FGOU284nKUmsrLyljsSXbkxGueGnhelNIsEkW7JNcU+K4rHXldWCdssLC73+z9paU3lcMfx3FHZOkt3q4STypRi89+UnkumtebLlg3s6mN0Hu1YoVsXHDVcYqG9FvLeMLhxb6k+ONjUXxmsxeV/HWuwyLgAAAAAAAAAAAAAAAAAAAAAAAABi/KrlRDTxx01NTeVv3T3Vw692K8qbXdFcerK6wMi1GrhD6UkuGcdbx34XHBjOr5b05caPnZJ7rVe9c0/TGhTx4ScfTg1Ht7l7S21XCWslxzZqcx02eHGGki/KXDhKxuXpZjO0+WuvuW69TOEOyunFMEu5KtJteLZcG5NtcqLIL74uhp08+TbbGqbXfGilztn4dJEwXafLzTxTVKtvk8bzT+46ZY7XuN32eE58TWzlxb7Xxb7W/S+0hPiUenbe0HqbXY4VwylFRqhuVpRWIpLw7WWKZZSz1otJFyGFxz6vSBfvXlPHe/iyzJ44vr7i/q5x3m1w7knnsXazyTePHtAzLk1y36CEa5UqSit1WVSdGoUcyeJ4Thck5SaU4tZbM32Nyw08v/J1UapcPItb0clnre9FT085fkRNKRT6y/XZng/3MDpOrlfbSk9RFqD6p2QxXhf+56mh2V/WUDItDykosgp727GXVNuMqX3Yug3Dj2ZafoOXtkbc1OledPfOrvinmt+NcsxfrRlOy+W1Ep72oolp7X16rQPopPPbdp29yz1qXoRB0emVNXbG5SWUQVvS13aZvC1NSaoT7Y6uhZemlx42QW7njKPYbH2dro3Q3o+tPGU2s9nBrDTTXBp5RB6gAAAAAAAAAAAAAAAAAB8nlNtJ0UNx4zk1GC6syk1GKz2ZlKMc9m8c284m0Y3bSs3HvRqjClS851ZVjS7t9y9hvLl3rdyyEm/Johbe12PoqrGk/wAuVT/JRzJOTTTfF9r72+tsom0RTLjIpFFMAk0UwBRoKJLBOKAjavKZDdRfmuLLYEOi7+oq8CRRRAnGRIhgkB9DYu3r9FY7dPY4SxiS64TXmzg+El712YNzc2fKjpqY2yrhS+lnVOFeVVLEYWNwi35GFY5bucLdm19Jmhp9Xr9vcbJ5tNTnSW14y9Pq9Pf+Rf8Aet/sr336wOhQeTZNznRW39LdSl+NHyZe9M9ZkAAAAAAAAAAAAAAAAas50tS/n4Lt0eqb/FjLSRfxkaBvzhrtXvXYbw5e2709oPsr2dNZ9Oo1E4r3UxNKXQys9v8AGSi3Q8xLmDy0y3ZY9f7T2dYEASaKIorEmkIxJ44ARl1shJF5ri/WR3QPVsPY8tVcq4yhBY3pylKK3YJpOSi2nN8eEVxZmnLfkJXptJG3T8ZUPd1L3nLfjL6F6Tb3V2NLgsvzcvGdh8pNRpIShS47snvPeTfHyU8NNeZHj1rjhrLz9L/x5qG82UaWxbzk1KqfXLG9hb+FndXDGM8Xl8SdGIFXHhkvXNSnKSioqUpPdj9GOW3ux9CzheBa1E8RfgUeaE8vwMy5t9TuWapN+TPRajPjBRnF+5+0w+qGEZXyF03SfdqXX/J2q3fFqK+HxA6R5PT+bmvNut/Om5L3SR9Qx/kbqVZU7F1WxpuXhZTD7YsyAzQAAAAAAAAAAAAACk5YTfcip83lJqOj0eosXXGmxrx3XgDTnK3U50Gvt7bHoKM+Ea9TJey6XtNUxfA2dzk/N6LcXDpNfJv0qjTqn9SPsNXxfE0PJqODyX6bC1q0Spa3U8EHrCwW0y5EonGaJtll5KxQE2+PX3/EkpLvRbsXH1v4lMgXW0UbRZkUXq9iAuOxHm1Muou+KRY1MlvLH8Z/7AXYdRmnNPbFbSjXLququqx4w3/hWzCoPgfe5Faroto6WfdfXH1WPo37psDfHNVN/cdUG+NdXRPx09ttT+CM4MF5Brcuur83U69eqdtV0V7LDOiUAAQAAAAAAAAAAAPg8trd3RTXnzpq/wCbbCv9Y+8Y9y1WaqI9+r035tin+qBpbnJu3qKPTq9pP6uo3TXUuszrnCf3von51m0ZfW1OftMFtNC1qVwLen6kXpFvT9RB6Il2JaiXEUTbK4IxKtgSs634v4sgVsfF+L+JHIFJFMhkUBNnltXHPoPUixd1+z7QJQPVortyyE/NnCX1ZJ/YeOLJy+i+9p4A6S5Ovd2lqV36uEl4WaGL+NRnhrnYV+dpSlnhZp9n3Lu8rp6m/Y4+w2MSgACAAAAAAAAAAABrjnn5RWaOvS9HGMnK7f8AKzj5ndkup545x4N+g2OaR+UPdm/Rwz9Gu+T/ACpVJf3GBrbb3KGWqrorlWo9B0+Gm3vdNYrHlY4YxjtyfHzkldHtLcu8ohLgvR4F27SyqnOqaxOucoSXdKD3ZL2pn3OQey/unamkq607oyl+LV87JetQa9Z8za9jlqr5edfc+PpskwPPAmQUn6Pf+wrx717/ANhRfS4Fsjv97XsKxnn/ALfvAuW9b8SOBdZiT4dviE2+1ez94FcEXEbr873fvJKL85ez94EUWNQuPq/aX3F9/u/efe21sprY+i1SS/8AUaqqT7Xlp1/o7AMYiy9F44luIxkDaWwOX2nrek+btlOvS6fTzaUEnKucXwblxXWvWb/OQNkSxfU+62t+ycTr8lAAEAAAAAAAAAAADn3n6vztSEfM0tftlZa39h0Ec2c81+9tq9eZCiH/AE1Z/iAYTJcCwuovlrtNDZnyfdnb+0Lbn1U0NL8a6SSf1YT9prW6W9KUs53pOWe/eec+83V8nuhRo1t77Z1w9VcHN/pDSNT8mPgvgQVwCrIsoo+Jej2FuKJJ8QLk35T8WWlwJ2PiyM0BXeKqRaJJgXkzbGg2V0/I2zhxrndfFvs6G+Tl+Ypr1mpYm+ebPT9Nyatp8+Otr9Pl7/V9YlGgCcYlut5S8C9Eou6ae7JSfY0/Y8nYyOM7Poy/FfwOyaZZin3pfAlEwAQAAAAAAAAAAAOYOdWedtax/wBOteyipfYdPnK3OJPO19a//vkvqxjH7AMfLbLhBmhvzmZp6PYdtiXGdmon47kVWv0Zz/R9FeCOkORNHQ8mY9jek1Fue35zpLV/eRzdT9FeCIJsjglgqUURJESueIErutlCtz4v+OwigItFUVKICUToTmHlvbLnHu1Nq9sK3+sc9o3x8nuz7y1Me7VZ9tNX7CUaK1Wn6Oyyt9cJzh9STj9hGB9nlzp+j2prIdWNTa14Tk5r3TPixKK2fRl+K/gdh7Olmmt98If3Ucert8GdebClnS0PvpqftgiUe4AEAAAAAAAAAAADkzllZvbS1r//AF6hfVtlFfA6zOQ+UMs63Uvv1OofttmB4WW7HhN9yLjJafT9JZCtddk4Q9PlyUftNDpXa0fuXk5OK4OvZ24vHoNzt9LOZIrgdQ86jUdi6z/c7q9coxXxOXokgMoyrCRQRSIYTAuWfSf8dhBErX5T/jsRQChVIIqBVG7Pk8XfN6yHdOmf14zj/hmk0ba+T5djVaqHnU1y+pNr/EIMV55NN0e2tR3TVNi9dUYv86EjDUbL+UFpt3aVNnZZpkvXXZPPunE1pFAXIr4HW3JeWdDpX36el/8ATickxOseRz/0do/6rR+iiKPsAAgAAAAAAAAAAAcebTs3r7pedda/bZJnYTZxrOWZN97b9ryIDPsch9N0u09HDv1NLfhCaskvZBnxpGZ8zmm39s6b+grZv1VTivfNFG2+fDU7mxrVnG/ZRDx+cjJr2ROcDf3yg7MbMpj52rgvUqrn8UjQCEASZTJBsokCKZKLAnb1v+Owoitv0mRQE0COSqYE0bF5ircbWa87TXL2Tqkvga5TM65lZ42zV6a7l+Zn7CDKvlGaXhore53Vv8pVyj/cl7TTMUb/APlBabe2ZVP8Hqq36pQsh8ZR9hoCIgnnrOsuRv8Aq7R/1Wj9FE5KfxOtuSH+rtJ/VaP0URR9cAEAAAAAAAAAAAQt+i/BnGbTi92ScZJ4kmmmpLg00+KaaZ2eci8rYY2jrF3avU/ppgfM3l3my+YHT7207J9lemn7Z2Vpe6MjWZuL5Omn8vW2Y6o6eCfi7ZSXuj7Sj3fKKv8AvfSV5+ldZLHb5EMfrmj8PuOxNo7Op1EOjvqrth5tkIzjnvxJNZMZ1XNhsmzr0cY/7udtS9kJJAcwyg/SU6JnSMuZ/ZT/ANlavC+37ZFP5ntlfg7v+fb+0aObuhZVRZ0fLmd2V5ly/wCPZ9rJ6Xmg2VCSk6rJ4aeJ3WOPDvSaz6xo5xtreWR6I6Z1fNbsqyW9KiecJZV96bx1Z8vizz/zRbJ/A2/2i7/MNHNvRsdGzpD+aDZX4K3+0W/5hHmg2V+Ctf8Ax7f8w0c4pMzvmTg/5Yq9Fdz/ADMfb7za8OaPZC/2Fj8dRf8AZM+/yf5JaLRNy0unhXJrdc/KnY49eN+bcsZS4Z7Box3nwx/It2fPox49ND7MnNqsXejpHnxl/oW702UfpYv7Dm6IgrGazxaOtuR2f5O0mU0/uajKaw0+jjwafUcmVxy0u9pe14OykKKgAgAAAAAAAAAAAcucquS2veu1U/uLUuM9TqJKUaLJRcZWzkmnFPKaaOowBx/ZsXVR+lpdQvGi1fGJu7mB2fZVo9RKyudbnet1ThKDcY1x4pSSystrPoZtIAAAAAAAAAAAAAAAAAYHz2aOy3ZM41VyskraW4wi5Swp8Wori+w58WwdX/8AE1P9nu/ynX4GjknQ7A1fS150mpS6SGW9PdhLeWW3u9x1sAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB//9k="
                        alt="Roupa 4"
                    />
                    <h3>Jaqueta Esportiva</h3>
                    <p>De R$ 299,90 por R$ 249,90</p>
                </div>
            </div>
        </div>
        <!-- Seção de Destaques - Tênis -->
        <div class="destaques">
            <h3>Tênis</h3>
            <br />
            <br />
            <a>Ver mais</a>
        </div>

        <div class="product-containerN">
            <div class="product-cardN">
                <img
                    src="https://static.netshoes.com.br/produtos/chuteira-futsal-penalty-max-300-y-1-masculina/44/50D-5104-044/50D-5104-044_zoom2.jpg?ts=1718913265&ims=1088x"
                    alt="Produto 1"
                    class="product-image"
                />
                <div class="product-info">
                    <h3>Chuteira Performance Branco e Azul</h3>
                    <p>Chuteira esportiva confortavel</p>
                    <p>R$ 599,99</p>
                    <button class="buy-buttonN">Comprar</button>
                </div>
            </div>
            <div class="product-cardN">
                <img
                    src="https://static.netshoes.com.br/produtos/chuteira-futsal-penalty-max-300-y-1-masculina/78/50D-5104-178/50D-5104-178_zoom2.jpg?ts=1717177868&ims=544x"
                    alt="Produto 2"
                    class="product-image"
                />
                <div class="product-infoN">
                    <h3>Chuteira Elite Preto e Laranja</h3>
                    <p>Chuteira esportiva confortavel</p>
                    <p>R$ 549,99</p>
                    <button class="buy-buttonN">Comprar</button>
                </div>
            </div>
            <div class="product-cardN">
                <img
                    src="https://static.netshoes.com.br/produtos/chuteira-futsal-penalty-max-300-y-1-masculina/36/50D-5104-036/50D-5104-036_zoom2.jpg?ts=1718913243&ims=544x"
                    alt="Produto 3"
                    class="product-image"
                />
                <div class="product-infoN">
                    <h3>Chuteira Profissional Azul</h3>
                    <p>Chuteira esportiva confortavel</p>
                    <p>R$ 999,99</p>
                    <button class="buy-buttonN">Comprar</button>
                </div>
            </div>
        </div>

        @include("componentes.footer")

        <div class="fundo">
            <h1>©Etec de Guaianazes 2025</h1>
        </div>

        <script src="{{ asset("js/rol.js") }}"></script>
    </body>
</html>
