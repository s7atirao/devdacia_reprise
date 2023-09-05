<!DOCTYPE html>
<html lang="fr">

<head>
    <title>SUCCURSALES REPRISE</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="description">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
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

<body>
    <div class="lp-quizz">
        <nav>
            <h1 class="logo">
                <a title="Renault succursale" href="https://www.succursalesdacia.ma/">
                    <img src="assets/img/logo_black.svg" alt="Renault" class="show-for-large">
                    
                </a>
            </h1>
            <div class="main-head">
                <span class="sslogan"><a href="https://www.succursalesrenault.ma/">Succursales - DACIA Maroc</a></span>
            </div>
        </nav>

        <header>
            <!-- Banner -->
            <!-- <p class="banner" data-aos="fade-down"  style="float: left; width:100%">Simulez la valeur de votre véhicule et gagnez <strong>8 000 DHs</strong> de plus sur la valeur de votre véhicule.</p> -->

            <!-- Hero -->
            <div class="hero" data-aos="fade-down" data-aos-delay="100">
                <img src="assets/img/hero.jpg" alt="hero">
            </div>
        </header>

        <!-- Progress bar -->
        <div id="progress-bar" class="step-0" data-aos="fade-down" data-aos-delay="200">
            <p class="progress__title">Mon évolution</p>
            <div class="track">
                <span class="bar"></span>
                <!-- <span class="dot first">25%</span>
        <span class="dot second">50%</span>
        <span class="dot third">75%</span> -->
        <span class="dot first"></span>
        <span class="dot second"></span>
        <span class="dot third"></span>
    </div>
    <p class="progress__text">*Sauvegarde automatique</p>
</div>

<div class="container">
  <div class="row quizz-wrapper">
      <div class="col-6">
          <!-- Progress -->
          <div class="progress" data-aos="fade">
              <p class="progress__title">Mon évolution</p>
              <div class="progress__circle progress__circle--10">
                  <div class="right"></div>
                  <div class="left"></div>
                  <div class="middle">
                      <p>10%</p>
                  </div>
                  <div class="popover"></div>
              </div>
              <p class="progress__text">*Sauvegarde automatique</p>
          </div>

      </div>
      <div class="col-6 forms-wrapper">
          <!-- Form -->
          <div class="step-0 show">
            <p class="form-title">Vous souhaitez?</p>
            <div class="choises">
              <a href="javascript:;" class="item" data-value="0"><span><img src="assets/img/money.svg" />Vendre votre voiture</span></a>
              <a href="javascript:;" class="item" data-value="1"><span><img src="assets/img/trade.svg" />Faire une reprise avec un véhicule neuf</span></a>
            </div>
          </div>
          <form class="form step-1">
              <input type="hidden" name="commercial" id="commercial" value="web">
              <p class="form-title">Renseignez les informations de votre véhicule et découvrez son prix estimatif !</p>
              <!-- <p class="form-title">J’identifie mon véhicule actuel<span>Renseignez le véhicule avec lequel vous souhaitez faire une reprise</span></p> -->
              <div class="form-control">
                  <label for="annee">Sélectionnez l’année de votre véhicule *</label>
                  <div class="select">
                      <select name="annee" id="annee" data-type="select" class="custom-select">
                          <option value="" selected disabled>Année</option>
                      </select>
                  </div>
              </div>
              <div class="form-control">
                  <label for="carburant">Sélectionnez la puissance de votre moteur*</label>
                  <div class="select">
                      <select name="pow" id="pow"  data-type="select" class="custom-select">
                          <option value="" selected disabled>Puissance</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                      </select>
                  </div>
              </div>
              <div class="form-control radio-button-group">
                  <label for="carburant">Sélectionnez le type de carburant*</label>
                  <div class="item">
                      <input type="radio" name="carburant" value="diesel" checked class="carburant">
                      <span></span>
                      <strong>Diesel</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="carburant" value="essence" class="carburant">
                      <span></span>
                      <strong>Essence</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="carburant" value="electrique" class="carburant">
                      <span></span>
                      <strong>Électrique</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="carburant" value="hybride" class="carburant">
                      <span></span>
                      <strong>Hybride</strong>
                  </div>
              </div>
              <div class="form-control radio-button-group">
                  <label for="bav">Sélectionnez la boite à vitesse *</label>
                  <div class="item">
                      <input type="radio" name="bav" value="manuelle" checked>
                      <span></span>
                      <strong>Manuelle</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="bav" value="automatique">
                      <span></span>
                      <strong>Automatique</strong>
                  </div>
              </div>
              <div class="form-control">
                  <input type="text" name="kilometrage" id="kilometrage" value="5000" hidden>
                  <label for="kilometrage">Combien de kilométres a votre véhicule ? *</label>
                  <p class="kilometrage-text">0 KM - 10 000 KM</p>
                  <div class="kilometrage"></div>
              </div>
              <div class="form-control">
                  <label for="marque">Sélectionnez la marque de votre véhicule *</label>
                  <div class="select">
                      <select name="marque" id="marque" disabled class="custom-select">
                          <option value="" selected disabled>Marque</option>
                      </select>
                  </div>
              </div>
              <div class="form-control">
                  <label for="modele">Sélectionnez le modèle de votre véhicule *</label>
                  <div class="select">
                      <select name="modele" id="modele" disabled class="custom-select">
                          <option value="" selected disabled>Modèle</option>
                      </select>
                  </div>
              </div>

              <div class="form-control">
                  <label for="version">Sélectionnez la version de votre véhicule *</label>
                  <div class="select">
                      <select name="version" id="version" disabled class="custom-select">
                          <option value="" selected disabled>Version</option>
                      </select>
                  </div>
              </div>
              <p class="asterisk text-left">* Champs obligatoires</p>
              <div class="buttons row">
                  <a href="javascript:;" class="button submit"><span>Suivant</span></a>
              </div>
              <input type="hidden" name="vtoken" id="vtoken" value="">
          </form>

          <form class="form step-2" data-aos="fade">
              <p class="form-title">Je décris mon véhicule<span>Donnez-nous plus d’informations sur l’état de votre véhicule</span></p>
              <div class="form-control" data-aos="fade-right" data-aos-delay="100">
                  <label for="">Immatriculation (Information non obligatoire)</label>
                  <input type="text" name="immatriculation" data-mask="00000-S-0" placeholder="00000-A-0">
              </div>
              <div class="form-control radio-button-group" data-aos="fade-right" data-aos-delay="700">
                  <label for="bav">L’état des pneus de votre véhicule : *</label>
                  <div class="item">
                      <input type="radio" name="pneus" value="bon" checked>
                      <span></span>
                      <strong>Bon</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="pneus" value="moyen">
                      <span></span>
                      <strong>Moyen</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="pneus" value="mauvais">
                      <span></span>
                      <strong>Mauvais</strong>
                  </div>
              </div>
              <div class="form-control radio-button-group" data-aos="fade-right" data-aos-delay="800">
                  <label for="bav">L’état de la carrosserie de votre véhicule : *</label>
                  <div class="item">
                      <input type="radio" name="carrosserie" value="bon" checked>
                      <span></span>
                      <strong>Bon</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="carrosserie" value="moyen">
                      <span></span>
                      <strong>Moyen</strong>
                  </div>
                  <div class="item">
                      <input type="radio" name="carrosserie" value="mauvais">
                      <span></span>
                      <strong>Mauvais</strong>
                  </div>
              </div>

              <p class="asterisk">* Champs obligatoires</p>
              <div class="buttons row">
                  <div class="col-3 col-m-3 text-left">
                      <a href="javascript:;" class="back"><img src="assets/img/arrow-right.svg" alt=""><span>Retour</span></a>
                  </div>
                  <div class="col-9 col-m-9 text-right"><a href="javascript:;" class="button submit"><span>Suivant</span></a></div>
              </div>
          </form>

          <form class="form step-3" data-aos="fade">
              <p class="form-title">Je renseigne mes informations de contact</p>
              <p class="form-error">Erreur d'inscription essayez à nouveau</p>
              <div class="info-form hidden">
                  <div class="form-control" data-aos="fade-right" data-aos-delay="100">
                      <label for="nom">Nom*</label>
                      <input type="text" name="nom">
                  </div>
                  <div class="form-control" data-aos="fade-right" data-aos-delay="200">
                      <label for="prenom">Prénom*</label>
                      <input type="text" name="prenom">
                  </div>
                  <div class="form-control" data-aos="fade-right" data-aos-delay="300">
                      <label for="telephone">Téléphone*</label>
                      <input type="tel" name="telephone">
                  </div>
                  <div class="form-control" data-aos="fade-right" data-aos-delay="300">
                      <label for="mail">E-mail*</label>
                      <input type="email" name="mail">
                  </div>
                  <div class="form-control" data-aos="fade-right" data-aos-delay="400">
                      <label for="ville">Ville*</label>
                      <input type="text" name="ville">
                  </div>
                  <div class="form-control radio-button-group" data-aos="fade-right" data-aos-delay="500">
                      <label for="propriete">Êtes-vous le propriétaire du véhicule ?*</label>
                      <div class="item">
                          <input type="radio" name="propriete" value="oui" checked>
                          <span></span>
                          <strong>Oui</strong>
                      </div>
                      <div class="item">
                          <input type="radio" name="propriete" value="non">
                          <span></span>
                          <strong>Non</strong>
                      </div>
                  </div>
                  <div class="form-control checkbox" data-aos="fade-right" data-aos-delay="600">
                      <label>
                          J'ai lu et j'accepte <a href="https://www.succursalesrenault.ma/pages/informations_legales" target="_blank">les conditions générales d'utilisation</a>
                          <input type="checkbox" name="conditions">
                          <span></span>
                      </label>
                  </div>
                  <div data-aos="fade-up" data-aos-delay="600">
                      <p class="asterisk">* Champs obligatoires</p>
                      <div class="buttons row">
                          <div class="col-3 col-m-3 text-left">
                              <a href="javascript:;" class="back"><img src="assets/img/arrow-right.svg" alt=""><span>Retour</span></a>
                          </div>
                          <div class="col-9 col-m-9 text-right"><a href="javascript:;" class="button submit"><span>Je découvre mon estimation</span></a></div>
                      </div>
                      <p class="law-text">Par le biais de ce formulaire, RENAULT COMMERCE MAROC collecte vos données personnelles dans le cadre de la gestion des clients conformément à la délibération N° 32-2015 du 13/02/2015 portant modèle de déclaration type concernant les traitements de données à caractère personnel. Ce traitement a fait l’objet d’une déclaration auprès de la CNDP sous le numéro D-GC-419/2017. Ces données sont confidentielles et pourront être communiquées à RENAULT (maison mère en France), ainsi qu’a tout tiers en relation commerciale avec RENAULT et RENAULT COMMERCE MAROC liés par un engagement de confidentialité conformément à la demande de transfert déposée auprès de la CNDP. Vous pouvez exercer vos droits d’accès, de rectification et d’opposition conformément aux dispositions de la loi 09-08 en vous adressant à : RENAULT COMMERCE MAROC - Direction Clients et Qualité, 44 avenue Khalid Ibnou El Oualid, Ain Sebaa, Casablanca, ou par courrier électronique à : <strong><a href="mailto:monserviceclient@renault.com">monserviceclient@renault.com</a></strong>.</p>
                  </div>
              </div>
          </form>

          <div class="confirm" data-aos="zoom-in">
              <img src="assets/img/confirm.svg" alt="">
              <p>
                  Félicitation Mme/Mr <span class="lenom"></span> <br>
                  Votre demande de cotation est bien enregistrée. <br>
                  La valeur estimée vous sera envoyée par SMS sur le numéro de téléphone que vous avez renseigné.
              </p>
              <p>
                  <u>N.B : Pour toute réclamation ou assistance, merci de contacter notre service clientèle au <a href="tel:0520482000">05 20 48 20 00</a></u>
              </p>
              <span class="prix" style="display: none;"></span>
              <div class="powered" style="margin: 4rem 0 0 0;">
                  <p>
                      Powered by
                  </p>
                  <img src="./assets/img/moteur.svg">
              </div>
              <!-- <p>
                  Les informations ont bien été enregistrés, <br>
                  Votre véhicule <span class="marque"></span> <span class="modele"></span> <span class="version"></span> à été estimé à <b><span class="prix"></span> MAD </b><br>
              Un de nos conseillers va vous contacter dans le plus bref des délais pour donner suite à votre demande.</p>-->
          </div>
          <div class="confirm-trade">
            <img src="assets/img/confirm.svg" alt="">
            <p>Felicitations, votre cotation est prête.</p>
            <br><br>
            <p>Vous serez redirigé vers la plateforme Onlinestore dans quelques instants</p>
          </div>
      </div>
  </div>
</div>
</div>
<script src="assets/js/lib/jquery-3.3.1.min.js"></script>
<script src="assets/js/lib/jquery-migrate-3.0.0.js"></script>
<script src="assets/js/lib/jquery.mobile.custom.min.js"></script>
<script src="assets/js/plugins/jquery-ui.js"></script>
<script src="assets/js/lib/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/plugins/jquery.validate.min.js"></script>
<script src="assets/js/plugins/jquery.mask.min.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/owl.carousel.min.js"></script>
<!-- <script src="assets/js/script.js"></script> -->
<script src="assets/js/script2.js"></script>
<script src="assets/js/lib/aos.js"></script>
<script>
    AOS.init({
        once: true,
        easing: 'ease-out'
    });
</script>
</body>

</html>