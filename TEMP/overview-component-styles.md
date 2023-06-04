# Components Style Overview

<p class="lead">Overview of base components to style your page.</p>

For more examples and detailed usage information click the component page from the menu on the left.

---

<!-- MarkdownTOC -->

- [General Utilities](#general-utilities)
- [Boxes and Themes](#boxes-and-themes)
- [Menus](#menus)
    - [Vertical Menus](#vertical-menus)
    - [Horizontal Menus](#horizontal-menus)

<!-- /MarkdownTOC -->


<section class="bx danger">
    <div class="success">
        <div class="bdr px-075 py-025">item</div>
        <div class="bdr px-075 py-025">item</div>
    </div>
    <h2>Drop Downs</h2>
    <section class="bx">
        <div class="grid cols-3">
            <div class="flex light mxy-0">
                <div class="dd">
                    <div class="btn">
                        Account
                        <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="dd-content bx pos-r flex-col pxy-05">
                        <a href="">Dashboard</a>
                        <a href="">Profile</a>
                        <a href="">Account Security</a>
                        <a href="">Documentation</a>
                    </div>
                </div>
            </div>
            <div class="light mxy-0">
                <div class="dd inline-flex">
                    <div class="btn">
                        Account
                        <svg class="icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="dd-content bx flex-col pxy-05">
                        <a href="" class="">Dashboard</a>
                        <a href="" class="">Profile</a>
                        <a href="" class="">Account Security</a>
                        <a href="" class="">Documentation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<a id="general-utilities"></a>
## General Utilities
<section class="bx">
    <div class="round primary wh-4">circle</div>
</section>

---

<a id="boxes-and-themes"></a>
## Boxes and Themes
<section class="bx">
    <div class="grid cols-2">
        <div class="bx danger-light">
            <div class="bx-title">This is the box title</div>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam voluptatem ratione totam sequi et cupiditate itaque corporis dolorem ut cumque.</p>
        </div>
        <div class="bx">
            <div class="bx-title">Default Theme Box</div>
            <p>Lorem ipsum dolor sit fugiat adipisicing elit. Dignissimos ex voluptatibus.</p>
            <div><a href="">Click Me!</a></div>
        </div>
        <div class="bx light">
            <div class="bx-title">Light Theme Box</div>
            <p>Lorem ipsum dolor sit fugiat adipisicing elit. Dignissimos ex voluptatibus.</p>
            <div><a href="">Click Me!</a></div>
        </div>
        <div class="bx dark">
            <div class="bx-title">Dark Theme Box</div>
            <p>Lorem ipsum dolor sit fugiat adipisicing elit. Dignissimos ex voluptatibus.</p>
            <div><a href="">Click Me!</a></div>
        </div>
        <div class="bx primary">
            <div class="bx-title">Primary Theme Box</div>
            <p>Lorem ipsum dolor sit fugiat adipisicing elit. Dignissimos ex voluptatibus.</p>
            <div><a href="">Click Me!</a></div>
        </div>
        <div class="bx secondary">
            <div class="bx-title">Secondary Theme Box</div>
            <p>Lorem ipsum dolor sit fugiat adipisicing elit. Dignissimos ex voluptatibus.</p>
            <div><a href="">Click Me!</a></div>
        </div>
        <div class="bx complement">
            <div class="bx-title">Complement Theme Box</div>
            <p>Lorem ipsum dolor sit fugiat adipisicing elit. Dignissimos ex voluptatibus.</p>
            <div><a href="">Click Me!</a></div>
        </div>
    </div>
</section>

<!-- buttons -->
<section class="bx">
    <h2>Buttons</h2>
    <div class="space-y-05">
        <div>
            <button class="btn primary"> Primary </button>
            <button class="btn secondary"> Secondary </button>
            <button class="btn success"> Success </button>
            <button class="btn danger"> Danger </button>
            <button class="btn warning"> Warning </button>
            <button class="btn info"> Info </button>
            <button class="btn dark"> Dark </button>
            <button class="btn light"> Light </button>
        </div>
        <div>
            <button disabled class="btn primary"> Primary </button>
            <button disabled class="btn secondary"> Secondary </button>
            <button disabled class="btn success"> Success </button>
            <button disabled class="btn danger"> Danger </button>
            <button disabled class="btn warning"> Warning </button>
            <button disabled class="btn info"> Info </button>
            <button disabled class="btn dark"> Dark </button>
            <button disabled class="btn light"> Light </button>
        </div>
        <div>
            <button class="btn outline primary"> Primary </button>
            <button class="btn outline secondary"> Secondary </button>
            <button class="btn outline success"> Success </button>
            <button class="btn outline danger"> Danger </button>
            <button class="btn outline warning"> Warning </button>
            <button class="btn outline info"> Info </button>
            <button class="btn outline dark"> Dark </button>
            <button class="btn outline light"> Light </button>
        </div>
        <div>
            <button class="btn round primary"> Primary </button>
            <button class="btn round secondary"> Secondary </button>
            <button class="btn round success"> Success </button>
            <button class="btn round danger"> Danger </button>
            <button class="btn round warning"> Warning </button>
            <button class="btn round info"> Info </button>
            <button class="btn round dark"> Dark </button>
            <button class="btn round light"> Light </button>
        </div>
    </div>
</section>

<a id="menus"></a>
## Menus

<a id="vertical-menus"></a>
### Vertical Menus
<section>
    <div class="flex va-t gg">
        <div class="bx">
            <div class="bx-title">Menu Class</div>
            <nav class="menu w-200px">
                <div class="menu-title">Administration</div>
                <a href="">Activities</a>
                <a href="">Pages</a>
                <a href="">Users</a>
                <a href="">Permissions</a>
                <a href="">Settings</a>
                <div class="menu-title">Sales</div>
                <a href="">Orders</a>
                <a href="">Transaction History</a>
                <div class="menu-title">Extras</div>
                <a href="">Documentation</a>
                <a href="">Change Log</a>
            </nav>
        </div>
        <div>
            <div class="bx pxy-025">
                <div class="menu w-200px">
                    <a href="">Dashboard</a>
                    <a href="">Profile</a>
                    <a href="">Account Security</a>
                    <a href="">Documentation</a>
                </div>
            </div>
            <div class="bx pxy-025">
                <div class="menu w-200px">
                    <a href="" class="pxy-025">Dashboard</a>
                    <a href="" class="pxy-025">Profile</a>
                    <a href="" class="pxy-025">Account Security</a>
                    <a href="" class="pxy-025">Documentation</a>
                </div>
            </div>
        </div>
    </div>
</section>

<a id="horizontal-menus"></a>
### Horizontal Menus

<div class="bdr">
    <nav class="txt-upper txt-sm space-x">
        <a class="hover:txt-secondary" href="">Contact Us</a>
        <a class="hover:txt-secondary" href="">Sign In</a>
        <a class="hover:txt-secondary" href="">Create An Account</a>
        <svg class="icon">
            <use href="/svg/naykel-ui-SVG-sprite.svg#cart"></use>
        </svg>
    </nav>
</div>
<hr>
<div class="navbar">
    <nav class="txt-upper space-x">
        <a class="nav-item" href="">Contact Us</a>
        <a class="nav-item" href="">Sign In</a>
        <a class="nav-item" href="">Create An Account</a>
    </nav>
</div>

<!-- Main Elements -->
<section class="bx mt">
    <h1>Heading 1</h1>

    <div class="grid cols-70:30">
        <div>
            <p class="lead">This is the lead text style which is often the opening paragraph of an section or page. The lead paragraph text should clearly and concisely describe what the user will expect from the page contents.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, at eius! Sequi harum rem at illo recusandae ab, dolorum optio fugiat vel nemo doloremque necessitatibus laboriosam deserunt voluptatem aspernatur incidunt placeat voluptate, dolor facilis eos itaque illum. Delectus itaque aspernatur velit, quibusdam nulla aut ipsam architecto accusamus quaerat hic! Vitae maxime doloribus illum cupiditate voluptas earum consectetur esse quidem minima, sit, dicta quae sint fuga quisquam? Dolor voluptate voluptatum fugit, at doloremque, nisi facilis recusandae omnis officiis voluptates voluptatibus iste.</p>
        </div>
        <div>
            <img src="./images/naykel-400.png" alt="naykel sample image">
        </div>
    </div>

    <h2>Heading 2</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati corrupti, accusantium quam quibusdam nulla unde, fugit veritatis reiciendis earum enim eos quod expedita ipsam harum ab mollitia similique in deleniti ducimus aliquam. Totam necessitatibus ea assumenda dolore voluptate rem cum magnam tempore nostrum! Dolor aliquam inventore tempora. Vel, sit dignissimos.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ex mollitia ratione quibusdam quo harum deleniti hic placeat eum dolorum similique facilis autem amet vitae aspernatur, numquam dignissimos voluptatum non quaerat quae temporibus expedita excepturi perferendis. Nisi ex veniam voluptate?</p>

    <hr class="my-2">

    <div class="grid-5 cols-2">

        <div>
            <h3>Heading 3</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam quas totam laboriosam soluta harum beatae qui reiciendis possimus molestiae?</p>
            <h4>Heading 4</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam quas totam laboriosam soluta harum beatae qui reiciendis possimus molestiae?</p>
            <h5>Heading 5</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam quas totam laboriosam soluta harum beatae qui reiciendis possimus molestiae?</p>
            <h6>Heading 6</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam quas totam laboriosam soluta harum beatae qui reiciendis possimus molestiae?</p>
        </div>

        <!-- Headings -->
        <div class="grid cols-2">

            <div></div>
            <div>
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>Heading 5</h5>
                <h6>Heading 6</h6>
            </div>

        </div>

    </div>

</section>



<div class="container mt">
    <h2>Two Column Magic Grid (Responsive)</h2>
    <div class="grid-0 cols-30:70_50:50_100 c-pxy">
        <div class="blue">{30%}-{50%}-{100%}</div>
        <div class="warning">{70%}-{50%}-{100%}</div>
    </div>
    <div class="grid-0 cols-40:60_60:40_100 c-pxy">
    </div>
    <div class="grid-0 cols-40:60_60:40_100 c-pxy">
        <div class="blue">80%</div>
        <div class="warning">20%</div>
    </div>
    <div class="grid-0 cols-60:40_40:60_100 c-pxy">
        <div class="blue">80%</div>`
        <div class="warning">20%</div>
    </div>
    <div class="grid-0 cols-60:40_40:60_100 c-pxy">
        <div class="blue">80%</div>
        <div class="warning">20%</div>
    </div>
</div>

</article>

<div class="bx">
    <h2>Icon Buttons</h2>

    <div class="flex to-md:hide space-x">
        <a href="" class="icon-button secondary withState bdr-0">
            <svg class="icon">
                <!-- <use xlink:href="/svg/naykel-ui-SVG-sprite.svg#phone"></use> -->
            </svg>
            <div class="mt-025 lh-1">Contact</div>
        </a>
        <div class="dd icon-button secondary withState bdr-0">
            <svg class="icon">
                <!-- <use xlink:href="/svg/naykel-ui-SVG-sprite.svg#cart"></use> -->
            </svg>
            <div class="mt-025 lh-1">Cart</div>

            <div class="dd-content bx pos-r">
                No Items in Cart
            </div>
        </div>
        <div class="dd secondary withState bdr-0">
            <div class="icon-button">
                <svg class="icon">
                    <!-- <use xlink:href="/svg/naykel-ui-SVG-sprite.svg#user"></use> -->
                </svg>
                <div class="mt-025 lh-1">Account</div>
            </div>
            <div class="dd-content bx white pos-r">
                <div class="grid cols-2">
                    <a class="btn primary outline w-full" href="">Login</a>
                    <a class="btn primary w-full" href="">Register</a>
                </div>
            </div>
        </div>
    </div>

</div>

<section>
    <h2>Color Shades</h2>

    <div class="flex c-px-1">
        <div class="grey1">.</div>
        <div class="grey2">.</div>
        <div class="grey3">.</div>
        <div class="grey4">.</div>
        <div class="grey5">.</div>
        <div class="grey6">.</div>
        <div class="grey7">.</div>
        <div class="grey8">.</div>
        <div class="grey9">.</div>
        <div class="orange1">.</div>
        <div class="orange2">.</div>
        <div class="orange3">.</div>
        <div class="orange4">.</div>
        <div class="orange5">.</div>
        <div class="orange6">.</div>
        <div class="orange7">.</div>
        <div class="orange8">.</div>
        <div class="orange9">.</div>
        <div class="yellow1">.</div>
        <div class="yellow2">.</div>
        <div class="yellow3">.</div>
        <div class="yellow4">.</div>
        <div class="yellow5">.</div>
        <div class="yellow6">.</div>
        <div class="yellow7">.</div>
        <div class="yellow8">.</div>
        <div class="yellow9">.</div>
    </div>
</section>

<style>
    .direct-descendants>.abc {
        color: teal;
    }

    .adjacent+.adjacent {
        color: red;
    }

    .any-child .abc {
        color: limegreen;
    }
</style>

<div class="direct-descendants mb">
    <div class="abc">pick me!</div>
    <div>
        <div class="abc">not me</div>
    </div>
    <div class="abc">pick me!</div>
</div>

<div class="any-child mb">
    <div class="abc">pick me!</div>
    <div>
        <div class="abc">pick me!</div>
    </div>
    <div class="abc">pick me!</div>
</div>

<div class="mb">
    <div class="adjacent">not me</div>
    <div class="adjacent">pick me!</div>
    <div class="adjacent">pick me!</div>
    <div>
        <div class="adjacent">not me</div>
    </div>
</div>
<hr class="my-5">
