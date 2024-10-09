class Quiz {
    constructor(startButton, nextButton, backButton) {
        this.startButton = startButton;
        this.nextButton = nextButton;
        this.backButton = backButton;
    }

    init() {
        document.getElementById(this.startButton).addEventListener('click', () => {this.start()})

        document.body.addEventListener('click', (e) => {
            if (e.target.classList.contains(this.nextButton)) {
                this.next(e)
            }

            if (e.target.classList.contains(this.backButton)) {
                this.back(e)
            }
        }, false);

        this.submitForm();
    }

    isValid(container) {
        let checkboxesChecked = container.querySelectorAll('input[type="checkbox"]:checked').length;

        if (checkboxesChecked === 0) {
            let alert = document.getElementById('error_alert');
            alert.classList.remove('d-none')

            setTimeout(() => {
                alert.classList.add('d-none');
            }, 800)

            return false;
        }

        return true;
    }

    start() {
        document.getElementById('first_screen').classList.add('d-none')
        let firstQuestionContainer = document.getElementsByClassName('question-container')[0];
        firstQuestionContainer.classList.remove('d-none');
    }

    next(e) {
        let currentContainer = e.target.closest('.question-container');

        if (!this.isValid(currentContainer)) {
            return;
        }

        let nextContainer = currentContainer.nextElementSibling;

        currentContainer.classList.add('d-none');
        nextContainer.classList.remove('d-none');
    }

    back(e) {
        let currentContainer = e.target.closest('.question-container');
        let previousContainer = currentContainer.previousElementSibling;

        currentContainer.classList.add('d-none');
        previousContainer.classList.remove('d-none');
    }

    submitForm() {
        document.getElementById('quiz__form').addEventListener('submit', (e) => {
            let currentContainer = e.submitter.closest('.question-container');

            if (!this.isValid(currentContainer)) {
                e.preventDefault();
            }
        })
    }
}


document.addEventListener('DOMContentLoaded', () => {
    let quiz = new Quiz('start_button', 'next_button', 'back_button');
    quiz.init();
});
