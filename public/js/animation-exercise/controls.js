const KEYS = {
    ArrowLeft: 37,
    ArrowRight: 39,
    ArrowUp: 38,
    ArrowDown: 40
};

function handleKeyPress(event) {
    const key = event.key;

    if (KEYS.hasOwnProperty(key)) {
        event.preventDefault();

        const keyCode = KEYS[key];

        switch (keyCode) {
            case KEYS.ArrowLeft:
                board.piece.move({ x: -1, y: 0 });
                break;
            case KEYS.ArrowRight:
                board.piece.move({ x: 1, y: 0 });
                break;
            case KEYS.ArrowUp:
                board.piece.move({ x: 0, y: -1 });
                break;
            case KEYS.ArrowDown:
                board.piece.move({ x: 0, y: 1 });
                break;
        }
    }
}
