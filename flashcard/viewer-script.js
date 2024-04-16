const cardContainer = document.getElementById("card-container");
const prevButton = document.getElementById("prev-btn");
const nextButton = document.getElementById("next-btn");
let currentCardIndex = 0;

// Function to display current flashcard
function displayCard(index) {
    // Make AJAX call to fetch flashcards from server
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_flashcards.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const flashcards = JSON.parse(xhr.responseText);
            const currentCard = flashcards[index];
            cardContainer.innerHTML = `
                <div class="card">
                    <p class="question-div">${currentCard.question}</p>
                    <p class="answer-div hide">${currentCard.answer}</p>
                    <a href="#" class="show-hide-btn">Show/Hide</a>
                </div>
            `;
        }
    };
    xhr.send();
}

// Function to handle "Next" button click
nextButton.addEventListener("click", () => {
    currentCardIndex = (currentCardIndex + 1) % flashcards.length;
    displayCard(currentCardIndex);
});

// Function to handle "Previous" button click
prevButton.addEventListener("click", () => {
    currentCardIndex = (currentCardIndex - 1 + flashcards.length) % flashcards.length;
    displayCard(currentCardIndex);
});

// Display initial flashcard
displayCard(currentCardIndex);
