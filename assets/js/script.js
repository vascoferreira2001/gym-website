// JS personalizado do projeto GoGym
// Aqui poderás adicionar efeitos, validações, etc.

console.log("GoGym website carregado.");

// Validação de formulários
function validateForm(form) {
    let valid = true;
    let messages = [];
    // Nome
    var name = form.querySelector('[name="name"]');
    if (name && typeof name.value === 'string' && name.value.trim().length < 3) {
        valid = false;
        messages.push("O nome deve ter pelo menos 3 caracteres.");
        name.classList.add('is-invalid');
    } else if (name) {
        name.classList.remove('is-invalid');
    }
    // Email
    var email = form.querySelector('[name="email"]');
    if (email && typeof email.value === 'string') {
        var emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
        if (!emailPattern.test(email.value.trim())) {
            valid = false;
            messages.push("Insere um email válido.");
            email.classList.add('is-invalid');
        } else {
            email.classList.remove('is-invalid');
        }
    }
    // Mensagem
    var message = form.querySelector('[name="message"]');
    if (message && typeof message.value === 'string' && message.value.trim().length < 10) {
        valid = false;
        messages.push("A mensagem deve ter pelo menos 10 caracteres.");
        message.classList.add('is-invalid');
    } else if (message) {
        message.classList.remove('is-invalid');
    }
    // Descrição
    var description = form.querySelector('[name="description"]');
    if (description && typeof description.value === 'string' && description.value.trim().length < 10) {
        valid = false;
        messages.push("A descrição deve ter pelo menos 10 caracteres.");
        description.classList.add('is-invalid');
    } else if (description) {
        description.classList.remove('is-invalid');
    }
    // Horário
    var schedule = form.querySelector('[name="schedule"]');
    if (schedule && typeof schedule.value === 'string' && schedule.value.trim().length < 5) {
        valid = false;
        messages.push("O horário deve ser preenchido corretamente.");
        schedule.classList.add('is-invalid');
    } else if (schedule) {
        schedule.classList.remove('is-invalid');
    }
    // URL da imagem
    var image = form.querySelector('[name="image"]');
    if (image && typeof image.value === 'string' && image.value.trim() !== "") {
        try {
            new URL(image.value.trim());
            image.classList.remove('is-invalid');
        } catch (e) {
            valid = false;
            messages.push("Insere um URL de imagem válido.");
            image.classList.add('is-invalid');
        }
    }
    // Feedback
    if (!valid) {
        alert(messages.join('\n'));
    }
    return valid;
}

// Aplica validação a todos os formulários relevantes
window.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm(form)) {
                e.preventDefault();
            }
        });
    });
});
