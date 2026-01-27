<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho – Delicias da Fabi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Delicias da Fabi❤️</h1>
    <h3>Seu pedido 🛒</h3>
</header>

<section class="cardapio">
    <h2>🛍️ Itens do Carrinho</h2>

    <div id="listaCarrinho"></div>

    <h3 id="total"></h3>

    <a class="btn" href="index.php">⬅ Continuar comprando</a>
    <br><br>
    <button class="btn" onclick="finalizarPedido()">Finalizar no WhatsApp</button>
</section>

<script>
let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
let lista = document.getElementById('listaCarrinho');
let total = 0;

if (carrinho.length === 0) {
    lista.innerHTML = "<p>Seu carrinho está vazio.</p>";
} else {
    carrinho.forEach((item, index) => {
        total += item.preco * item.qtd; // considera quantidade
        lista.innerHTML += `
            <p>
                ${item.produto} x${item.qtd} - R$ ${(item.preco*item.qtd).toFixed(2)}
                <button onclick="removerItem(${index})">❌</button>
            </p>
        `;
    });
}

document.getElementById('total').innerText = "Total: R$ " + total.toFixed(2);

function removerItem(index) {
    carrinho.splice(index, 1);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    location.reload();
}

function finalizarPedido() {
    let mensagem = "Olá! Gostaria de fazer um pedido:%0A%0A";
    carrinho.forEach(item => {
        mensagem += `• ${item.produto} x${item.qtd} - R$ ${(item.preco*item.qtd).toFixed(2)}%0A`;
    });
    mensagem += `%0ATotal: R$ ${total.toFixed(2)}`;

    window.open(
        `https://wa.me/5541998766866?text=${mensagem}`,
        "_blank"
    );
}

</script>

</body>
</html>
