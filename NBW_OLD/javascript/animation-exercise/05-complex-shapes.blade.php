<div>

    <h1>Draw Complex Shapes</h1>

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

    <canvas id="canvas" class="bdr-3 bdr-red"></canvas>

    <h2 id="matrix-shapes">Draw Shapes from a two-dimensional array</h2>

    <p>Using a two-dimensional array (matrix) to represent the shapes is a more organised and effective approach. This makes it easier to define, visualise, and manipulate the shapes.</p>

    <div class="grid cols-4 remove-pre-margins">
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

    <canvas id="canvas1" class="bdr-3 bdr-red"></canvas>

    <h3 id="matrix-drawing-loop">Matrix drawing loop</h3>

    <p class="mt">To understand how the loop works, it is a good idea to visualise and understand the grid.</p>
    <ul>
        <li>Each array represents a row on the grid or <code>y[i]</code></li>
        <li>Each value in the array (row) represents the <code>x[i]</code> position</li>
        <li>Any grid value that is greater than 0 indicates the square is visible</li>
    </ul>

    <div class="grid cols-2 remove-pre-margins">
        <x-gt-markdown class="-ml-9">
            @verbatim
                ```js
                [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            @endverbatim
        </x-gt-markdown>
    </div>

    {{-- had problems with the markdown component so this is the solution --}}
    {{-- don't try to fix it just accept it and be happy :) --}}
    <x-gt-parsedown path="{{ 'snippets/matrix-draw-render-loop' }}" />

</div>
<script src="/js/animation-exercise/05-complex-shapes.js"></script>

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
