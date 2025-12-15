// drag-and-drop.js

const dropZone = document.getElementById('drop-zone');
const fileInput = document.getElementById('files');
const fileList = document.getElementById('file-list');

const dataTransfer = new DataTransfer();

/* Click zone */
dropZone.addEventListener('click', () => fileInput.click());

/* Drag over */
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('dragover');
});

/* Drag leave */
dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('dragover');
});

/* Drop */
dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('dragover');
    addFiles(e.dataTransfer.files);
});

/* Input change */
fileInput.addEventListener('change', () => {
    addFiles(fileInput.files);
});

/* Ajout fichiers */
function addFiles(files) {
    Array.from(files).forEach(file => {
        if (![...dataTransfer.files].some(f => f.name === file.name && f.size === file.size)) {
            dataTransfer.items.add(file);
        }
    });

    fileInput.files = dataTransfer.files;
    renderFileList();
}

/* Supprimer un fichier */
function removeFile(index) {
    dataTransfer.items.remove(index);
    fileInput.files = dataTransfer.files;
    renderFileList();
}

function getFileIcon(fileName) {
    const extension = fileName.split('.').pop().toLowerCase();

    const iconsPath = './assets/icons/'; // adapte le chemin si besoin

    if (extension === 'pdf') {
        return `<img src="${iconsPath}/icon-pdf.png" alt="PDF">`;
    }

    if (extension === 'doc') {
        return `<img src="${iconsPath}/icon-doc.png" alt="DOC">`;
    }

    if (extension === 'docx') {
        return `<img src="${iconsPath}/icon-docx.png" alt="DOCX">`;
    }

    if (extension === 'jpg' || extension === 'jpeg') {
        return `<img src="${iconsPath}/icon-jpg.png" alt="JPG">`;
    }

    if (extension === 'png') {
        return `<img src="${iconsPath}/icon-png.png" alt="PNG">`;
    }

    // Icône par défaut (optionnel)
    return `<img src="${iconsPath}/icon-doc.png" alt="Fichier">`;
}

function getFileIconClass(fileName) {
    const extension = fileName.split('.').pop().toLowerCase();

    if (extension === 'pdf') return 'icon-pdf';
    if (extension === 'doc' || extension === 'docx') return 'icon-doc';
    if (extension === 'jpg' || extension === 'jpeg') return 'icon-jpg';
    if (extension === 'png') return 'icon-png';

    return 'icon-default';
}

function getFileExtension(fileName) {
    return fileName.split('.').pop().toLowerCase();
}

function getFileNameWithoutExtension(fileName) {
    return fileName.replace(/\.[^/.]+$/, '');
}

function formatFileSize(size) {
    if (size < 1024) return size + ' o';
    if (size < 1024 * 1024) return (size / 1024).toFixed(1) + ' Ko';
    return (size / (1024 * 1024)).toFixed(2) + ' Mo';
}

/* Affichage liste */
function renderFileList() {
    fileList.innerHTML = '';

    Array.from(dataTransfer.files).forEach((file, index) => {
        const extension = getFileExtension(file.name);
        const fileName = getFileNameWithoutExtension(file.name);
        const fileSize = formatFileSize(file.size);

        const li = document.createElement('li');
        li.classList.add('file-item');

        li.innerHTML = `
            <div class="file-info">
                <span class="file-icon ${getFileIconClass(file.name)}">
                    ${getFileIcon(file.name)}
                </span>

                <div class="file-extension-size">    
                    <span class="file-name">${fileName}</span>
                    <span class="file-meta">${extension} | ${fileSize}</span>
                </div>
            </div>

            <button type="button" class="file-remove" onclick="removeFile(${index})">
                <i class="fa-solid fa-xmark"></i>
            </button>
        `;

        fileList.appendChild(li);
    });
}
