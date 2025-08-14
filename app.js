document.addEventListener('DOMContentLoaded', function() {
    // Navigation handler
    function navigateTo(page) {
        window.location.href = page;
    }

    // Form submission handlers
    const loginForm = document.querySelector('#loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;
            
            // Store login data temporarily
            localStorage.setItem('userEmail', email);
            navigateTo('App.html');
        });
    }

    const registerForm = document.querySelector('#registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const userData = {
                fullName: document.querySelector('#fullName').value,
                email: document.querySelector('#email').value,
                telephone: document.querySelector('#telephone').value,
                mobile: document.querySelector('#mobile').value,
                employeeNumber: document.querySelector('#employeeNumber').value
            };
            
            // Store registration data
            localStorage.setItem('userData', JSON.stringify(userData));
            navigateTo('login.html');
        });
    }

    const forgotPasswordForm = document.querySelector('#forgotPasswordForm');
    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.querySelector('#forgotEmail').value;
            localStorage.setItem('forgotEmail', email);
            alert('Password reset link sent to ' + email);
            navigateTo('login.html');
        });
    }

    // Program management
    const programForm = document.querySelector('#programForm');
    if (programForm) {
        programForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const program = document.querySelector('#programSelect').value;
            localStorage.setItem('selectedProgram', program);
            navigateTo('dataForm.html');
        });

        const createProgramForm = document.querySelector('#createProgramForm');
        if (createProgramForm) {
            createProgramForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const newProgram = document.querySelector('#newProgram').value;
                let programs = JSON.parse(localStorage.getItem('programs') || '[]');
                programs.push(newProgram);
                localStorage.setItem('programs', JSON.stringify(programs));
                navigateTo('App.html');
            });
        }
    }

    // Data form submission
    const dataForm = document.querySelector('#dataForm');
    if (dataForm) {
        dataForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = {
                indicator: document.querySelector('#indicator').value,
                auditedOutput: document.querySelector('#auditedOutput').value,
                annualTarget: document.querySelector('#annualTarget').value,
                q1: document.querySelector('#q1').value,
                q2: document.querySelector('#q2').value,
                q3: document.querySelector('#q3').value,
                q4: document.querySelector('#q4').value,
                comment: document.querySelector('#comment').value
            };
            localStorage.setItem('formData', JSON.stringify(formData));
            navigateTo('status.html');
        });
    }

    // Navigation links
    const navLinks = document.querySelectorAll('a[data-nav]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            navigateTo(this.getAttribute('data-nav'));
        });
    });
});