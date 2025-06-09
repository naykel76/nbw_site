# Trouble Shooting

<p class="lead">This page has some general trouble shooting tips for when the s**t inevitably hits the fan and you are tearing your hair out.</p>

<!-- TOC -->

- [RouterLink not working](#routerlink-not-working)
- [Component not loading as expected](#component-not-loading-as-expected)

<!-- /TOC -->

<a id="markdown-routerlink-not-working" name="routerlink-not-working"></a>

## RouterLink not working

Make sure you have imported the `RouterLink` directive to the `imports` array in `app.component.ts`.


<a id="markdown-component-not-loading-as-expected" name="component-not-loading-as-expected"></a>

## Component not loading as expected

Make sure you are using the proper selector. For example, if you have a `ModalComponent` the
default selector will be `app-modal` NOT `modal-component`.
