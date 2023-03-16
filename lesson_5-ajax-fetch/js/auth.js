'use strict';
// аякс: отправка данных формы методом POST
const form = document.forms.auth; // обращаемся ко всему html, после к форматам, а после к конкретной = <form name="auth">

form.addEventListener('submit', (event) => { // на форму вешаем обработчик событий submit на форме, будет выполнена  функция обработчика, а это отправка формы на сервер
	event.preventDefault(); // добавляем эту строку, чтобы предотвратить перезагрузку страницы
	const requestOption = {
		method: 'POST', // http метод 
		body: new FormData(form)  //  данные передаваемые в теле сообщения
		// FormData это объект с помощью которого можно передать данные на сервер с помощью ajax, передаваться значения будут по атрибуту name= из формы они же будут ключами 
	};
	fetch('form-handler.php', requestOption) //запрос отправляем на form-handler который будет обрабатывать этот запрос, так же по умолчанию fetch отправляет get запрос, объект requestOption передаётся вторым аргументом в fetch с дополнительной информацией, меняем метод по умолчанию, и прикрепляем данные из формы 
		.then(response => response.json())
		.then(data => { // получили данные от сервера, и проверяем их 
			if (data.message === 'error') {
				document.getElementById('auth-error').innerText = data.reason; // выводим на страницу сообщение с ошибкой

			} else if (data.message === 'success') {
				console.log('success');
				window.location.href = 'tours.html'; // если всё удачно перенаправляем на старицу tours.html через js
			}
		});

});