const steps = document.querySelectorAll(".step");
const formSteps = document.querySelectorAll(".form-step");
const nextBtns = document.querySelectorAll(".next");
const prevBtns = document.querySelectorAll(".prev");

let currentStep = 0;
let step1Submitted = false;

/* ---------------------------
   SAUVEGARDE DES ICÔNES
--------------------------- */
steps.forEach(step => {
    step.dataset.originalIcon = step.innerHTML;
});

/* ---------------------------
   VALIDATION ÉTAPE 1
--------------------------- */
const step1 = document.querySelector('.form-step[data-step="1"]');
const step1Inputs = step1.querySelectorAll('input[required]');
const step1NextBtn = step1.querySelector('.next');

/* ---------------------------
   FORMAT EMAIL & TÉL EN DIRECT
--------------------------- */
const emailInput = step1.querySelector('input[name="email"]');
const phoneInput = step1.querySelector('input[name="tel"]');

/* Format téléphone en direct */
phoneInput.addEventListener('input', () => {
    phoneInput.value = formatPhone(phoneInput.value);
});

/* Bouton désactivé par défaut */
step1NextBtn.classList.add('disabled');

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function formatPhone(value) {
    // Supprime tout sauf chiffres
    let digits = value.replace(/\D/g, '').slice(0, 10);

    // Ajoute un espace tous les 2 chiffres
    return digits.replace(/(\d{2})(?=\d)/g, '$1 ').trim();
}

function validateStep1(showErrors = false) {
    let isValid = true;

    step1Inputs.forEach(input => {
        const wrapper = input.closest('.form-step-input');
        const errorEl = wrapper.querySelector('.input-error');
        const value = input.value.trim();

        // Champ vide
        if (value === '') {
            isValid = false;

            if (showErrors) {
                wrapper.classList.add('error');
                errorEl.textContent = 'Ce champ est requis';
            }
            return;
        }

        // Validation email
        if (input.name === 'email' && !isValidEmail(value)) {
            isValid = false;

            if (showErrors) {
                wrapper.classList.add('error');
                errorEl.textContent = 'Adresse e-mail invalide';
            }
            return;
        }

        // Validation téléphone (10 chiffres)
        if (input.name === 'tel') {
            const digits = value.replace(/\D/g, '');

            if (digits.length !== 10) {
                isValid = false;

                if (showErrors) {
                    wrapper.classList.add('error');
                    errorEl.textContent = 'Numéro invalide (10 chiffres requis)';
                }
                return;
            }
        }

        // Champ valide
        wrapper.classList.remove('error');
        errorEl.textContent = '';
    });

    /* Bouton suivant */
    if (isValid) {
        step1NextBtn.classList.remove('disabled');
    } else {
        step1NextBtn.classList.add('disabled');
    }

    return isValid;
}

/* Validation live (sans afficher d’erreur tant que pas cliqué) */
step1Inputs.forEach(input => {
    input.addEventListener('input', () => {
        validateStep1(step1Submitted);
    });
});

/* ---------------------------
   VALIDATION ÉTAPE 2
--------------------------- */
const step2 = document.querySelector('.form-step[data-step="2"]');
const step2Select = step2.querySelector('select[name="devis"]');
const step2NextBtn = step2.querySelector('.next');

let step2Submitted = false;

/* Bouton désactivé par défaut */
step2NextBtn.classList.add('disabled');

function validateStep2(showErrors = false) {
    let isValid = true;

    const wrapper = step2Select.closest('.form-step-input');
    const errorEl = wrapper.querySelector('.input-error');

    if (step2Select.value === '') {
        isValid = false;

        if (showErrors) {
            wrapper.classList.add('error');
            errorEl.textContent = 'Veuillez sélectionner une option';
        }
    } else {
        wrapper.classList.remove('error');
        errorEl.textContent = '';
    }

    /* Bouton suivant */
    if (isValid) {
        step2NextBtn.classList.remove('disabled');
    } else {
        step2NextBtn.classList.add('disabled');
    }

    return isValid;
}

/* Validation live (après tentative uniquement) */
step2Select.addEventListener('change', () => {
    validateStep2(step2Submitted);
});


/* ---------------------------
   GESTION DES ÉTAPES
--------------------------- */
function updateSteps() {

    formSteps.forEach((step, index) => {
        step.classList.toggle("active", index === currentStep);
    });

    steps.forEach((step, index) => {

        const isActive = index === currentStep;
        const isCompleted = index < currentStep;

        step.classList.toggle("active", isActive);
        step.classList.toggle("completed", isCompleted);

        step.innerHTML = isCompleted
            ? '<i class="fa-solid fa-check"></i>'
            : step.dataset.originalIcon;
    });
}

/* ---------------------------
   NAVIGATION
--------------------------- */
const MAX_MANUAL_STEP = 3; // étapes 1 → 4

nextBtns.forEach(btn => {
    btn.addEventListener("click", () => {

        /* Étape 1 */
        if (currentStep === 0) {
            step1Submitted = true;
            if (!validateStep1(true)) return;
        }

        /* Étape 2 */
        if (currentStep === 1) {
            step2Submitted = true;
            if (!validateStep2(true)) return;
        }

        if (currentStep < MAX_MANUAL_STEP) {
            currentStep++;
            updateSteps();
        }
    });
});

prevBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        if (currentStep > 0) {
            currentStep--;
            updateSteps();
        }
    });
});

/* Init */
updateSteps();
