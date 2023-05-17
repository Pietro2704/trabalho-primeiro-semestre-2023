const url = 'https://dummyjson.com/products';

  axios.get(url)
    .then(response => {
      const data = response.data;
  
      const produtosContainer = document.getElementById('produtos-container');
      produtosContainer.style.display = 'flex';
      produtosContainer.style.flexWrap = 'wrap';
      produtosContainer.style.justifyContent = 'center';
      
  
      data.products.forEach(product => {
        const { title, description, thumbnail } = product;
  
        const card = document.createElement('div');
        card.classList.add('card');
        card.style.width = '18rem';
  
        const imagemElement = document.createElement('img');
        imagemElement.classList.add('card-img-top');
        imagemElement.src = thumbnail;
        imagemElement.alt = 'Imagem do produto';
  
        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
  
        const tituloElement = document.createElement('h5');
        tituloElement.classList.add('card-title');
        tituloElement.textContent = title;
  
        const descricaoElement = document.createElement('p');
        descricaoElement.classList.add('card-text');
        descricaoElement.textContent = description;
  
        const linkElement = document.createElement('a');
        linkElement.classList.add('btn' , 'btn-primary');
        linkElement.href = '#';
        linkElement.textContent = 'Saiba mais';
  
        cardBody.appendChild(tituloElement);
        cardBody.appendChild(descricaoElement);
        cardBody.appendChild(linkElement);
  
        card.appendChild(imagemElement);
        card.appendChild(cardBody);
  
        produtosContainer.appendChild(card);
      });
    })
    .catch(error => {
      console.error('Erro na requisição:', error);
    });