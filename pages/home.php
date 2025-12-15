<?php
if (!defined('APP_INIT')) {
    http_response_code(403);
    exit('Accès interdit');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le CARNOT - Site Officiel</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/import.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <main class="big-container">

        <?php include "./components/navbar.php" ?>

        <section class="home">
            <div class="home-container">

                <div class="home-box left">

                    <div class="home-box-content">

                        <h1>Votre tabac de Référence <span>à Challans</span></h1>
                        
                        <div class="home-box-content-text">
                            <p>Tabac, vape, jeux & confiserie à Challans, portés par l'expérience d'un professionnel reconnu du secteur.</p>
                            <p>Découvrez prochainement notre nouvel espace Presse.</p>
                        </div>
                        
                        <div class="home-button">
                            <div class="home-button-more">
                                <a href="#products">
                                    <p>En savoir plus</p>
                                    
                                    <div class="home-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="home-button-contact">
                                <a href="<?= url('contact') ?>">
                                    <p>Contactez-nous</p>
                                    
                                    <div class="home-button-icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="home-box right">
                    <div class="home-right-card">
                        <div class="home-right-image" />
                    </div>
                </div>

            </div>
        </section>

        <?php include "./components/offer.php" ?>
        <?php include "./components/services.php" ?>

        <section class="shop" id="challans">
            <div class="shop-container">
                <div class="shop-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d957.2143983995325!2d-1.8817403630569145!3d46.847126698497796!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805ab782f82c567%3A0x47adb0d9282d107f!2s34%20Rue%20Carnot%2C%2085300%20Challans!5e1!3m2!1sfr!2sfr!4v1764067033291!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="shop-box">
                    <h1>Notre boutique <br> <span>au cœur de Challans</span> </h1>
                    <p>Votre tabac de référence, situé en plein cœur de Challans depuis plusieurs années.</p>
                </div>
            </div>

            <div class="work-schedule">
                <div class="work-schedule-container">
                    
                    <h1>Horaires d'ouverture</h1>

                    <div class="work-schedule-box">
                        <div class="work-schedule-content">
                            <ul>
                                <li>Lundi</li>
                                <li>Mardi</li>
                                <li>Mercredi</li>
                                <li>Jeudi</li>
                                <li>Vendredi</li>
                                <li>Samedi</li>
                                <li>Dimanche</li>
                            </ul>
                        </div>

                        <div class="work-schedule-content">
                            <ul>
                                <li>6h30 - 19h30</li>
                                <li>6h30 - 19h30</li>
                                <li>6h30 - 19h30</li>
                                <li>6h30 - 19h30</li>
                                <li>6h30 - 19h30</li>
                                <li>6h30 - 19h30</li>
                                <li>8h00 - 12h30</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        <section class="soon">
            <h1>Votre Nouvelle Boutique <span>Arrive Bientôt...</span></h1>
            <p>Explorez dès aujourd'hui les visuels 3D de notre futur espace, — en attendant son ouverture officielle.</p>

            <div class="soon-container">
                    
                <div class="soon-box">

                    <div class="soon-box-left">
                        <img src="./assets/images/2.png" alt="">
                    </div>

                    <div class="soon-box-right" style="text-align: end;">
                        <h2>Extérieur de la boutique</h2>
                        <div class="subtitle">Extérieur — Votre nouvelle façade moderne</div>
                        <p>Un design repensé, lumineux et accueillant pour offrir une meilleure visibilité et une expérience plus chaleureuse dès l’entrée.</p>
                    </div>
                </div>
                <div class="soon-box">
                    <div class="soon-box-right" style="text-align: start;">
                        <h2>Espace Café & Jeux</h2>
                        <div class="subtitle">Espace Café & Jeux</div>
                        <p>Un coin dédié aux moments de détente : café, PMU et services du quotidien dans un cadre moderne et épuré.</p>
                    </div>

                    <div class="soon-box-left">
                        <img src="./assets/images/4.png" alt="">
                    </div>
                    
                </div>
                <div class="soon-box">
                    <div class="soon-box-left">
                        <img src="./assets/images/5.png" alt="">
                    </div>
                    <div class="soon-box-right" style="text-align: end;">
                        <h2>Comptoir & Accueil <br> Clients</h2>
                        <div class="subtitle">Un Comptoir Pensé Pour Vous</div>
                        <p>Un espace d’accueil moderne et fluide pour un service plus rapide, plus agréable et plus intuitif.</p>
                    </div>
                </div>
                <div class="soon-box">
                    <div class="soon-box-right" style="text-align: start;">
                        <h2>Rayon Presse & <br> Magazines</h2>
                        <div class="subtitle">Nouveau Rayon Presse</div>
                        <p>Un espace large, clair et organisé pour découvrir facilement journaux, magazines et nouveautés culturelles.</p>
                    </div>
                    <div class="soon-box-left">
                        <img src="./assets/images/6.png" alt="">
                    </div>
                </div>
                <div class="soon-box">
                    <div class="soon-box-left">
                        <img src="./assets/images/7.png" alt="">
                    </div>
                    <div class="soon-box-right" style="text-align: end;">
                        <h2>Espace Accessoires & Services</h2>
                        <div class="subtitle">Accessoires & Services</div>
                        <p>Une sélection d’accessoires, produits pratiques et solutions du quotidien, présentée dans un espace clair et moderne.</p>
                    </div>
                    
                </div>
                <div class="soon-box">

                    <div class="soon-box-right" style="text-align: start;">
                        <h2>Vue d’Ensemble <br> Intérieur de la Boutique</h2>
                        <div class="subtitle">Une Boutique Repensée Dans Les Moindres Détails</div>
                        <p>Circulation optimisée, mobilier moderne et mise en avant plus claire des produits : une expérience entièrement renouvelée.</p>
                    </div>
                    <div class="soon-box-left">
                        <img src="./assets/images/8.png" alt="">
                    </div>
                </div>

                
            </div>
        </section>
    </main>

    <?php include "./components/footer.php" ?>
    
</body>
</html>