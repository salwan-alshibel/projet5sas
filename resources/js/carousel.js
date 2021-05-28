class Carousel {

    constructor(containerId) {

        //DOM:
        this.container = document.getElementById(containerId);
        this.slides = this.container.querySelectorAll('#slides .slide');
        //this.controls = document.querySelectorAll('.controls');
        this.nextBtn = this.container.querySelector('.carousel-control-next');
        this.previousBtn = this.container.querySelector('.carousel-control-previous');
        this.pauseBtn = this.container.querySelector('.carousel-control-pause');

        //Starting values:
        this.currentSlide = 0;
        this.playing = true;
        this.autoSlideChange = null;

        //Calling methods:
        this.startScrolling();
        this.ifNoContainer();
        this.keyboardControls();
        this.clicBtnNext();
        this.clicBtnPrev();
        this.clickBtnPause();
        this.jsCheckForSlides();
    }

    //If JS is load :
    jsCheckForSlides() {
        const selfThis = this;
        for (var i = 0; i < this.slides.length; i++) {
            selfThis.slides[i].style.position = 'absolute';
        }
    }

    //If no "id" is specify when creating the object:
    ifNoContainer() {
        if (this.container == false) {
            console.log("Veuillez sélectionner un containerId en paramètre lors de la construction de votre diaporama");
        }
    }


    startScrolling() {
        this.pauseBtn.querySelector('.play').style.display = 'none';
        this.pauseBtn.querySelector('.pause').style.display = 'block';
        this.playing = true;

        //Interval:
        const selfThis = this;
        this.autoSlideChange = setInterval(function () {
            selfThis.nextSlide()
        }, 5000);
    }


    stopScrolling() {
        this.pauseBtn.querySelector('.pause').style.display = 'none';
        this.pauseBtn.querySelector('.play').style.display = 'block';
        this.playing = false;

        clearTimeout(this.autoSlideChange);
    }


    goToSlide(n) {
        this.slides[this.currentSlide].className = 'slide';
        this.currentSlide = (n + this.slides.length) % this.slides.length;
        this.slides[this.currentSlide].className = 'slide showing';
    }


    nextSlide() {
        this.goToSlide(this.currentSlide + 1);
    }


    previousSlide() {
        this.goToSlide(this.currentSlide - 1);
    }


    clicBtnNext() {
        const selfThis = this;
        this.nextBtn.onclick = () => {
            selfThis.stopScrolling();
            selfThis.nextSlide();
        };
    }


    clicBtnPrev() {
        const selfThis = this;
        this.previousBtn.onclick = () => {
            selfThis.stopScrolling();
            selfThis.previousSlide();
        };
    }


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


const Carousel1 = new Carousel("carousel");