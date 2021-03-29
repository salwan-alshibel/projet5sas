/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./resources/js/carousel.js ***!
  \**********************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

//-----------DIAPORAMA-------------//
//-----------------------//
//--- Carousel Objet ---//
//-----------------------//
//Logique générale : on change la class HTML du slide que l'on veut afficher.
//Tous les slides ont un z-index de 1, sauf le slide apparant (.showing) qui à un z-index de 2
var Carousel = /*#__PURE__*/function () {
  function Carousel(containerId) {
    _classCallCheck(this, Carousel);

    //Eléments du DOM:
    this.container = document.getElementById(containerId);
    this.slides = this.container.querySelectorAll('#slides .slide');
    this.controls = document.querySelectorAll('.controls');
    this.nextBtn = this.container.querySelector('.carousel-control-next');
    this.previousBtn = this.container.querySelector('.carousel-control-previous');
    this.pauseBtn = this.container.querySelector('.carousel-control-pause'); //Valeurs de départ du Carousel:

    this.currentSlide = 0;
    this.playing = true; //Statut du défilement automatique

    this.autoSlideChange = null; //Appel des méthodes:

    this.startScrolling();
    this.ifNoContainer();
    this.keyboardControls();
    this.clicBtnNext();
    this.clicBtnPrev();
    this.clickBtnPause();
    this.jsCheckForSlides();
  } //Positionement des slides si JS est bien chargé :


  _createClass(Carousel, [{
    key: "jsCheckForSlides",
    value: function jsCheckForSlides() {
      var selfThis = this;

      for (var i = 0; i < this.slides.length; i++) {
        selfThis.slides[i].style.position = 'absolute';
      }
    } // Méthode si aucun ID n'est spécifié à la création d'un nouveau diaporama:

  }, {
    key: "ifNoContainer",
    value: function ifNoContainer() {
      if (this.container == false) {
        console.log("Veuillez sélectionner un containerId en paramètre lors de la construction de votre diaporama");
      }
    } //Défilement automatique:

  }, {
    key: "startScrolling",
    value: function startScrolling() {
      //this.pauseBtn.innerHTML = 'Appuyer pour arreter le diaporama';
      this.playing = true; //Changement du statut du défilement automatique.
      //Interval de défilement automatique:

      var selfThis = this;
      this.autoSlideChange = setInterval(function () {
        selfThis.nextSlide();
      }, 5000);
    } //Arret du défilement automatique:

  }, {
    key: "stopScrolling",
    value: function stopScrolling() {
      //this.pauseBtn.innerHTML = 'Diaporama en pause.';
      this.playing = false; //Arret du défilement automatique:

      clearTimeout(this.autoSlideChange);
    } //Méthode principale de changement de slide:

  }, {
    key: "goToSlide",
    value: function goToSlide(n) {
      this.slides[this.currentSlide].className = 'slide';
      this.currentSlide = (n + this.slides.length) % this.slides.length;
      this.slides[this.currentSlide].className = 'slide showing';
    } //Méthode pour avancer d'un slide:

  }, {
    key: "nextSlide",
    value: function nextSlide() {
      this.goToSlide(this.currentSlide + 1);
    } //Méthode pour reculer d'un slide:

  }, {
    key: "previousSlide",
    value: function previousSlide() {
      this.goToSlide(this.currentSlide - 1);
    } //Methode lors du clic sur bouton avancer

  }, {
    key: "clicBtnNext",
    value: function clicBtnNext() {
      var selfThis = this;

      this.nextBtn.onclick = function () {
        selfThis.stopScrolling();
        selfThis.nextSlide();
      };
    } //Methode lors du clic sur bouton reculer

  }, {
    key: "clicBtnPrev",
    value: function clicBtnPrev() {
      var selfThis = this;

      this.previousBtn.onclick = function () {
        selfThis.stopScrolling();
        selfThis.previousSlide();
      };
    } //Méthode lors du clic sur le bouton pause

  }, {
    key: "clickBtnPause",
    value: function clickBtnPause() {
      var selfThis = this;

      this.pauseBtn.onclick = function () {
        if (selfThis.playing) {
          selfThis.stopScrolling();
        } else {
          selfThis.startScrolling();
        }
      };
    }
  }, {
    key: "keyboardControls",
    value: function keyboardControls() {
      var selfThis = this;
      document.addEventListener('keydown', function (e) {
        //Si le paramètre "e" n'est pas géré par le navigateur, on récupère la propriété window.event.
        //e = e || window.event;
        if (e.keyCode === 37) {
          // Si la touche est la fleche gauche
          selfThis.stopScrolling();
          selfThis.previousSlide();
          ;
        } else if (e.keyCode === 39) {
          // Si la touche est la fleche droite
          selfThis.stopScrolling();
          selfThis.nextSlide();
        } else if (e.keyCode === 32) {
          e.preventDefault(); // Si la touche est la barre espace

          if (selfThis.playing) {
            selfThis.stopScrolling();
          } else {
            selfThis.startScrolling();
          }
        }

        ;
      }, false);
    }
  }]);

  return Carousel;
}();

var Carousel1 = new Carousel("carousel");
/******/ })()
;