
// ============================================================
// SCRIPT.JS — Código JavaScript personalizado do Maia GYM
// ============================================================

// Mensagem de carregamento do site (debug)
console.log("MaiaGym website carregado.");

/**
 * Valida os campos de um formulário de contacto ou reserva.
 * Adiciona classes de erro e devolve true/false.
 * @param {HTMLFormElement} form - O formulário a validar
 * @returns {boolean} - true se válido, false se inválido
 */
function validateForm(form) {
    let valid = true;
    let messages = [];
    // Validação do campo Nome
    var name = form.querySelector('[name="name"]');
    if (name && typeof name.value === 'string' && name.value.trim().length < 3) {
        valid = false;
        messages.push("O nome deve ter pelo menos 3 caracteres.");
        name.classList.add('is-invalid');
    } else if (name) {
        name.classList.remove('is-invalid');
    }
    // Validação do campo Email
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
    // Validação do campo Mensagem
    var message = form.querySelector('[name="message"]');
    if (message && typeof message.value === 'string' && message.value.trim().length < 10) {
        valid = false;
        messages.push("A mensagem deve ter pelo menos 10 caracteres.");
        message.classList.add('is-invalid');
    } else if (message) {
        message.classList.remove('is-invalid');
    }
    // Validação do campo Descrição (opcional)
    var description = form.querySelector('[name="description"]');
    if (description && typeof description.value === 'string' && description.value.trim().length < 5) {
        valid = false;
        messages.push("A descrição deve ter pelo menos 5 caracteres.");
        description.classList.add('is-invalid');
    } else if (description) {
        description.classList.remove('is-invalid');
    }
    // Mostra mensagens de erro (pode ser adaptado para mostrar no HTML)
    if (!valid) {
        alert(messages.join("\n"));
    }
    return valid;
}

// Aplica validação a todos os formulários relevantes do site
window.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            // Se o formulário não for válido, impede o envio
            if (!validateForm(form)) {
                e.preventDefault();
            }
        });
    });
});

// ============================================================
// INICIALIZAÇÃO DO CAROUSEL PRINCIPAL (Bootstrap)
// ============================================================
// Garante que o carousel Bootstrap funciona corretamente,
// com avanço automático a cada 15 segundos e botões ativos.
// Adiciona logs para debug e controlo de erros.
document.addEventListener('DOMContentLoaded', function() {
    var carousel = document.getElementById('mainCarousel');
    if (!carousel) {
        console.error('mainCarousel não encontrado no DOM');
        return;
    }
    // Verifica se o Bootstrap Carousel está disponível
    if (typeof bootstrap === 'undefined' || !bootstrap.Carousel) {
        console.error('Bootstrap Carousel não está disponível. Verifique se o JS do Bootstrap foi carregado.');
        return;
    }
    // Destroi instância anterior se existir (evita bugs)
    if (carousel.bsCarousel) {
        carousel.bsCarousel.dispose();
        console.log('Instância anterior do carousel destruída.');
    }
    // Cria nova instância do Bootstrap Carousel
    var bsCarousel = new bootstrap.Carousel(carousel, {
        interval: 15000, // 15 segundos
        ride: 'carousel',
        pause: false,
        wrap: true
    });
    carousel.bsCarousel = bsCarousel;
    console.log('Bootstrap Carousel inicializado com sucesso!', bsCarousel);
    // Garante que os botões de navegação funcionam
    var prevBtn = document.querySelector('.carousel-control-prev');
    var nextBtn = document.querySelector('.carousel-control-next');
    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            bsCarousel.prev();
            console.log('Botão anterior clicado.');
        });
    } else {
        console.warn('Botão .carousel-control-prev não encontrado.');
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            bsCarousel.next();
            console.log('Botão seguinte clicado.');
        });
    } else {
        console.warn('Botão .carousel-control-next não encontrado.');
    }
});
