document.getElementById('multiStepForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    const filesInput = document.getElementById('files');
    if (filesInput && filesInput.files.length > 0) {
        Array.from(filesInput.files).forEach(file => {
            formData.append('files[]', file);
        });
    }

    // 👉 Étape 5 : Traitement (immédiat)
    document.querySelector('.steps').classList.add('processing-mode');
    currentStep = 4; // index 4 = étape 5
    updateSteps();

    fetch(window.BASE_URL + 'assets/ajax/send-mail.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if (data.success) {

            // ⏳ Délai avant confirmation
            setTimeout(() => {

                document.querySelector('.steps').classList.remove('processing-mode');
                document.querySelector('.steps').classList.add('confirmation-mode');

                // 👉 Étape 6 : Confirmation
                currentStep = 5; // index 5 = étape 6
                updateSteps();

                form.reset();

            }, 1000);

        } else {

            // ❌ Mode erreur
            document.querySelector('.steps').classList.remove('processing-mode');
            document.querySelector('.steps').classList.add('error-mode');

            // 👉 Étape 7 : Erreur
            currentStep = 6; // index 6 = étape 7
            updateSteps();
        }
    })

    .catch(err => {
        console.error(err);
        alert('❌ Une erreur est survenue');
    });
});
