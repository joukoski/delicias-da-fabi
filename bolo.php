<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bolos – Sweet & Food</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<header class="header">
    <div class="descricao-logo">
    <h1>Delicias da Fabi</h1>
    <p>Escolha seu bolo favorito 🍰</p>
    <img src="img/bolo.jpg" alt="Delícias da Fabi" class="item-img">
</header>

<section class="cardapio">
    <a class="btn-secundario" href="carrinho.php">🛒 Ver Carrinho</a>

    <h2>🍰 Sabores de Bolos</h2>

    <div class="itens">

        <div class="item">
            <h3>Chocolate</h3>
            <p>Bolo caseiro tradicional</p>
            <button class="opcao" onclick="addCarrinho('Bolo de Chocolate', 35)">
                R$ 35,00
            </button>
        </div>

        <div class="item">
            <h3>Ninho</h3>
            <p>Com leite em pó</p>
            <button class="opcao" onclick="addCarrinho('Bolo de Ninho', 40)">
                R$ 40,00
            </button>
        </div>

        <div class="item">
            <h3>Morango</h3>
            <p>Com recheio especial</p>
            <button class="opcao" onclick="addCarrinho('Bolo de Morango', 45)">
                R$ 45,00
            </button>
        </div>

    </div>

    <br>
    <a class="btn" href="index.php">⬅ Voltar para o cardápio</a>
</section>

<script>
let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

function addCarrinho(produto, preco) {
    let item = carrinho.find(i => i.produto === produto);

    if (item) {
        item.qtd++;
    } else {
        carrinho.push({ produto, preco, qtd: 1 });
    }

    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    alert(produto + " adicionado ao carrinho!");
}
</script>


</body>
</html>
