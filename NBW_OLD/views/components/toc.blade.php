<div>
    <div id="toc"></div>

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

</div>
