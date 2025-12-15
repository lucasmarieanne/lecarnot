<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Le CARNOT</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/import.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <main class="big-container">
    
        <?php include "./components/navbar.php" ?>

        <section class="form-contact">
            
            <form class="form-contact-container">

                <div class="form-box left">
                    <div class="form-left-card">
                        <div class="form-left-image" />
                    </div>
                </div>
                
                <div class="form-box right">

                    <div class="form-box-content">

                        <div class="form-box-content-title">
                            <h1>Une question ? <br /> Nous sommes là pour vous.</h1>
                            <p>Vous pouvez également nous écrire directement à <span>contact@domaine.com</span>.</p>
                        </div>
                        
                        <div class="form-contact-field">

                            <div class="form-contact-row">
                                <div class="form-contact-input">
                                    <label htmlFor="">Prénom <span>*</span></label>
                                    <div class="form-contact-bg">
                                        <i class="fa-regular fa-user"></i>
                                        <input type="text" placeholder="Votre prénom"/>
                                    </div>
                                </div>

                                <div class="form-contact-input">
                                    <label htmlFor="">Nom <span>*</span></label>
                                    <div class="form-contact-bg">
                                        <i class="fa-regular fa-user"></i>
                                        <input type="text" placeholder="Votre nom"/>
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-contact-input">
                                <label htmlFor="">E-mail <span>*</span></label>
                                <div class="form-contact-bg">
                                    <i class="fa-solid fa-at"></i>
                                    <input type="text" placeholder="Votre adresse e-mail"/>
                                </div>
                            </div>

                            <div class="form-contact-input">
                                <label htmlFor="">Tél <span>*</span></label>
                                <div class="form-contact-bg">
                                    <i class="fa-solid fa-phone"></i>
                                    <input type="text" placeholder="Votre numéro de téléphone"/>
                                </div>
                            </div>

                            <div class="form-contact-input">
                                <label htmlFor="">Message (Optionnel)</label>
                                <div class="form-contact-bg">
                                    <textarea placeholder="Décrivez votre demande..."></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <button class="button-more" type="submit">Envoyer ma demande</button>
                        
                    </div>

                </div>

            </form>
        </section>
    </main>
    
</body>
</html>