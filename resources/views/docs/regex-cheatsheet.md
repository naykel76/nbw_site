# Regex

- [Flags](#flags)
- [Character Classes](#character-classes)
- [Quantifiers (`*`, `+`, `?`, `{n}`, `{n,}`, `{n,m}`)](#quantifiers----n-n-nm)
- [Assertions](#assertions)
- [Character set or range `[]` and negated character set `[^]`](#character-set-or-range--and-negated-character-set-)
- [Examples](#examples)
  - [Search for words or character in a string](#search-for-words-or-character-in-a-string)
  - [Find words that start with ...](#find-words-that-start-with-)
  - [Find all words except for. (Negated character set)](#find-all-words-except-for-negated-character-set)
  - [Matching words that contain...](#matching-words-that-contain)
- [JavaScript examples](#javascript-examples)
  - [Test for a valid Australian phone number](#test-for-a-valid-australian-phone-number)
- [Additional Resources](#additional-resources)

## Flags

- `g` : Global. Searches the entire string. Without `g`, only the first match is returned.
- `i` : Case Insensitive. Makes the entire regex case-insensitive.
- `m` : Multiline. Causes `^` and `$` to match the start and end of lines, not just the start and end of the string.
- `s` : Single line (DotAll). Causes `.` to match newline characters as well.
- `u` : Unicode. Treats the pattern as a sequence of Unicode code points.
- `y` : Sticky. Matches at the exact position in the string specified by the `lastIndex` property (useful with loops).
- 
## Character Classes

<div class="spaced-out"></div>

- `\/.\` matches any character (except newline) - <span class='font-mono txt-yellow dark'>a</span><span class='font-mono txt-yellow dark'>b</span><span class='font-mono txt-yellow dark'>c</span><span class='font-mono txt-yellow dark'>A</span><span class='font-mono txt-yellow dark'>B</span><span class='font-mono txt-yellow dark'>C</span><span class='font-mono txt-yellow dark'>1</span><span class='font-mono txt-yellow dark'>2</span><span class='font-mono txt-yellow dark'>3</span><span class='font-mono txt-yellow dark'> </span><span class='font-mono txt-yellow dark'>.</span><span class='font-mono txt-yellow dark'>:</span><span class='font-mono txt-yellow dark'>!</span><span class='font-mono txt-yellow dark'>?</span>

- `\d` : Any digit (0-9) - <span class='font-mono txt-yellow dark'>1</span><span class='font-mono txt-yellow dark'>2</span><span class='font-mono txt-yellow dark'>3</span><span class='font-mono txt-yellow dark'>4</span><span class='font-mono txt-yellow dark'>5</span><span class='font-mono txt-yellow dark'>6</span><span class='font-mono txt-yellow dark'>7</span><span class='font-mono txt-yellow dark'>8</span><span class='font-mono txt-yellow dark'>9</span><span class='font-mono txt-yellow dark'>0</span>

- `\D` : Any non-digit character - <span class='font-mono txt-yellow dark'>a</span><span class='font-mono txt-yellow dark'>b</span><span class='font-mono txt-yellow dark'>c</span><span class='font-mono txt-yellow dark'>A</span><span class='font-mono txt-yellow dark'>B</span><span class='font-mono txt-yellow dark'>C</span><span class='font-mono txt-yellow dark'>_</span><span class='font-mono txt-yellow dark'>~</span><span class='font-mono txt-yellow dark'>!</span><span class='font-mono txt-yellow dark'>@</span><span class='font-mono txt-yellow dark'>#</span><span class='font-mono txt-yellow dark'>$</span><span class='font-mono txt-yellow dark'>%</span><span class='font-mono txt-yellow dark'>^</span><span class='font-mono txt-yellow dark'>&</span><span class='font-mono txt-yellow dark'>*</span><span class='font-mono txt-yellow dark'>(</span><span class='font-mono txt-yellow dark'>)</span><span class='font-mono txt-yellow dark'>-</span><span class='font-mono txt-yellow dark'>+</span><span class='font-mono txt-yellow dark'>=</span><span class='font-mono txt-yellow dark'>[</span><span class='font-mono txt-yellow dark'>]</span><span class='font-mono txt-yellow dark'>{</span><span class='font-mono txt-yellow dark'>}</span><span class='font-mono txt-yellow dark'>|</span><span class='font-mono txt-yellow dark'>;</span><span class='font-mono txt-yellow dark'>:</span><span class='font-mono txt-yellow dark'>'</span><span class='font-mono txt-yellow dark'>,</span><span class='font-mono txt-yellow dark'>.</span><span class='font-mono txt-yellow dark'>&lt;</span><span class='font-mono txt-yellow dark'>&gt;</span><span class='font-mono txt-yellow dark'>/</span><span class='font-mono txt-yellow dark'>?</span>


- `\w` : Any word character - <span class='font-mono txt-yellow dark'>a</span><span class='font-mono txt-yellow dark'>b</span><span class='font-mono txt-yellow dark'>c</span><span class='font-mono txt-yellow dark'>A</span><span class='font-mono txt-yellow dark'>B</span><span class='font-mono txt-yellow dark'>C</span><span class='font-mono txt-yellow dark'>_</span><span class='font-mono txt-yellow dark'>1</span><span class='font-mono txt-yellow dark'>2</span><span class='font-mono txt-yellow dark'>3</span><span class='font-mono txt-yellow dark'>

- `\W` : Any non-word character <span class='font-mono txt-yellow dark'>~</span><span class='font-mono txt-yellow dark'>!</span><span class='font-mono txt-yellow dark'>@</span>_<span class='font-mono txt-yellow dark'>#</span><span class='font-mono txt-yellow dark'>$</span><span class='font-mono txt-yellow dark'>%</span><span class='font-mono txt-yellow dark'>^</span><span class='font-mono txt-yellow dark'>&</span><span class='font-mono txt-yellow dark'>*</span><span class='font-mono txt-yellow dark'>(</span><span class='font-mono txt-yellow dark'>)</span><span class='font-mono txt-yellow dark'>-</span><span class='font-mono txt-yellow dark'>+</span><span class='font-mono txt-yellow dark'>=</span><span class='font-mono txt-yellow dark'>[</span><span class='font-mono txt-yellow dark'>]</span><span class='font-mono txt-yellow dark'>{</span><span class='font-mono txt-yellow dark'>}</span><span class='font-mono txt-yellow dark'>|</span><span class='font-mono txt-yellow dark'>;</span><span class='font-mono txt-yellow dark'>:</span><span class='font-mono txt-yellow dark'>'</span><span class='font-mono txt-yellow dark'>,</span><span class='font-mono txt-yellow dark'>.</span><span class='font-mono txt-yellow dark'>&lt;</span><span class='font-mono txt-yellow dark'>&gt;</span>

- `\s` : Any whitespace character (spaces, tabs, line breaks) - Hey<span class='font-mono txt-yellow dark'> </span>there<span class='font-mono txt-yellow dark'> </span>you!
  
- `\S` : Any non-whitespace character - <span class='font-mono txt-yellow dark'>H</span><span class='font-mono txt-yellow dark'>e</span><span class='font-mono txt-yellow dark'>y</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>t</span><span class='font-mono txt-yellow dark'>h</span><span class='font-mono txt-yellow dark'>e</span><span class='font-mono txt-yellow dark'>r</span><span class='font-mono txt-yellow dark'>e</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>y</span><span class='font-mono txt-yellow dark'>o</span><span class='font-mono txt-yellow dark'>u</span><span class='font-mono txt-yellow dark'>!</span>

- `\b` : Word boundary
- `\B` : Non-word boundary
- `\\` : Escape special characters



A word character is defined as any alphanumeric character (a-z, A-Z, 0-9) **or an underscore** (\_).


## Quantifiers (`*`, `+`, `?`, `{n}`, `{n,}`, `{n,m}`) 

<div class="spaced-out"></div>

- `*` : 0 or more of the preceding token - `\be*\ ` matches <span class='font-mono txt-yellow dark'>b</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>be</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>bee</span>
- `+` : 1 or more of the preceding token - `\be+\ ` matches <span class='font-mono txt-yellow dark'>be</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>bee</span> (no more 'b' as it requires at least one 'e')

- `?` : 0 or 1 - `\be?\ ` matches <span class='font-mono txt-yellow dark'>b</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>be</span> (no more 'bee' as it allows for zero or one 'e')
- `{n}` : Exactly n times - `\be{2}\ ` matches <span class='font-mono txt-yellow dark'>bee</span> (no more 'b' or 'be' as it requires exactly two 'e's)
- `{n,}` : n or more times - `\be{2,}\ ` matches <span class='font-mono txt-yellow dark'>bee</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>beee</span> (no more 'b' or 'be' as it requires two or more 'e's)
- `{n,m}` : Between n and m times - `\be{1,2}\ ` matches <span class='font-mono txt-yellow dark'>be</span>&nbsp;&nbsp;<span class='font-mono txt-yellow dark'>bee</span> (no more 'b' or 'beee' as it requires between one and two 'e's)

## Assertions

<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_expressions/Assertions" target="blank">https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_expressions/Assertions</a>

`$` : End of string or line <br>
`\A` : Start of string <br>
`\Z` : End of string <br>

- `\b` : Word boundary where a word starts or ends - `\b` matches the start and end <span class='font-mono txt-yellow dark'>|</span>Hey<span class='font-mono txt-yellow dark'>|</span>, there<span class='font-mono txt-yellow dark'>|</span>!

`\B` : Non-word boundary <br>
`^` : Start of string or line <br>
`(?=)` : Positive lookahead <br>
`(?!)` : Negative lookahead <br>
`(?<=)` : Positive lookbehind. Matches a group after the main expression without including it in the result. <br>


`(?<!)` : Negative lookbehind <br>





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


## Examples

### Search for words or character in a string

`/e/g` - Th<span class="font-mono txt-yellow fw9">e</span> quick brown fox jumps ov<span class="font-mono txt-yellow fw9">e</span>r th<span class="font-mono txt-yellow fw9">e</span> lazy dog. <br>
`/the/g` - The quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>
`/the/gi` - <span class="font-mono txt-yellow fw9">The</span> quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>

### Find words that start with ...

`\b[bfla]\w*` - words that start with `b`, `f`, `l`, or `a` <br>
Mike <span class='txt-yellow dark'>likes</span> to ride <span class='txt-yellow dark'>a</span> <span class='txt-yellow dark'>bike</span> <span class='txt-yellow dark'>like</span> he is <span class='txt-yellow dark'>five</span> <span class='txt-yellow dark'>again</span>, not <span class='txt-yellow dark'>fifty</span>.

`\b[bfla]\w*e` - words that start with `b`, `f`, `l`, or `a` and ends with `e`<br>
Mike <span class='txt-yellow dark'>likes</span> to ride a <span class='txt-yellow dark'>bike</span> <span class='txt-yellow dark'>like</span> he is <span class='txt-yellow dark'>five</span> again, not fifty.

`/\b[bdf]eer\b/g` - <span class="font-mono txt-yellow fw9">beer</span> <span class="font-mono txt-yellow fw9">deer</span> <span class="font-mono txt-yellow fw9">feer</span> <br>
`/\b[^bdf]eer\b/g` - <span class="font-mono txt-yellow fw9">cheer</span> <span class="font-mono txt-yellow fw9">jeer</span> <span class="font-mono txt-yellow fw9">leer</span> <br>

### Find all words except for. (Negated character set)

`/\b[^t]he\b/g` - The quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>
`/\b[^t]he\b/gi` - <span class="font-mono txt-yellow fw9">The</span> quick brown fox jumps over <span class="font-mono txt-yellow fw9">the</span> lazy dog. <br>


### Matching words that contain...

To find words with vowels in a text, you can use the regular expression `\w*[aeiou]\w*`.

\b\w*[aeiou]\w*\b when 

\w*[aeiou]\w* matched Expression

matches any word that contains at least one vowel.

Here's what each part of the regex does:

- `\b`.....`\b` matches a word boundary. This means it matches the position where a word character is not followed or preceded by another word character (like spaces, line breaks, punctuation, the start/end of a string, etc.).
- 
\w* matches zero or more word characters (a word character is a letter, number, or underscore).
[aeiou] matches any vowel.
\w* matches zero or more word characters again.
\b matches another word boundary.
So, \b\w*[aeiou]\w*\b will match any word that contains at least one vowel, like "apple", "orange", "banana", etc.

## JavaScript examples

<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_expressions#using_regular_expressions_in_javascript" target="blank">Mozilla #using_regular_expressions_in_javascript</a>

```js
const text = "The quick brown fox jumps over the lazy dog.";
const regex = /e/g;

console.log(text.match(regex)); // ["e", "e", "e", "e", "e"]
```
---

### Test for a valid Australian phone number

To pass the test, the phone number must start with `04` followed by 8 digits.

```js
function isValidAustralianMobile(number) {
    const sanitizedNumber = number.replace(/\D/g, '');
    return /^04\d{8}$/.test(sanitizedNumber);
}
```

The `sanitizedNumber` variable strips non-digit characters from the input, allowing the
function to accept phone numbers in various formats, provided they start with `04` and
are followed by 8 digits.

- `^04` asserts the start of a line begins with exactly 04.
- `\d{8}` matches exactly eight digits.
- `$` asserts the end of a line.

---



## Additional Resources

- <a href="https://regexlearn.com/cheatsheet" target="blank">https://regexlearn.com/cheatsheet</a>
- <a href="https://regexlearn.com/" target="blank">https://regexlearn.com/</a>
- <a href="https://regexr.com/" target="blank">https://regexr.com/</a>

<script src="/js/testing.js"></script>