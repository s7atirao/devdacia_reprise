<?php 
$direction="ltr";
if(isset($_GET["lang"]) && $_GET["lang"]=="ar") {
    $direction="rtl";
    $lang="ar";
    $classar='classfr';
    $classfr='';
    include('arabe.php');
}
else{
    $classfr='classfr';
    $classar='';
    $lang="fr";
    include('fr.php');
}
?>
<?php if(isset($_GET["lang"]) && $_GET["lang"]=="ar"): ?>
    <style type="text/css">
        .lp-quizz .faq li.q img{
            float: left;
            -webkit-transform:rotate(180deg);
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    </style>
<?php endif ?>
<!DOCTYPE html>
<html lang="<?php print $lang ?>">
<head>
    <title>M-automotiv REPRISE</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="description">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="shortcut icon" href="data:image">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6172981-9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-6172981-9');
    </script>
</head>

<body dir="<?php print $direction ?>">
    <div class="lp-quizz">
        <nav>
            <h1 class="logo">
                <a title="Dacia succursale" href="https://www.dacia.m-automotiv.ma/">
                    <img src="assets/img/logo_black.svg" alt="Dacia" class="show-for-large">
                </a>
            </h1>

            <div class="main-head">
                <!-- <div class="classlag">
                    <span>
                        <a class="<?php print $classfr ?>" href="?lang=fr" title="francais">FR</a>
                    </span>/
                    <span>
                        <a class="<?php print $classar ?>" href="?lang=ar">AR</a>
                    </span>
                </div> -->
                <span class="sslogan"><a href="https://www.dacia.m-automotiv.ma/">M-automotiv DACIA</a></span>
            </div>
        </nav>

        <header>
            <!-- Banner -->
            <p class="banner" style="float: left;  width:100%">
                <?php print $langue["Simulez la valeur de votre véhicule et gagnez <strong>10 000 DHs</strong> de plus sur la valeur de votre véhicule."] ?>
            </p>

            <!-- Hero -->
            <div class="hero">
                <picture>
                    <source media="(max-width: 520px)" srcset="assets/img/hero_mobile.jpg">
                        <source srcset="assets/img/hero.jpg">
                            <img src="assets/img/hero.jpg" alt="hero">
                        </picture>
                    </div>
                </header>

                <!-- Reprise -->
                <div class="reprise">
                    <p class="title">
                        <strong><?php print $langue["les succursales Dacia"]?></strong>
                        <span><?php print $langue["Renseignez vous sur le prix du marché de votre véhicule et bénéficiez des avantages suivants :"]?></span>
                    </p>
                    <div class="carousel owl-carousel">
                        <div class="item">
                            <div class="content">
                                <div class="image"><img src="assets/img/reprise/handshake.svg" alt="Gratuit"></div>
                                <p class="titre"><?php print $langue["Gratuit"]?></p>
                                <p><?php print $langue["Sans engagement <br> et sans surprises"]?></p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="image"><img src="assets/img/reprise/stopwatch.svg" alt="2 heures"></div>
                                <p class="titre"><?php print $langue["2 heures"]?></p>
                                <p><?php print $langue["Offre de prix <br> sur place en 2 heures"]?></p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="image"><img src="assets/img/reprise/steering-wheel.svg" alt="Livraison"></div>
                                <p class="titre"><?php print $langue["Livraison"]?></p>
                                <p><?php print $langue["Gardez votre ancien véhicule jusqu'à la livraison du nouveau"]?></p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="image"><img src="assets/img/reprise/money.svg" alt="+10.000 Dhs"></div>
                                <p class="titre"><?php print $langue["+10 000 Dhs"] ?></p>
                                <p><?php print $langue["10 000 Dhs de plus <br> du prix du marché"] ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="content">
                                <div class="image"><img src="assets/img/reprise/car.svg" alt="Éligibilité"></div>
                                <p class="titre"><?php print $langue["Éligibilité"]?></p>
                                <p><?php print $langue["Tout véhicule de plus de 10 ans ou enregistrant jusqu’à 160 000 km est éligible"]?></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="reprise.php?lang=<?php print $lang ?>" class="button"><span><?php print $langue["évaluer le prix de mon véhicule"]?></span></a>
                    </div>
                </div>


                <!-- Video -->
                <div class="bloc">
                    <!-- <p class="title"><strong>qui sommes nous ?</strong></p> -->
                    <div class="video">
                        <video width="320" height="240" controls>
                            <source src="medias/Succursale Renault reprise.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="text-center">
                            <a href="reprise.php?lang=<?php print $lang ?>" class="button"><span><?php print $langue["Simuler la valeur de ma voiture"]?></span></a>
                        </div>
                    </div>

                    <!-- How to -->
                    <div class="bloc how-to">
                        <p class="title">
                            <strong><?php print $langue["comment ça marche ?"]?></strong>
                            <span><?php print $langue["Une estimation simple et rapide en 4 étapes"]?></span>
                        </p>
                        <div class="accordion">
                            <div class="accordion__table">
                                <div class="accordion__item show" style="background-image: url(assets/img/steps/etape-1.jpg);">
                                    <div class="accordion__title">
                                        <img src="assets/img/how-to/client.png" alt="Étape 1">
                                        <p><?php print $langue["Étape 1"] ?></p>
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="accordion__content">
                                        <div class="accordion__text">
                                            <img src="assets/img/how-to/client.png" alt="Étape 1">
                                            <p class="titre"><?php print $langue["Accueil du client par le commercial VN ou VO"] ?></p>
                                            <p><?php print $langue["Lors de la découverte client, le commercial propose l’offre de reprise et oriente le client vers l’expertise de son véhicule."] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item" style="background-image: url(assets/img/steps/etape-2.jpg);">
                                    <div class="accordion__title">
                                        <img src="assets/img/how-to/tool.png" alt="Étape 2">
                                        <p><?php print $langue["Étape 2"] ?></p>
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="accordion__content">
                                        <div class="accordion__text">
                                            <img src="assets/img/how-to/tool.png" alt="Étape 2">
                                            <p class="titre"><?php print $langue["Expertise du véhicule"]; ?></p>
                                            <p><?php print $langue["Le véhicule est expertisé par un prestataire externe, plus de 100 points de contrôle sont vérifiés, un rapport est établi et transmis à la cellule de quotation."] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item" style="background-image: url(assets/img/steps/etape-3.jpg);">
                                    <div class="accordion__title">
                                        <img src="assets/img/how-to/money.png" alt="Étape 3">
                                        <p><?php print $langue["Étape 3"] ?></p>
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="accordion__content">
                                        <div class="accordion__text">
                                            <img src="assets/img/how-to/money.png" alt="Étape 3">
                                            <p class="titre"><?php print $langue["Offre de prix de reprise"] ?></p>
                                            <p><?php print $langue["Notre cellule d’experts en quotation se base sur l’état du véhicule et sa valeur sur le marché pour vous faire une offre de reprise."] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item" style="background-image: url(assets/img/steps/etape-4.jpg);">
                                    <div class="accordion__title">
                                        <img src="assets/img/how-to/checklist.png" alt="Étape 4">
                                        <p><?php print $langue["Étape 4"] ?></p>
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="accordion__content">
                                        <div class="accordion__text">
                                            <img src="assets/img/how-to/checklist.png" alt="Étape 4">
                                            <p class="titre"><?php print $langue["Acceptation de l’offre de reprise"] ?></p>
                                            <p><?php print $langue["Une fois l’offre est acceptée par le client et pour lui faciliter la vie, il garde son ancien véhicule jusqu’à livraison du nouveau. Le jour de la livraison du nouveau véhicule, une contre-expertise est faite du véhicule à reprendre sur le site VITA « Ain Sbaa »."] ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-center">
                            <a href="reprise.php?lang=<?php print $lang ?>" class="button"><span><?php print $langue["Simuler la valeur de ma voiture"]?></span></a>
                        </div>
                    </div>


                    <!-- Testimonials -->
                    <div class="bloc testimonials">
                        <div class="row">
                            <div class="col-4">
                                <div class="title-wrapper">
                                    <p class="titre"><?php print $langue["ILS NOUS ONT FAIT CONFIANCE"]?><span><?php print $langue["Rejoignez la liste de nos clients satisfaits"]?></span></p>
                                    <a href="reprise.php?lang=<?php print $lang ?>" class="button first"><span><?php print $langue["Moi aussi"] ?></span></a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="carousel owl-carousel">
                                    <div class="item">
                                        <div class="content">
                                            <p class="text"><?php print $langue["Je suis très satisfait de la prise en charge et les prix proposés sont raisonnables et surtout au prix du marché. Grâce au bonus reprise j’ai pu changer mon ancienne Dacia Logan en nouvelle Dacia Sandero."] ?></p>
                                            <p class="name"><?php print $langue["Khalid"] ?></p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="content">
                                            <p class="text"><?php print $langue["En faisant ma reprise chez les succursales Dacia j’ai eu une offre de prix rapidement et j’ai pu prendre une nouvelle voiture en 48H."] ?></p>
                                            <p class="name"><?php print $langue["Narjiss"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center"><a href="reprise.php?lang=<?php print $lang ?>" class="button second"><span><?php print $langue["Moi aussi"] ?></span></a></div>
                            </div>
                        </div>
                    </div>


                    <!-- FAQ -->
                    <div class="faq-container">
                        <p class="titre">
                            <img src="assets/img/question-mark.svg" alt="">
                            <?php print $langue["Foire aux questions \"reprises\""] ?>
                        </p>
                        <p class="sous-titre"><?php print $langue["Vos questions sur la reprise"] ?></p>
                        <ul class="faq">
                            <li class="q">
                                <p><img src="assets/img/arrow-right.svg" alt=""><?php print $langue["Comment est calculé l'estimation de la valeur de reprise de mon véhicule ?"] ?></p>
                            </li>
                            <li class="a">
                                <?php print $langue["<p>Chez Succursales Dacia, on s’appuie sur plusieurs éléments afin de calculer le prix de reprise , tels que la côte Argus, l’historique des ventes, de même que l’ancienneté de la voiture, de son état mécanique et carroserie ou de son kilométrage.</p>le marché, sa notation générale (un véhicule fiable est forcement plus recherché).</p>"] ?>
                            </li>

                            <li class="q">
                                <p><img src="assets/img/arrow-right.svg" alt=""><?php print $langue["Est-ce que les véhicules de plus de 10 ans sont élligibles à la reprise ?"] ?></p>
                            </li>
                            <li class="a">
                                <p><?php print $langue["Les véhicules éligibles à la reprise ne doivent pas dater de plus de 10 ans et ne doivent pas dépasser un kilométrage de 160 000."] ?></p>
                            </li>

                            <li class="q">
                                <p><img src="assets/img/arrow-right.svg" alt=""><?php print $langue["Comment obtenir l’estimation de la valeur de reprise de mon véhicule ?"] ?></p>
                            </li>
                            <li class="a">
                                <p><?php print $langue["Vous pouvez faire une demande d'estimation de votre véhicule directement depuis le site succursalesdacia.ma pour les véhicules de moins de 10 ans et ne dépassant pas un parcours de 160 000 KM."] ?></p>
                            </li>

                            <li class="q">
                                <p><img src="assets/img/arrow-right.svg" alt=""><?php print $langue["Qui rachète ma voiture ? Comment la transaction est-elle finalisée et avec qui ?"] ?></p>
                            </li>
                            <li class="a">
                                <p><?php print $langue["Dans le cadre de la transaction reprise, aucune procuration n'est utilisée, la carte grise est mutée au nom du concessionnaire Renault/Dacia qui rachète le véhicule."] ?></p>
                            </li>

                            <li class="q">
                                <p><img src="assets/img/arrow-right.svg" alt=""><?php print $langue["Pourquoi faire reprendre mon véhicule par Dacia ?"] ?></p>
                            </li>
                            <li class="a">
                                <p><?php print $langue["Quand on vend son véhicule, on souhaite bien entendu que la transaction se réalise dans les meilleures conditions possibles, que ce soit en termes de délai ou de prix. Avec Dacia c'est :"] ?></p>
                                <ul>
                                    <?php print $langue["<li>Une estimation de reprise transparente et actualisée.</li><li>Une démarche rapide, sécurisée et pratique</li><li>Une reprise faite par un professionnel et en votre présence</li><li>une offre attractive</li>"] ?>
                                </ul>
                            </li>
                        </ul>
                    </div>


                    <!-- News -->

                </div>
                <script src="assets/js/lib/jquery-3.3.1.min.js"></script>
                <script src="assets/js/plugins/owl.carousel.min.js"></script>
                <script src="assets/js/script.min.js"></script>
            </body>

            </html>