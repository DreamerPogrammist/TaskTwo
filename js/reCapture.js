grecaptcha.ready(function () {
    grecaptcha.execute('YOUR_SITE_KEY_HERE', { action: 'contact' }).then(function (token) {
       var recaptchaResponse = document.getElementById('recaptchaResponse');
       recaptchaResponse.value = token;
       // Выполняем здесь вызов Ajax
    });
 });