<div>

    <h1>Draw Tetromino</h1>

    <div id="toc"></div>

    <h2 id="manual-shapes">Drawing shapes (The long way)</h2>

    <p>The <code>ctx.scale</code> has been defined which allows us to 1 unit instead of having to calculate the block size everywhere. For example, 1 = 10px or 1 = 20px</p>

    <p>Refer to <a href="/docs/javascript/graphics-and-animations#setup-the-canvas">set up canvas</a> for information on preparing the <code>ctx</code> and <code>canvas</code></p>



    <x-gt-markdown class="-ml-6">
        @verbatim
            ```js
            ctx.fillRect(x, y, w, h);
        @endverbatim
    </x-gt-markdown>

    <div class="grid cols-2 remove-pre-margins">
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(2, 0, 1, 1);
                ctx.fillRect(2, 1, 1, 1);
                ctx.fillRect(2, 2, 1, 1);
                ctx.fillRect(1, 2, 1, 1);
            @endverbatim
        </x-gt-markdown>

        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(4, 0, 1, 1);
                ctx.fillRect(4, 1, 1, 1);
                ctx.fillRect(5, 1, 1, 1);
                ctx.fillRect(6, 1, 1, 1);

            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(8, 0, 1, 1);
                ctx.fillRect(9, 0, 1, 1);
                ctx.fillRect(9, 1, 1, 1);
                ctx.fillRect(9, 2, 1, 1);
            @endverbatim
        </x-gt-markdown>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```js
                ctx.fillRect(11, 1, 1, 1);
                ctx.fillRect(12, 1, 1, 1);
                ctx.fillRect(13, 0, 1, 1);
                ctx.fillRect(13, 1, 1, 1);
            @endverbatim
        </x-gt-markdown>


    </div>

    <canvas id="canvas1" class="bdr-3 bdr-red"></canvas>

    <script>
        canvas1 = document.getElementById('canvas1');
        ctx = canvas1.getContext('2d');
        ctx.scale(20, 20);
        ctx.fillStyle = 'green';
        //
        ctx.fillRect(2, 0, 1, 1);
        ctx.fillRect(2, 1, 1, 1);
        ctx.fillRect(2, 2, 1, 1);
        ctx.fillRect(1, 2, 1, 1);
        //
        ctx.fillRect(4, 0, 1, 1);
        ctx.fillRect(4, 1, 1, 1);
        ctx.fillRect(5, 1, 1, 1);
        ctx.fillRect(6, 1, 1, 1);
        //
        ctx.fillRect(8, 0, 1, 1);
        ctx.fillRect(9, 0, 1, 1);
        ctx.fillRect(9, 1, 1, 1);
        ctx.fillRect(9, 2, 1, 1);
        //
        ctx.fillRect(11, 1, 1, 1);
        ctx.fillRect(12, 1, 1, 1);
        ctx.fillRect(13, 0, 1, 1);
        ctx.fillRect(13, 1, 1, 1);

    </script>


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
