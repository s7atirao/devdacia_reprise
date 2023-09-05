"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

$(function () {
  // Reprise
  $('.reprise .owl-carousel').owlCarousel({
    items: 5,
    dots: true,
    nav: false,
    navText: ['&#10094;', '&#10095;'],
    autoplay: true,
    loop: false,
    autoplayTimeout: 7000,
    responsive: {
      0: {
        items: 1,
        nav: true,
        loop: true
      },
      460: {
        items: 2
      },
      768: {
        items: 4
      },
      860: {
        items: 5,
        loop: false
      }
    }
  }); // Testimonials

  $('.testimonials .owl-carousel').owlCarousel({
    items: 1,
    dots: true,
    nav: false,
    navText: ['&#10094;', '&#10095;'],
    autoplay: true,
    // loop           : true,
    autoplayTimeout: 7000,
    responsive: {
      0: {
        items: 1,
        dots: true,
        nav: false
      },
      460: {
        items: 2
      },
      768: {
        items: 2,
        dots: false,
        nav: true
      }
    }
  }); // News

  $('.news .owl-carousel').owlCarousel({
    items: 1,
    dots: true,
    autoplay: true,
    loop: true,
    autoplayTimeout: 7000,
    responsive: {
      0: {
        items: 1
      },
      520: {
        items: 2
      },
      960: {
        items: 3
      }
    }
  }); // How to

  $('.how-to .accordion__item').on('click', function () {
    $('.how-to .accordion__item').removeClass('show');
    $(this).addClass('show');
  });
  //var baseURL = 'https://ref.africavo.ma/api';
  var baseURL = './api/?endpoint';
  var brands = [];
  var brand = '';
  var year = '';
  var km = '';
  var genres = [{
    id: 1,
    libelle: 'Voitures'
  }, {
    id: 2,
    libelle: 'Utilitaires légers'
  }];

  $('#marque option:eq(0)').text('Chargement...');
  fetch(baseURL + "=marques").then(function (response) {
    return response.json();
  }).then(function (data) {
    brands = data.map(function (_ref) {
      var id = _ref.mark_id,
      libelle = _ref.mark;
      return {
        id: id,
        libelle: libelle
      };
    });
    document.getElementById('marque').options.length = 1;
    $('#marque option:eq(0)').text('Marque');
    brands.forEach(function (brand) {
      $('#marque').append($('<option>').val(brand.id).text(brand.libelle));
    });
    $('#marque').parents('.select').removeClass('loading');
    $('#marque').attr('disabled', false);
    $('#marque option:eq(0)').prop('selected', true);
    document.getElementById('modele').options.length = 1;
    $('#modele option:eq(0)').prop('selected', true);
    $('#modele').attr('disabled', true);
  }).catch(function (err) {
    return console.error(err);
  });


  
  $('#marque').on('change', function (event) {
    $('#modele').parents('.select').addClass('loading');
    $('#modele option:eq(0)').text('Chargement...');
    brand = event.target.value;
    fetch(baseURL + "=modeles&marque=" + brand).then(function (response) {
      return response.json();
    }).then(function (data) {
      var models = data.map(function (_ref2) {
        var id = _ref2.model_id,
        libelle = _ref2.model;
        return {
          id: id,
          libelle: libelle
        };
      });
      document.getElementById('modele').options.length = 1;
      $('#modele option:eq(0)').text('Modèle');
      models.forEach(function (model) {
        $('#modele').append($('<option>').val(model.id).text(model.libelle));
      });
      $('#modele').parents('.select').removeClass('loading');
      $('#modele').attr('disabled', false);
      $('#modele option:eq(0)').prop('selected', true);
    }).catch(function (err) {
      return console.error(err);
    });
  });

  $('#modele').on('change', function (event) {
    $('#version').parents('.select').addClass('loading');
    $('#version option:eq(0)').text('Chargement...');
    var carbu;
    var boite;
    carbu = $('input[name=carburant]:checked').val();
    boite = $('input[name=bav]:checked').val();
    
    if(carbu=='diesel') carbu=2;
    if(carbu=='essence') carbu=1;
    if(carbu=='electrique') carbu=4;
    if(carbu=='hybride') carbu=3;


    if(boite=='manuelle') boite=1;
    if(boite=='automatique') boite=2;
    var modele;
    brand = $('#marque').val();
    modele =$('#modele').val();
    year =$('#annee').val();
    km = parseInt($('.output-kilometrage').text() + '0000');

    fetch(baseURL + "=versions&date_mec=" + year + "&genre=" + genres[0].id + "&marque=" + brand+  "&energie=" + carbu+ "&modele=" + modele+"&bav=" + boite +"&km="+km).then(function (response) {
      return response.json();
    }).then(function (data) {
      var versions = data.versions.map(function (_ref3) {
        var id = _ref3.version,
        libelle = _ref3.version;
        return {
          id: id,
          libelle: libelle
        };
      });
      $('#vtoken').val(data.vtoken);
      document.getElementById('version').options.length = 1;
      $('#version option:eq(0)').text('Modèle');
      versions.forEach(function (version) {
        $('#version').append($('<option>').val(version.libelle).text(version.libelle));
      });
      $('#version').parents('.select').removeClass('loading');
      $('#version').attr('disabled', false);
      $('#version option:eq(0)').prop('selected', true);
    }).catch(function (err) {
      return console.error(err);
    });
  });


  if ($('.form').length) {
    var progress = function progress() {
      $('.progress__circle').attr('class', 'progress__circle progress__circle--' + step * 25);
      $('.progress__circle .middle p').text(step * 25 + "%");
      $('#progress-bar').attr('class', 'step-' + step);
    };

    var nextForm = function nextForm() {
      if (step < 3) {
        $forms['form' + step].toggleClass('show');
        $forms['form' + (step + 1)].toggleClass('show');
        $('.forms-wrapper .aos-init').removeClass('aos-init');
        $('.forms-wrapper .aos-animate').removeClass('aos-animate');
        AOS.refresh();
        setTimeout(function () {
          AOS.init({
            once: true,
            easing: 'ease-out'
          });
        }, 100);
        step++;
        progress();
      }
    };

    var prevForm = function prevForm() {
      if (step > 1) {
        $forms['form' + step].toggleClass('show');
        $forms['form' + (step - 1)].toggleClass('show');
        step--;
        progress();
      }
    };
    var prix='';
    var submitForms = function submitForms() {
      $('.form.step-3 .buttons').hide();
      
      fetch(baseURL + "=price&version="+$('#version').val()+"&vtoken="+$('#vtoken').val()).then(function (response) {
        return response.json();
      }).then(function (data) {
        $('.marque').text($('#marque option:selected').text());
        $('.modele').text($('#modele option:selected').text());
        $('.version').text($('#version').val());
        $('.prix').text(new Intl.NumberFormat().format(data.price));
        prix = data.price;
        //console.log(data.price);
        formData.prixestime = $('.prix').text();
        fetch('./send.php', {
          method: 'POST',
          body: JSON.stringify(formData)
        }).then(function (response) {
          if (response.status === 200 || response.status === 201) {
            $forms['form' + step].toggleClass('show');
            $('.confirm').toggleClass('show');
            $('.lenom').html($('input[name=nom]').val());
            $('.confirm').removeClass('aos-init').removeClass('aos-animate');
            AOS.refresh();
            setTimeout(function () {
              AOS.init({
                once: true,
                easing: 'ease-out'
              });
            }, 100);
            step++;
            progress();
          } else {
            $('.form.step-3 .buttons').show();
            $('.form.step-3 .form-error').show();
          }
        }).catch(function (err) {
          $('.form.step-3 .buttons').show();
          $('.form.step-3 .form-error').show();
          console.error(err);
        });
      });


    };

    var formData = {
      annee: '',
      marque: '',
      modele: '',
      immatriculation: '',
      kilometrage: '',
      carburant: '',
      bav: '',
      propriete: '',
      nom: '',
      prenom: '',
      telephone: '',
      ville: '',
      pneus: '',
      carrosserie: '',
      prixestime: ''
    }; // Steps

    var step = 1;
    var $forms = {
      form1: $('form.step-1'),
      form2: $('form.step-2'),
      form3: $('form.step-3')
    };
    $('.buttons .submit').on('click', function (event) {
      event.preventDefault();
      $forms['form' + step].submit();
    });
    $('.buttons .back').on('click', function (event) {
      event.preventDefault();
      prevForm();
    }); // Forms validation

    var thisYear = new Date().getFullYear();
    var years = [].concat(_toConsumableArray(Array(10))).map(function (_, index) {
      return "" + (thisYear - index);
    });
    years.forEach(function (year) {
      $('#annee').append($('<option>').val(year).text(year));
    });
    var form1Validator = $forms.form1.validate({
      rules: {
        annee: 'required',
        marque: 'required',
        modele: 'required',
        version: 'required',
        carburant: 'required',
        bav: 'required',
        kilometrage: 'required'
      },
      messages: {
        annee: 'Merci d\'indiquer l’année d\'immatriculation',
        marque: 'Merci d\'indiquer la marque',
        modele: 'Merci d\'indiquer le modele',
        version: 'Merci d\'indiquer la version',
        carburant: 'Merci d\'indiquer le type de carburant',
        bav: 'Merci d\'indiquer votre boite à vitesse',
        kilometrage: 'Merci d\'indiquer le kilometrage'
      },
      errorElement: 'p',
      errorPlacement: function errorPlacement(error, element) {
        error.insertAfter($(element).parent());
      },
      submitHandler: function submitHandler(form) {
        if (!form.modele.value || !form.marque.value) {
          form1Validator.showErrors({
            marque: 'Merci d\'indiquer la marque',
            modele: 'Merci d\'indiquer le modele'
          });
        } else {
          formData.annee = parseInt(form.annee.value);
          formData.marque = form.marque.options[form.marque.selectedIndex].text;
          formData.modele = form.modele.options[form.modele.selectedIndex].text;
          formData.version = form.version.value;
          formData.carburant = form.carburant.value;
          formData.kilometrage = parseInt($('.output-kilometrage').text() + '0000');
          formData.bav = form.bav.value;
          nextForm();
        }
      }
    });
    $forms.form2.validate({

      // messages: {
      //   kilometrage: 'Merci d\'indiquer le kilometrage'
      // },
      errorElement: 'p',
      errorPlacement: function errorPlacement(error, element) {
        if (element.attr('data-type') === 'select') error.insertAfter($(element).parent());else error.insertAfter(element);
      },
      submitHandler: function submitHandler(form) {

        formData.immatriculation = form.immatriculation.value;
        formData.pneus = form.pneus.value;
        formData.carrosserie = form.carrosserie.value;

        nextForm();
      }
    });
    $.validator.addMethod('custom_phone', function (value) {
      return /^((05)|(06)|(07))[0-9]{8}$/.test(value);
    }, '');
    $forms.form3.validate({
      rules: {
        propriete: 'required',
        nom: 'required',
        prenom: 'required',
        telephone: {
          required: {
            depends: function depends() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          custom_phone: true
        },
        ville: 'required',
        conditions: 'required'
      },
      messages: {
        propriete: '',
        nom: 'Merci d\'indiquer votre nom',
        prenom: 'Merci d\'indiquer votre prénom',
        telephone: 'Merci d\'indiquer votre numéro de téléphone',
        ville: 'Merci d\'indiquer votre ville',
        conditions: 'Merci d\'accepter les conditions générales d\'utilisation'
      },
      errorElement: 'p',
      highlight: function highlight(element) {
        if ($(element).attr('type') === 'checkbox') $(element).parents('.form-control').addClass('error');else $(element).addClass('error');
      },
      unhighlight: function unhighlight(element) {
        if ($(element).attr('type') === 'checkbox') $(element).parents('.form-control').removeClass('error');else $(element).removeClass('error');
      },
      submitHandler: function submitHandler(form) {
        formData.nom = form.nom.value;
        formData.prenom = form.prenom.value;
        formData.telephone = form.telephone.value;
        formData.ville = form.ville.value;
        formData.propriete = form.propriete.value === 'oui';
        submitForms();
      }
    });
  } // FAQ


  $('.faq li.q').on('click', function () {
    $(this).next().slideToggle('500').siblings('li.a').slideUp();
  }); // Range

  if ($('.kilometrage').length) {
    $('.kilometrage').createSlide({
      output: '.output-kilometrage',
      firstvalue: 1,
      maxvalue: 16
    });
  }

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  if(urlParams.has('firstname')) $($forms.form3[0]['nom']).val(urlParams.get('lastname'));
  if(urlParams.has('firstname')) $($forms.form3[0]['prenom']).val(urlParams.get('firstname'));
  if(urlParams.has('firstname')) $($forms.form3[0]['telephone']).val(urlParams.get('phone'));
});