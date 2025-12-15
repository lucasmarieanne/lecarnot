<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demander un devis - Le CARNOT</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/import.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <main class="big-container">

        <?php include "./components/navbar.php" ?>

        <section class="devis">
            <div class="devis-container">
                
                <div class="devis-box"></div>
                
                <div class="devis-box">

                    <form id="multiStepForm">

                        <!-- Barre d'étapes -->
                        <div class="steps">
                            <div class="step-bulle">
                                <div class="step active" data-step="1">
                                    <i class="fa-regular fa-user"></i>
                                </div>

                                <p>Coordonnées</p>

                            </div>

                            <div class="step-bulle">
                                <div class="step" data-step="2">
                                    <i class="fa-regular fa-comment"></i>
                                </div>

                                <p>Votre devis</p>

                            </div>
                            <div class="step-bulle">
                                <div class="step" data-step="3">
                                    <i class="fa-regular fa-file-zipper"></i>
                                </div>
                                <p>Fichier</p>

                            </div>
                            <div class="step-bulle">
                                <div class="step" data-step="4">
                                    <i class="fa-solid fa-qrcode"></i>
                                </div>
                                <p>Récapitulatif</p>

                            </div>

                        </div>

                        <!-- Étape 1 -->
                        <div class="form-step active" data-step="1">
                            <p class="text-step">Étape 1/4</p>
                            <h2>Coordonnées</h2>

                            <div class="form-step-row space">
                                
                                <div class="form-step-input">
                                    <label for="">Prénom <span>*</span></label>
                                    <div class="form-step-input-bg">
                                        <i class="fa-regular fa-user"></i>
                                        <input type="text" name="prenom" placeholder="Votre prénom" required>
                                    </div>
                                    <small class="input-error"></small>
                                </div>

                                <div class="form-step-input">
                                    <label for="">Nom <span>*</span></label>
                                    <div class="form-step-input-bg">
                                        <i class="fa-regular fa-user"></i>
                                        <input type="text" name="nom" placeholder="Votre nom" required>
                                    </div>
                                    <small class="input-error"></small>
                                </div>

                            </div>

                            <div class="form-step-input">
                                <label for="">E-mail <span>*</span></label>
                                <div class="form-step-input-bg">
                                    <i class="fa-solid fa-at"></i>
                                    <input type="text" name="email" placeholder="Votre adresse e-mail" required>
                                </div>
                                <small class="input-error"></small>
                            </div>

                            <div class="form-step-input">
                                <label for="">Tél <span>*</span></label>
                                <div class="form-step-input-bg">
                                    <i class="fa-solid fa-phone"></i>
                                    <input type="text" name="tel" placeholder="Votre numéro de téléphone" required>
                                </div>
                                <small class="input-error"></small>
                            </div>

                            <div class="form-step-button">
                                <div></div>
                                <button type="button" class="next">
                                    <p>Suivant</p>
                                    
                                    <div class="offer-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 2 -->
                        <div class="form-step" data-step="2">
                            <p class="text-step">Étape 2/4</p>
                            <h2>Votre devis (gratuit)</h2>

                            <div class="form-step-input space">
                                <label for="">Choisissez votre demande de devis <span>*</span></label>
                                <select name="" id="" class="form-step-select-bg">
                                    <option value="">Devis gratuit - Assurance</option>
                                    <option value="">Devis gratuit - Alarme (Homiris)</option>
                                </select>
                            </div>

                            <div class="form-step-input">
                                <label for="">Laissez un message (facultatif)</label>
                                <div class="form-step-textarea-bg">
                                    <textarea name="message" id="" placeholder="Laissez un message..."></textarea>
                                </div>
                            </div>

                            <div class="form-step-button">
                                <button type="button" class="prev">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <p>Retour</p>
                                </button>
                                <button type="button" class="next">
                                    <p>Suivant</p>
                                    
                                    <div class="offer-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 3 -->
                        <div class="form-step" data-step="3">
                            <p class="text-step">Étape 3/4</p>
                            <h2>Télécharger des fichiers <br> (Facultatif)</h2>

                            <!-- Input upload fichiers -->
                            <div class="form-upload space">
                                <!-- <label>Ajouter un ou plusieurs fichiers</label> -->

                                <div class="drop-zone" id="drop-zone">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    <p>
                                        Glissez-déposez vos fichiers ici,
                                        <span>ou cliquez pour parcourir</span>
                                    </p>

                                    <div class="form-text">
                                        <p>Formats acceptés : JPG, PNG, PDF, DOC</p>
                                        <p>(Fichier maximum : 5 Mo)</p>
                                    </div>

                                    <input 
                                        type="file" 
                                        id="files"
                                        name="files[]" 
                                        multiple
                                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                                        hidden
                                    >
                                </div>

                                <ul class="file-list" id="file-list"></ul>

                            </div>

                            <div class="form-step-button">
                                <button type="button" class="prev">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <p>Retour</p>
                                </button>
                                <button type="button" class="next">
                                    <p>Suivant</p>
                                    
                                    <div class="offer-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 4 -->
                        <div class="form-step" data-step="4">
                            <p class="text-step">Étape 4/4</p>
                            <h2>Récapitulatif</h2>



                            <div class="form-step-button">
                                <button type="button" class="prev">
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                    <p>Retour</p>
                                </button>
                                <button type="submit" class="next">
                                    <p>Envoyer</p>
                                    
                                    <div class="offer-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </button>
                            </div>

                        </div>

                        <!-- Étape 5 Traitement -->
                        <div class="form-step" data-step="5">
                            <p class="text-step">Message</p>
                            <h2>En cours d'envoi</h2>

                            <p>Message</p>
                            
                        </div>
                        
                        <!-- Étape 6 Confirmation -->
                        <div class="form-step" data-step="6">
                            <p class="text-step">Confirmation d'envoi</p>
                            <h2>Demande envoyée</h2>

                            <p class="text-step" style="margin-top: 10px;">Votre demande a bien été envoyée. Nous vous recontacterons rapidement.</p>

                            <div class="form-step-button">
                                <a href="<?= url('./') ?>" class="back-home-button">
                                    <p>Retournez à l'accueil</p>
                                    <div class="back-home-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </a>
                            </div>
                            
                        </div>

                        <!-- Étape 7 Erreur -->
                        <div class="form-step" data-step="7">
                            <p class="text-step">Erreur d'envoi</p>
                            <h2>Une erreur est survenue</h2>

                            <p class="text-step" style="margin-top: 10px;">
                                Votre demande n'a pas pu être envoyée.<br>
                                Merci de réessayer ou de nous contacter directement à <span>contact@domaine.com</span>.
                            </p>

                            <div class="form-step-button">
                                <button type="button" class="retry-button">
                                    <p>Réessayer</p>
                                    <div class="offer-button-icon">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </section>

        <!-- <?php include "./components/help.php" ?> -->

    </main>

    <!-- <?php include "./components/footer.php" ?> -->

    <script>window.BASE_URL = "<?= url() ?>";</script>

    <script src="./assets/js/step-form.js"></script>
    <script src="./assets/js/drag-and-drop.js"></script>
    <script src="./assets/js/submit-form.js"></script>
    
</body>
</html>