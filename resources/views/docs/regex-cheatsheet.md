# Regex


https://regexlearn.com/ 


https://regexr.com/

<span class="txt-green"></span>

## Special Characters

- Dot `.` matches any character (except newline) <br>
`\.\` - <span class='font-mono txt-yellow dark'>a</span><span class='font-mono txt-yellow dark'>b</span><span class='font-mono txt-yellow dark'>c</span><span class='font-mono txt-yellow dark'>A</span><span class='font-mono txt-yellow dark'>B</span><span class='font-mono txt-yellow dark'>C</span><span class='font-mono txt-yellow dark'>1</span><span class='font-mono txt-yellow dark'>2</span><span class='font-mono txt-yellow dark'>3</span><span class='font-mono txt-yellow dark'> </span><span class='font-mono txt-yellow dark'>.</span><span class='font-mono txt-yellow dark'>:</span><span class='font-mono txt-yellow dark'>!</span><span class='font-mono txt-yellow dark'>?</span>

`\d` : Any digit (0-9) <br>
`\D` : Any non-digit character <br>
`\w` : Any word character (a-z, A-Z, 0-9, _) <br>
`\W` : Any non-word character <br>
`\s` : Any whitespace character (spaces, tabs, line breaks) <br>
`\S` : Any non-whitespace character <br>
`\b` : Word boundary <br>
`\B` : Non-word boundary <br>
`\\` : Escape special characters <br>


## Repetitions

`*` : 0 or more of the preceding token




- `+` : 1 or more
- `?` : 0 or 1
- `{n}` : Exactly n times
- `{n,}` : n or more times
- `{n,m}` : Between n and m times


## Character set or range `[]` and negated character set `[^]`

Use the square brackets `[]` to specify a character set or range. Alternatively, use
square brackets with a caret `[^]` to define a negated character set. This set will match
any character except those listed inside the brackets.

---

`/b[aio]r/` - Finds all words that start with `b`, ends with `r` and has either `a`, `i` or `o` in between. <br>
Output:  <span class='font-mono txt-yellow dark'>bar</span> ber <span class='font-mono txt-yellow dark'>bir</span> <span class='font-mono txt-yellow dark'>bor</span> bur

`/b[^eu]r/` - Finds all words that start with `b`, ends with `r` and has any character except `a`, `i`, or `o` in the middle. <br>
Negated Output: bar <span class='txt-yellow dark'>ber</span> bir bor <span class='txt-yellow dark'>bur</span>

---

`/[a-f]/` - Finds all characters from `a` to `f`. <br>
Output: <span class='txt-yellow dark'>a</span><span class='txt-yellow dark'>b</span><span class='txt-yellow dark'>c</span><span class='txt-yellow dark'>d</span><span class='txt-yellow dark'>e</span><span class='txt-yellow dark'>f</span>ghijklmnopqrstuvwxyz

`/[^a-f]/` - Finds all characters that are not from `a` to `f`. <br>
Negated Output: abcdef<span class='txt-yellow dark'>g</span><span class='txt-yellow dark'>h</span><span class='txt-yellow dark'>i</span><span class='txt-yellow dark'>j</span><span class='txt-yellow dark'>k</span><span class='txt-yellow dark'>l</span><span class='txt-yellow dark'>m</span><span class='txt-yellow dark'>n</span><span class='txt-yellow dark'>o</span><span class='txt-yellow dark'>p</span><span class='txt-yellow dark'>q</span><span class='txt-yellow dark'>r</span><span class='txt-yellow dark'>s</span><span class='txt-yellow dark'>t</span><span class='txt-yellow dark'>u</span><span class='txt-yellow dark'>v</span><span class='txt-yellow dark'>w</span><span class='txt-yellow dark'>x</span><span class='txt-yellow dark'>y</span><span class='txt-yellow dark'>z</span>

---

`/[3-6]/` - Finds all numbers from `3` to `6`. <br>
Output: 012<span class='txt-yellow dark'>3</span><span class='txt-yellow dark'>4</span><span class='txt-yellow dark'>5</span><span class='txt-yellow dark'>6</span>789

`/[^3-6]/` - Finds all characters that are not numbers from `3` to `6`. <br>
Negated Output: <span class='txt-yellow dark'>0</span><span class='txt-yellow dark'>1</span><span class='txt-yellow dark'>2</span>3456<span class='txt-yellow dark'>7</span><span class='txt-yellow dark'>8</span><span class='txt-yellow dark'>9</span>

---

`[bdf]eer` words that start with `b`, `d`, or `f` and end with `eer` <br>
`[^bdf]eer` words that do not start with `b`, `d`, or `f` and end with `eer` <br>


<!-- - `()` : Group -->
<!-- - `|` : Either or -->
<!-- - `(?:)` : Non-capturing group -->


## Assertions

`$` : End of string or line <br>
`\A` : Start of string <br>
`\Z` : End of string <br>
`\b` : Word boundary <br>
`\B` : Non-word boundary <br>
`^` : Start of string or line <br>
`(?=)` : Positive lookahead <br>
`(?!)` : Negative lookahead <br>
`(?<=)` : Positive lookbehind. Matches a group after the main expression without including it in the result. <br>


`(?<!)` : Negative lookbehind <br>


## Flags

- `g` : Global. Searches the entire string. Without `g`, only the first match is returned.
- `i` : Case Insensitive. Makes the entire regex case-insensitive.
- `m` : Multiline. Causes `^` and `$` to match the start and end of lines, not just the start and end of the string.
- `s` : Single line (DotAll). Causes `.` to match newline characters as well.
- `u` : Unicode. Treats the pattern as a sequence of Unicode code points.
- `y` : Sticky. Matches at the exact position in the string specified by the `lastIndex` property (useful with loops).


## Examples


### Search for words or character in a string

`/e/g` - Th<span class="font-mono txt-yellow fw9">e</span> quick brown fox jumps ov<span class="font-mono txt-yellow fw9">e</span>r th<span class="font-mono txt-yellow fw9">e</span> lazy dog. <br>
`/the/g` - The quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>
`/the/gi` - <span class="font-mono txt-yellow fw9">The</span> quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>





### Find all words except for. (Negated character set)

`/\b[^t]he\b/g` - The quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>
`/\b[^t]he\b/gi` - <span class="font-mono txt-yellow fw9">The</span> quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>



## Additional Resources

https://regexlearn.com/cheatsheet

https://fireship.io/lessons/regex-cheat-sheet-js/
