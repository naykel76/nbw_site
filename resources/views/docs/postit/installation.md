# Postit Package

<p class="lead">Page management package for Naykel Laravel applications.</p>

- [Install the package](#install-the-package)
    - [Finalising The Installation](#finalising-the-installation)
- [TLDR](#tldr)

## Install the package

To get started, install Postit using the Composer package manager:

    composer require naykel/postit

After installing the package, you should execute the `postit:install` Artisan command to create the
content storage disk in `config\filesystems.php`;

### Finalising The Installation

After installing Postit, you should migrate your database and make the necessary changes to the User model:

    php artisan migrate


## TLDR

**Install Package**

**Run `postit:install` (adds storage disk)**

**Add wildcard route to `web.php`**

    /** ---------------------------------------------------------------------------
    *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
    * ------------------------------------------------------------------------- */
    // /////////////////////////////////////////////////////////////////////////////
    // Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
    // /////////////////////////////////////////////////////////////////////////////
    /** ---------------------------------------------------------------------------
    *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
    * ------------------------------------------------------------------------- */

**Add navigation link to admin nav**

    {
        "name": "Posts",
        "route_name": "admin.posts.index",
        "icon": "document-text",
        "exclude_route": true
    }