
# Just The Basics (JTB)

Many frameworks can be bloated, overwhelming, and require an excessive number of classes, making
it difficult to maintain readability, JTB stands out by providing sensible base defaults that
allow developers to start with a solid foundation, eliminating the need to apply numerous classes
or manage the most basic aspects of styling.



## Design approach


There are two approaches for managing styles:

#### Utility classes

These classes follow an opt-in approach, meaning you explicitly add the classes you need to create
the desired style. This allows you to pick and choose specific utility classes that apply to your
components or elements.

#### Component and special classes

In contrast to utility classes, these classes follow an opt-out approach. You only need to add a
single class to manage more opinionated styles which inherit a more generic styles, but you can
add utility classes to override or customise.

For example, you can create a fully styled button with two classes. First, the `btn` class to add
the button styles and transitions, second a `theme` class to choose the colors. I you do not want
a border or your button you simple apply the `bdr-0` class to remove it.

Opt-in takes many classes (this example is only a few of the classes require to style a button)
```html
<button class="px-1 py-05 txt-white bg-blue-500 hover:blue-700 ..... ">Click Me</button>
```

Opt-out has way less and is much cleaner
```html
<button class="btn primary bdr-0">Click Me</button>
```
