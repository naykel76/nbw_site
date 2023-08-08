<div>

    <h1>Draw Tetromino</h1>

    <div id="toc"></div>

    <h2 id="manual-shapes">Drawing shapes with coordinates</h2>

    <p>The <code>ctx.scale</code> has been defined which allows us to 1 unit instead of having to calculate the block size everywhere. For example, 1 = 10px or 1 = 20px</p>

    <p>Refer to the <a href="/docs/javascript/canvas">drawing environment</a> page for information on preparing the <code>ctx</code> and <code>canvas</code></p>

    <div class="grid cols-2 remove-pre-margins">
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(1, 0, 1, 1);
                ctx.fillRect(1, 1, 1, 1);
                ctx.fillRect(2, 1, 1, 1);
                ctx.fillRect(3, 1, 1, 1);
            @endverbatim
        </x-gt-markdown>

        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(6, 0, 1, 1);
                ctx.fillRect(6, 1, 1, 1);
                ctx.fillRect(6, 2, 1, 1);
                ctx.fillRect(5, 2, 1, 1);
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(8, 0, 1, 1);
                ctx.fillRect(9, 0, 1, 1);
                ctx.fillRect(10, 0, 1, 1);
                ctx.fillRect(10, 1, 1, 1);
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(12, 0, 1, 1);
                ctx.fillRect(12, 1, 1, 1);
                ctx.fillRect(12, 2, 1, 1);
                ctx.fillRect(13, 0, 1, 1);
            @endverbatim
        </x-gt-markdown>
    </div>

    <canvas id="canvas1" class="bdr-3 bdr-red"></canvas>

    <script>
        canvas1 = document.getElementById('canvas1');
        ctx = canvas1.getContext('2d');
        ctx.scale(20, 20);
        ctx.fillStyle = 'limegreen';

        //
        ctx.fillRect(1, 0, 1, 1);
        ctx.fillRect(1, 1, 1, 1);
        ctx.fillRect(2, 1, 1, 1);
        ctx.fillRect(3, 1, 1, 1);
        //
        ctx.fillRect(6, 0, 1, 1);
        ctx.fillRect(6, 1, 1, 1);
        ctx.fillRect(6, 2, 1, 1);
        ctx.fillRect(5, 2, 1, 1);
        //
        ctx.fillRect(8, 0, 1, 1);
        ctx.fillRect(9, 0, 1, 1);
        ctx.fillRect(10, 0, 1, 1);
        ctx.fillRect(10, 1, 1, 1);
        //
        ctx.fillRect(12, 0, 1, 1);
        ctx.fillRect(12, 1, 1, 1);
        ctx.fillRect(12, 2, 1, 1);
        ctx.fillRect(13, 0, 1, 1);

    </script>

    <h2 id="matrix-shapes">Draw Shapes from a two-dimensional array</h2>

    <p>Using a two-dimensional array (matrix) to represent the shapes is a more organised and effective approach. This makes it easier to define, visualise, and manipulate the shapes.</p>

    <div class="grid cols-2 remove-pre-margins">
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [1, 0, 0],
                [1, 1, 1],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 1, 0],
                [0, 1, 0],
                [1, 1, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [1, 1, 1],
                [0, 0, 1],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [1, 1, 0],
                [1, 0, 0],
                [1, 0, 0]
            @endverbatim
        </x-gt-markdown>
    </div>

    <canvas id="canvas2" class="bdr-3 bdr-red"></canvas>
    <script>
        canvas1 = document.getElementById('canvas2');
        ctx = canvas1.getContext('2d');
        ctx.scale(20, 20);
        ctx.fillStyle = 'limegreen';

        const J = [
            [0, 1, 0, 0, 0], // y = 0
            [0, 1, 1, 1, 0], // y = 1
            [0, 0, 0, 0, 0], // y = 2
            [0, 0, 0, 0, 0], // y = 3
            [0, 0, 0, 0, 0], // y = 4
        ];
        const J1 = [
            [0, 0, 0, 0, 0, 0, 1, 0], // y = 0
            [0, 0, 0, 0, 0, 0, 1, 0], // y = 1
            [0, 0, 0, 0, 0, 1, 1, 0], // y = 2
            [0, 0, 0, 0, 0, 0, 0, 0], // y = 3
            [0, 0, 0, 0, 0, 0, 0, 0], // y = 4
        ];
        const J2 = [
            [0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1], // y = 0
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1], // y = 1
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 2
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 3
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 4
        ];
        const J3 = [
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1], // y = 0
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0], // y = 1
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0], // y = 2
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 3
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // y = 4
        ];

        // each array represents a row on the grid or y[i]
        // each value in an array (row) represents the x[i] position
        // any value > 0 indicates the square is visible
        function renderShape(shape) {
            shape.forEach((row, y) => {
                row.forEach((value, x) => {
                    if (value > 0) {
                        ctx.fillRect(x, y, 1, 1);
                    }
                });
            });
        }

        renderShape(J);
        renderShape(J1);
        renderShape(J2);
        renderShape(J3);

    </script>

    <h3 id="drawing-loop">The drawing loop</h3>

    <p class="mt">To understand how the loop works, it is a good idea to visualise and understand the grid.</p>
    <ul>
        <li>Each array represents a row on the grid or <code>y[i]</code></li>
        <li>Each value in an array (row) represents the <code>x[i]</code> position</li>
        <li>Any grid value that is greater than 0 indicates the square is visible</li>
    </ul>
    <div>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

                [0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

                [0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            @endverbatim
        </x-gt-markdown>
    </div>

    {{-- had problems with the markdown component so this is the solution --}}
    <x-gt-parsedown path="{{ 'snippets/tetris-shape-render-loop' }}" />

    <h2 id="all-shapes">Complete shapes matrix (WIP)</h2>

    <p>These are the tetrominos in there start positions</p>

    <div class="grid cols-4 remove-pre-margins">
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 0, 0, 0],
                [1, 1, 1, 1],
                [0, 0, 0, 0],
                [0, 0, 0, 0]
            @endverbatim
        </x-gt-markdown>

        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js

                [2, 0, 0],
                [2, 2, 2],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js

                [0, 0, 3],
                [3, 3, 3],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js


                [4, 4],
                [4, 4]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 5, 5],
                [5, 5, 0],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 6, 0],
                [6, 6, 6],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [7, 7, 0],
                [0, 7, 7],
                [0, 0, 0]
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```

            @endverbatim
        </x-gt-markdown>
    </div>
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toc = document.getElementById('toc');
            var headings = document.querySelectorAll('h2[id], h3[id]');

            var tocList = document.createElement('ul');
            toc.appendChild(tocList);

            var currentList = tocList;
            var currentLevel = 2;

            headings.forEach(function (heading) {
                var id = heading.id;
                var level = parseInt(heading.tagName.substring(1));

                if (level > currentLevel) {
                    var newList = document.createElement('ul');
                    currentList.lastChild.appendChild(newList);
                    currentList = newList;
                } else if (level < currentLevel) {
                    while (level < currentLevel) {
                        currentList = currentList.parentElement.parentElement;
                        currentLevel--;
                    }
                }

                var link = document.createElement('a');
                link.href = '#' + id;
                link.textContent = heading.textContent;

                var entry = document.createElement('li');
                entry.appendChild(link);
                currentList.appendChild(entry);

                currentLevel = level;
            });
        });

    </script>

@endPushOnce
