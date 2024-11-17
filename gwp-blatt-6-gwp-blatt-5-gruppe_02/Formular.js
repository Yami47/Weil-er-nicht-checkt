window.onload = function() {

    generateCaptcha(); 

};

function checkAge() {
    var birthDateInput = document.getElementById('geburtsdatum');
    var birthDateValue = new Date(birthDateInput.value);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - birthDateValue.getFullYear();

    if (age < 16) {
        alert('Sie müssen mindestens 16 Jahre alt sein.');
        return false;
    }

    return true; 
}


function generateCaptcha() {
    var num1 = Math.floor(Math.random() * 10) + 1;
    var num2 = Math.floor(Math.random() * 10) + 1;
    var operators = ['+', '-', '*'];
    var operator = operators[Math.floor(Math.random() * operators.length)];
    var captchaExpression = num1 + ' ' + operator + ' ' + num2;
    var captchaResult = eval(captchaExpression);

    var captchaDiv = document.getElementById('captcha');
    captchaDiv.textContent = 'Bitte lösen Sie die folgende Aufgabe: ' + captchaExpression;

    return {
        expression: captchaExpression,
        result: captchaResult
    };
}

function validateForm() {

    var captchaInfo = generateCaptcha();
    var captchaExpression = captchaInfo.expression;
    var captchaResult = captchaInfo.result;

    var userAnswer = document.getElementById('captchaInput').value;

    if (userAnswer != captchaResult) {

        var errorDiv = document.getElementById('captcha');
        errorDiv.textContent = 'Die Captcha-Eingabe ist falsch. Bitte versuchen Sie es erneut.'+ captchaInfo.expression;

        document.getElementById('captchaInput').focus();

        return false;
    }

    var selectedSubjects = document.getElementById('studienfach').selectedOptions;
    if (selectedSubjects.length === 0) {

        alert("Bitte wählen Sie mindestens ein Studienfach aus.");

        return false;
    }

    return true;
}
