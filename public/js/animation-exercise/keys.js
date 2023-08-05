const KEY = {
    LEFT: 'ArrowLeft',
    RIGHT: 'ArrowRight',
}

// Define the moves object that maps key codes to corresponding movement // functions
const moves = {
    [KEY.LEFT]: (piece) => ({ ...piece, x: piece.x - 1 }),
    [KEY.RIGHT]: (piece) => ({ ...piece, x: piece.x + 1 }),
    [KEY.DOWN]: (piece) => ({ ...piece, y: piece.y + 1 })
};

// Function to handle key presses
function handleKeyPress(e) {
    // Stop the event from bubbling.
    e.preventDefault();

    console.log(e);
    console.log(moves);

    // Check if the pressed key has a corresponding movement function
    if (moves[e.keyCode]) {

        console.log(moves[e.keyCode](board.piece));
        // Get the new state of the piece using the appropriate movement function
        let updatedPiece = moves[e.keyCode](board.piece);

        // Move the piece on the game board
        board.piece.move(updatedPiece);

        // Redraw the game board
        draw();
    }
}




function addEventListener() {
    document.removeEventListener('keydown', handleKeyPress);
    document.addEventListener('keydown', handleKeyPress);
}

addEventListener();
