fetch('/with-ajax/zoo.php')
  .then(response => response.json())
  .then(json => {
    const user = json.user;
    const animals = json.animals;
    // создаем HTML-код для пользователя
    let userHtml = `
      <div>
        <h1>${user.name}</h1>
        <p>Адрес электронной почты: ${user.email}</p>
        <p>Статус: ${user.role}</p>
      </div>
    `;
    // создаем HTML-код для животных
    let animalsHtml = '';
    animals.forEach(animal => {
      animalsHtml += `
        <div>
          <h3>${animal.name}</h3>
          <img src="/img/${animal.img}" alt="${animal.name}" height="300">
          <div>
          ${user.role === 'admin' ? '<button>Редактировать</button>' : ''}
          </div>
        </div>
      `;
    });

    // отображаем полученный HTML-код на странице
    const container = document.getElementById('container');
    container.innerHTML = userHtml + animalsHtml;
  })
  .catch(error => console.error(error));