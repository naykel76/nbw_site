# Move Basic Shape
<!-- TOC -->

- [Create the move() method to the Piece class](#create-the-move-method-to-the-piece-class)
- [Define the movement keys](#define-the-movement-keys)
- [Create the keypress handler function](#create-the-keypress-handler-function)
- [Add event to listen for the key press](#add-event-to-listen-for-the-key-press)
- [Test it out](#test-it-out)

<!-- /TOC -->

<a id="markdown-create-the-move-method-to-the-piece-class" name="create-the-move-method-to-the-piece-class"></a>

## Create the move() method to the Piece class

```js
move(piece) {
    this.x = this.x + piece.x;
    this.y = this.y + piece.y;
    this.ctx.clearRect(0, 0, canvas.width, canvas.height)
    this.render();
}
```

<a id="markdown-define-the-movement-keys" name="define-the-movement-keys"></a>

## Define the movement keys

```js
const KEYS = {
    ArrowLeft: 37,
    ArrowRight: 39,
    ArrowUp: 38,
    ArrowDown: 40
};
```

<a id="markdown-create-the-keypress-handler-function" name="create-the-keypress-handler-function"></a>

## Create the keypress handler function

```js
function handleKeyPress(event) {
    event.preventDefault();
    const key = event.key;

    if (KEYS.hasOwnProperty(key)) {
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
```

<a id="markdown-add-event-to-listen-for-the-key-press" name="add-event-to-listen-for-the-key-press"></a>

## Add event to listen for the key press

```js
document.addEventListener('keydown', handleKeyPress);
```

<a id="markdown-test-it-out" name="test-it-out"></a>

## Test it out

Use the arrow keys on your keyboard to move the square. You'll notice that the square can exit the
board, as collision detection hasn't been implemented to limit its motion.

<canvas id="canvas" class="bdr-3 bdr-red"></canvas>
<script src="/js/animation-exercise/controls.js"></script>
<script src="/js/animation-exercise/02-move-basic-shape.js"></script>
