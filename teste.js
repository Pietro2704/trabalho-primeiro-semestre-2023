const url = 'https://dummyjson.com/products';

axios.get(url)
  .then(response => {
    const data = response.data;

    const produtosContainer = document.getElementById('produtos-container');
    produtosContainer.style.display = 'flex';
    produtosContainer.style.flexWrap = 'wrap';
    produtosContainer.style.justifyContent = 'center'; // Centraliza os produtos na horizontal
    produtosContainer.style.gap = '2.78rem'; // Define o espaço entre os produtos
    produtosContainer.style.marginLeft = '200px';
    produtosContainer.style.marginRight = '200px';

    const limitedData = data.products.slice(0, 20);

    limitedData.forEach(product => {
      const { title, description, thumbnail, price } = product;

      const card = document.createElement('div');
      card.classList.add('card');
      card.style.width = '12rem';
      card.style.marginBottom = '1rem';

      const imagemElement = document.createElement('img');
      imagemElement.classList.add('card-img-top');
      imagemElement.src = thumbnail;
      imagemElement.alt = 'Imagem do produto';
      imagemElement.style.width = '100%';

      const cardBody = document.createElement('div');
      cardBody.classList.add('card-body');

      const tituloElement = document.createElement('h5');
      tituloElement.classList.add('card-title');
      tituloElement.textContent = title;

      const descricaoElement = document.createElement('p');
      descricaoElement.classList.add('card-text');
      descricaoElement.textContent = description;

      const precoElement = document.createElement('p');
      precoElement.classList.add('card-price');
      precoElement.textContent = `Preço: ${price.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}`;

      const addToCartButton = document.createElement('a');
      addToCartButton.classList.add('btn', 'btn-primary');
      addToCartButton.href = '#';
      addToCartButton.textContent = 'Adicionar ao Carrinho';

      card.appendChild(imagemElement);
      card.appendChild(cardBody);
      cardBody.appendChild(tituloElement);
      cardBody.appendChild(descricaoElement);
      cardBody.appendChild(precoElement);
      card.appendChild(addToCartButton);

      produtosContainer.appendChild(card);
    });
  })
  .catch(error => {
    console.error('Erro na requisição:', error);
  });
