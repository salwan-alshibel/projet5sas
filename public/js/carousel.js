/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./resources/js/carousel.js ***!
  \**********************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Carousel = /*#__PURE__*/function () {
  function Carousel(containerId) {
    _classCallCheck(this, Carousel);

    //DOM:
    this.container = document.getElementById(containerId);
    this.slides = this.container.querySelectorAll('#slides .slide'); //this.controls = document.querySelectorAll('.controls');

    this.nextBtn = this.container.querySelector('.carousel-control-next');
    this.previousBtn = this.container.querySelector('.carousel-control-previous');
    this.pauseBtn = this.container.querySelector('.carousel-control-pause'); //Starting values:

    this.currentSlide = 0;
    this.playing = true;
    this.autoSlideChange = null; //Calling methods:

    this.startScrolling();
    this.ifNoContainer();
    this.keyboardControls();
    this.clicBtnNext();
    this.clicBtnPrev();
    this.clickBtnPause();
    this.jsCheckForSlides();
  } //If JS is load :


  _createClass(Carousel, [{
    key: "jsCheckForSlides",
    value: function jsCheckForSlides() {
      var selfThis = this;

      for (var i = 0; i < this.slides.length; i++) {
        selfThis.slides[i].style.position = 'absolute';
      }
    } //If no "id" is specify when creating the object:

  }, {
    key: "ifNoContainer",
    value: function ifNoContainer() {
      if (this.container == false) {
        console.log("Veuillez sélectionner un containerId en paramètre lors de la construction de votre diaporama");
      }
    }
  }, {
    key: "startScrolling",
    value: function startScrolling() {
      //this.pauseBtn.innerHTML = 'Appuyer pour arreter le diaporama';
      this.playing = true; //Changement du statut du défilement automatique.
      //Interval:

      var selfThis = this;
      this.autoSlideChange = setInterval(function () {
        selfThis.nextSlide();
      }, 5000);
    }
  }, {
    key: "stopScrolling",
    value: function stopScrolling() {
      //this.pauseBtn.innerHTML = 'Diaporama en pause.';
      this.playing = false;
      clearTimeout(this.autoSlideChange);
    }
  }, {
    key: "goToSlide",
    value: function goToSlide(n) {
      this.slides[this.currentSlide].className = 'slide';
      this.currentSlide = (n + this.slides.length) % this.slides.length;
      this.slides[this.currentSlide].className = 'slide showing';
    }
  }, {
    key: "nextSlide",
    value: function nextSlide() {
      this.goToSlide(this.currentSlide + 1);
    }
  }, {
    key: "previousSlide",
    value: function previousSlide() {
      this.goToSlide(this.currentSlide - 1);
    }
  }, {
    key: "clicBtnNext",
    value: function clicBtnNext() {
      var selfThis = this;

      this.nextBtn.onclick = function () {
        selfThis.stopScrolling();
        selfThis.nextSlide();
      };
    }
  }, {
    key: "clicBtnPrev",
    value: function clicBtnPrev() {
      var selfThis = this;

      this.previousBtn.onclick = function () {
        selfThis.stopScrolling();
        selfThis.previousSlide();
      };
    }
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