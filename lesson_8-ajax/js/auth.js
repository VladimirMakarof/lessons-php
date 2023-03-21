const form = document.forms.auth;

form.addEventListener('submit', (event) => {
    event.preventDefault(); // отмена отправки формы по умолчанию 

    const options = {
        method: 'POST',
        body: new FormData(form) // в теле запроса будет данные из формы 
    };
    // <form action="form-handler.php" method="POST">
    fetch('form-handler.php', options)
        .then(response => response.json()) // {message: error} или {message: success}
        .then(data => {
            if (data.message === 'error') {
                document.getElementById('auth-error').innerText = 'Ошибка авторизации';
            } else if (data.message === 'success') {
                window.location.href = 'account.php';
            }
        });
});