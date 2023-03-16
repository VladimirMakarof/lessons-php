'use strict';
// аякс: отправка запроса на получение туров методом GET
fetch('tours-data.php')
	// fetch('tours-data') значит что клиентская часть находиться там же где и обработчики 
	// fetch('http://localhost:8000/tours-data.php') такой запрос говорит о том что у нас 2 сервера, на одном html и js а на другом обработчики. 
	.then(response => response.json())// когда сервер вернёт ответ будет вызвана функция, в функцию будет передан объект с информация об ответе, в случае если там не json а текст то нужно вызывать метод text(), если изображения или файл то метод blob()
	.then(jsonData => console.log(jsonData));


document.getElementById('search-btn').addEventListener('click', () => {
	let input = document.querySelector('input[type="search"]');

	fetch(`tours-data.php?country=${input.value}`) // на север отправляется запрос 
		.then(response => response.json())
		.then(jsonData => console.log(jsonData));
})

