document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();

        if (validateLoginForm()) {
            const formData = new FormData(this);
            formData.append('action', 'custom_auth');
            formData.append('security', customAuth.nonce);
            
            fetch(customAuth.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.data.message);
                    window.location.reload(); // Or redirect to a different page
                } else {
                    alert(data.data.message);
                }
            });
        }
    });

    document.getElementById('register-form').addEventListener('submit', function(e) {
        e.preventDefault();

        if (validateRegistrationForm(e)) {
            const formData = new FormData(this);
            formData.append('action', 'custom_auth');
            formData.append('security', customAuth.nonce);

            fetch(customAuth.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.data.message);
                    window.location.reload(); // Or redirect to a different page
                } else {
                    alert(data.data.errors.join("\n"));
                }
            });
        }
    });
});

function validateLoginForm() {
    clearErrors();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    let isValid = true;

    if (isEmpty(email)) {
        showError('email-error', 'Please enter your email');
        isValid = false;
    } else if (!isValidEmail(email)) {
        showError('email-error', 'Please enter a valid email address');
        isValid = false;
    }

    if (isEmpty(password)) {
        showError('password-error', 'Please enter your password');
        isValid = false;
    } else if (getPasswordStrength(password) !== 'strong') {
        showError('password-error', 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character');
        isValid = false;
    }

    return isValid;
}

function validateRegistrationForm(event) {
    clearErrors();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confpassword').value;
    let isValid = true;

    if (isEmpty(email)) {
        showError('email-error', 'Please enter your email');
        isValid = false;
    } else if (!isValidEmail(email)) {
        showError('email-error', 'Please enter a valid email address');
        isValid = false;
    }

    if (isEmpty(password)) {
        showError('password-error', 'Please enter your password');
        isValid = false;
    } else if (getPasswordStrength(password) !== 'strong') {
        showError('password-error', 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character');
        isValid = false;
    }

    if (password !== confirmPassword) {
        showError('confpassword-error', 'Passwords do not match');
        isValid = false;
    }

    return isValid; // Return false only if needed for preventing form submission
}

function isEmpty(value) {
    return value.trim() === '';
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function getPasswordStrength(password) {
    const strongPasswordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+[\]{};':"\\|,.<>/?]).{8,}$/;
    return strongPasswordRegex.test(password) ? 'strong' : 'weak';
}

function showError(id, message) {
    document.getElementById(id).textContent = message;
}

function clearErrors() {
    const errors = document.querySelectorAll('.form__error');
    errors.forEach(error => error.textContent = '');
}
