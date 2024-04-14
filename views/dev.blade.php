<x-gt-app-layout layout="docs" hasContainer class="markdown py-5-3-2-2">

    <?php
    $path = 'react-native-cheatsheet_copy';
    $file = getFile(resource_path('views/docs/' . $path . '.md'));
    ?>

    @pushOnce('head')
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
    @endPushOnce

    @markdown($file)

    @markdown
        # Bar
    @endmarkdown

</x-gt-app-layout>
