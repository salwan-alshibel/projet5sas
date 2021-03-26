//-----------DIAPORAMA-------------//

//-----------------------//
//--- Carousel Objet ---//
//-----------------------//

//Logique générale : on change la class HTML du slide que l'on veut afficher.
//Tous les slides ont un z-index de 1, sauf le slide apparant (.showing) qui à un z-index de 2


class Carousel {

    constructor(containerId) {

        //Eléments du DOM:
        this.container = document.getElementById(containerId);
        this.slides = this.container.querySelectorAll('#slides .slide');
        this.controls = document.querySelectorAll('.controls');
        this.nextBtn = this.container.querySelector('.next');
        this.previousBtn = this.container.querySelector('.previous');
        this.pauseBtn = this.container.querySelector('.pause');

        //Valeurs de départ du Carousel:
        this.currentSlide = 0;
        this.playing = true; //Statut du défilement automatique
        this.autoSlideChange = null;

        //Appel des méthodes:
        this.startScrolling();
        this.ifNoContainer();
        this.keyboardControls();
        this.clicBtnNext();
        this.clicBtnPrev();
        this.clickBtnPause();
        this.jsCheckForSlides();
    }

    //Positionement des slides si JS est bien chargé :
    jsCheckForSlides() {
        const selfThis = this;
        for (var i = 0; i < this.slides.length; i++) {
            selfThis.slides[i].style.position = 'absolute';
        }
    }

    // Méthode si aucun ID n'est spécifié à la création d'un nouveau diaporama:
    ifNoContainer() {
        if (this.container == false) {
            console.log("Veuillez sélectionner un containerId en paramètre lors de la construction de votre diaporama");
        }
    }

    //Défilement automatique:
    startScrolling() {
        this.pauseBtn.innerHTML = 'Appuyer pour arreter le diaporama';
        this.playing = true; //Changement du statut du défilement automatique.

        //Interval de défilement automatique:
        const selfThis = this;
        this.autoSlideChange = setInterval(function () {
            selfThis.nextSlide()
        }, 5000);
    }

    //Arret du défilement automatique:
    stopScrolling() {
        this.pauseBtn.innerHTML = 'Diaporama en pause. Appuyer pour lancer';
        this.playing = false;

        //Arret du défilement automatique:
        clearTimeout(this.autoSlideChange);
    }

    //Méthode principale de changement de slide:
    goToSlide(n) {
        this.slides[this.currentSlide].className = 'slide';
        this.currentSlide = (n + this.slides.length) % this.slides.length;
        this.slides[this.currentSlide].className = 'slide showing';
    }

    //Méthode pour avancer d'un slide:
    nextSlide() {
        this.goToSlide(this.currentSlide + 1);
    }

    //Méthode pour reculer d'un slide:
    previousSlide() {
        this.goToSlide(this.currentSlide - 1);
    }

    //Methode lors du clic sur bouton avancer
    clicBtnNext() {
        const selfThis = this;
        this.nextBtn.onclick = () => {
            selfThis.stopScrolling();
            selfThis.nextSlide();
        };
    }

    //Methode lors du clic sur bouton reculer
    clicBtnPrev() {
        const selfThis = this;
        this.previousBtn.onclick = () => {
            selfThis.stopScrolling();
            selfThis.previousSlide();
        };
    }

    //Méthode lors du clic sur le bouton pause
    clickBtnPause() {
        const selfThis = this;
        this.pauseBtn.onclick = () => {
            if (selfThis.playing) {
                selfThis.stopScrolling();
            } else {
                selfThis.startScrolling();
            }
        };
    }

    keyboardControls() {
        const selfThis = this;
        document.addEventListener('keydown', function(e) {
            //Si le paramètre "e" n'est pas géré par le navigateur, on récupère la propriété window.event.
            //e = e || window.event;

            if (e.keyCode === 37) {
                // Si la touche est la fleche gauche
                selfThis.stopScrolling();
                selfThis.previousSlide();;
            } else if (e.keyCode === 39) {
                // Si la touche est la fleche droite
                selfThis.stopScrolling();
                selfThis.nextSlide();
            } else if (e.keyCode === 32) {
                e.preventDefault();
                // Si la touche est la barre espace
                if (selfThis.playing) {
                    selfThis.stopScrolling();
                } else {
                    selfThis.startScrolling();
                }
            };
        }, false);
    }
}
