<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="py-5-3-2-2 container maxw-lg ">

    <h1>{{ $title ?? null }}</h1>

    {{-- Don't reinvent the wheel. -- Anthony J. D'Angelo --}}

    {{-- Without reinventing the wheel there wouldn't be fast cars. -- Nathan Watts --}}

    <p class="bx warning-light lead">Disclaimer: All content on this website is my interpretation of the concepts we are taught at university, (as well as many we are not). As much as I would like to think I have everything right I can not guarantee it, so do yourself a favour and research for yourself.</p>
    <hr>

    <section class="px space-y">
        <x-gt-menu filename="nav-programming" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <hr>
        <h2>Concepts, Tips, Techniques and Code Examples</h2>
        <x-gt-menu filename="nav-concepts" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <hr>
        <h2>Ionic</h2>
        <x-gt-menu filename="nav-programming" menuname="Ionic" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <hr>
        <h2>Linux</h2>
        <x-gt-menu filename="nav-linux" menuname="main" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
        <div class="grid md:cols-2">
            <div class="bx flex va-c">

                <x-gt-icon-linux class="icon wh-4 mr" />
                <a href="{{ route('linux.things-you-should-know') }}" class="txt-lg lh-1">Things you should know about linux to have a fighting chance</a>
            </div>
        </div>
        <hr>
        <h2>Misc</h2>
        <x-gt-menu filename="nav-programming" menuname="other" class="bx flex wrap gg-1" itemClass="btn secondary" withIcons />
    </section>

    <div class="container maxw-md mt-5">
        <h2 class="title">Notes that need a home</h2>
        <x-gt-parsedown path="{{ 'notes-to-put-somewhere' }}" />
    </div>

    <x-gt-markdown class="-ml-5">
        @verbatim
            ```
            Basic Metacharacters:
            .: Matches any character except newline.
            ^: Matches the start of a string.
            $: Matches the end of a string.

            Character Classes:
            [abc]: Matches any single character in the set (a, b, or c).
            [^abc]: Matches any single character not in the set (not a, b, or c).
            [a-z]: Matches any single character in the range a to z.
            [0-9]: Matches any single digit.

            Quantifiers:
            *: Matches zero or more occurrences.
            +: Matches one or more occurrences.
            ?: Matches zero or one occurrence.
            {n}: Matches exactly n occurrences.
            {n,}: Matches at least n occurrences.
            {n,m}: Matches between n and m occurrences.

            Common Shorthands:
            \d: Matches any digit (equivalent to [0-9]).
            \D: Matches any non-digit character.
            \w: Matches any word character (letters, digits, or underscore).
            \W: Matches any non-word character.
            \s: Matches any whitespace character (space, tab, newline, etc.).
            \S: Matches any non-whitespace character.

            Grouping and Alternation:
            (pattern): Groups a pattern together.
            |: Acts as an OR operator, matches either the pattern before or after it.

            Escaping:
            \: Escapes a special character to treat it as a literal character.

            Greedy and Lazy Matching:
            *?, +?, ??: Make quantifiers lazy (matching as few characters as possible).

            Anchors:
            \b: Matches a word boundary.
            \B: Matches a non-word boundary.

            Flags:
            i: Case-insensitive matching.
            g: Global matching (find all occurrences).
            m: Multi-line matching.

            Remember, regex patterns can become complex and may have many special cases depending on your specific use case. Be sure to test and verify your patterns thoroughly to ensure they match the intended strings. Many programming languages have built-in support for regular expressions, allowing you to use them in functions like match(), test(), and replace().
        @endverbatim
    </x-gt-markdown>

</x-gotime-app-layout>
