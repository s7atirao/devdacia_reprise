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
  }); // Get brands

  var brands = [];
  fetch('./data/brands.json').then(function (response) {
    return response.json();
  }).then(function (data) {
    brands = data.map(function (brand) {
      return {
        name: brand.marque,
        models: brand.versions.map(function (version) {
          return version.model;
        })
      };
    });
    brands.forEach(function (brand) {
      $('#marque').append($('<option>').val(brand.name).text(brand.name));
    });
  }).catch(function (err) {
    return console.error(err);
  });
  $('#marque').on('change', function (event) {
    var models = brands.find(function (brand) {
      return brand.name === event.target.value;
    }).models;
    $('#modele').attr('disabled', false);
    document.getElementById('modele').options.length = 1;
    $('#modele option:eq(0)').prop('selected', true);
    models.forEach(function (model) {
      $('#modele').append($('<option>').val(model).text(model));
    });
  });

  $('#model').on('change', function (event) {
    var models = brands.find(function (brand) {
      return brand.name === event.target.value;
    }).models;
    $('#modele').attr('disabled', false);
    document.getElementById('modele').options.length = 1;
    $('#modele option:eq(0)').prop('selected', true);
    models.forEach(function (model) {
      $('#modele').append($('<option>').val(model).text(model));
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

    var submitForms = function submitForms() {
      $('.form.step-3 .buttons').hide();
      fetch('./send.php', {
        method: 'POST',
        body: JSON.stringify(formData)
      }).then(function (response) {
        if (response.status === 200 || response.status === 201) {
          $forms['form' + step].toggleClass('show');
          $('.confirm').toggleClass('show');
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
    }; // $('input[name=propriete]').on('change', function() {
    //  if ($('.hidden').length) {
    //    $('.hidden').toggleClass('hidden');
    //    $('.info-form .aos-init').removeClass('aos-init');
    //    $('.info-form .aos-animate').removeClass('aos-animate');
    //    AOS.refresh()
    //    setTimeout(() => {
    //      AOS.init({
    //        once  : true,
    //        easing: 'ease-out'
    //      });
    //    }, 100);
    //  }
    // })


    // Steps
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

    var formData = {
      marque: '',
      modele: '',
      version: '',
      annee: '',
      immatriculation: '',
      kilometrage: '',
      carburant: '',
      bav: '',
      pneus: '',
      carrosserie: '',
      propriete: '',
      nom: '',
      email: '',
      prenom: '',
      telephone: '',
      ville: ''
    };
    $forms.form1.validate({
      rules: {
        marque: 'required',
        modele: 'required',
        version: 'required',
      },
      messages: {
        marque: 'Merci d\'indiquer la marque',
        modele: 'Merci d\'indiquer le modele',
        version: 'Merci d\'indiquer la version'
      },
      errorElement: 'p',
      errorPlacement: function errorPlacement(error, element) {
        error.insertAfter($(element).parent());
      },
      submitHandler: function submitHandler(form) {
        formData.marque = form.marque.value;
        formData.modele = form.modele.value;
        formData.version = form.version.value;
        if($('#marque').val().toUpperCase() == "RENAULT" || $('#marque').val().toUpperCase() == "DACIA") {
          $('.immatriculationlabel').text('Numéro de chassis');
        } else {
          $('.immatriculationlabel').text('Numéro de chassis (Information non obligatoire)');
        }
        nextForm();
      }
    });
    var thisYear = new Date().getFullYear();
    var years = [].concat(_toConsumableArray(Array(10))).map(function (_, index) {
      return "" + (thisYear - index);
    });
    years.forEach(function (year) {
      $('#annee').append($('<option>').val(year).text(year));
    });
    $forms.form2.validate({
      rules: {
        annee: 'required',
        kilometrage: 'required',
        carburant: 'required',
        bav: 'required',
        immatriculation: {
          required:{
            depends: function(element) {
              if($('#marque').val().toUpperCase() == "RENAULT" || $('#marque').val().toUpperCase() == "DACIA") {
                return true;
              } else {
                return false;
              }
            }
          }
        }
      },
      messages: {
        annee: 'Merci d\'indiquer l’année d\'immatriculation',
        kilometrage: 'Merci d\'indiquer le kilometrage',
        carburant: 'Merci d\'indiquer le type de carburant',
        bav: 'Merci d\'indiquer votre marque',
        immatriculation: 'Merci d\'indiquer votre immatriculation'
      },
      errorElement: 'p',
      errorPlacement: function errorPlacement(error, element) {
        if (element.attr('data-type') === 'select') error.insertAfter($(element).parent());else error.insertAfter(element);
      },
      submitHandler: function submitHandler(form) {
        formData.annee = parseInt(form.annee.value);
        formData.kilometrage = parseInt($('.output-kilometrage').text() + '0000');
        formData.carburant = form.carburant.value;
        formData.bav = form.bav.value;
        formData.pneus = form.pneus.value;
        formData.carrosserie = form.carrosserie.value;
        formData.immatriculation = form.immatriculation.value;
        nextForm();
      }
    });
    $.validator.addMethod('custom_email', function (value) {
      return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, '');
    $.validator.addMethod('custom_phone', function (value) {
      return /^((05)|(06)|(07))[0-9]{8}$/.test(value);
    }, '');
    $forms.form3.validate({
      rules: {
        propriete: 'required',
        nom: 'required',
        prenom: 'required',
        email: {
          required: {
            depends: function depends() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          custom_email: true
        },
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
        email: 'Merci d\'indiquer votre e-mail',
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
        formData.email = form.email.value;
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
});