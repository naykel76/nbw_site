
# Authit

<p class="lead">Authentication and user management with permissions for Naykel Laravel applications.</p>

- [Installation](#installation)
- [Finalising The Installation](#finalising-the-installation)
  - [Seeding Users and Permissions](#seeding-users-and-permissions)
- [Configuration](#configuration)
  - [`NK_ALLOW_REGISTER`](#nk_allow_register)
  - [`NK_USE_SINGLE_NAME_FIELD`](#nk_use_single_name_field)
- [Routes (WIP)](#routes-wip)

## Installation

To get started, install Authit using the Composer package manager:

```bash
composer require naykel/authit
```

Next, install Authit resources by executing the the `authit:install` command:

```bash
php artisan authit:install
```

Throughout the installation, you'll be prompted with a sequence of questions to configure the
package setup. Here's a basic outline of the installation choices and their effects:

```mermaid +parse
<x-mermaid>
flowchart TD
    InstallOption --> UsePermissions{Use<br> Permissions?}
    UsePermissions ---->|Yes| CopyMigration[Publish Migration<br> and Config]
    CopyMigration --> UpdateBootstrap[Add middleware to <br>bootstrap/app.php]
    
    InstallOption --> SingleNameField{Use Single <br> Name Field?}
    SingleNameField ---->|No| UpdateEnv[Add key to <br> .env file]
    UpdateEnv --> UpdateStuff[Update User Model <br> and Migration]

    InstallOption --> UseDashboard{Include User <br>Dashboard?}
    UseDashboard ---->|Yes| CopyUserDashboard[Publish <br> user.dashboard]
    CopyUserDashboard --> AddUserRoute[Add user.dashboard <br> route to web.php]

    InstallOption --> AdminDashboard{Include Admin <br>Dashboard?}
    AdminDashboard ---->|Yes| CopyAdminDashboard[Publish <br> admin.dashboard]
    CopyAdminDashboard --> AddAdminRoute[Add admin.dashboard <br> route to web.php]
</x-mermaid>
```

```html +parse
<x-gt-alert type="info">
    When using dashboards, the views are copied locally to the appropriate <code>admin</code> or
    <code>user</code> directory, with the package managing the route. If necessary, these routes can be
    overridden in the <code>web.php</code> file.
</x-gt-alert>
```

## Finalising The Installation

After installing Authit, you should migrate your database and make the necessary changes to the User model:

```bash
php artisan migrate
```

### Seeding Users and Permissions

Seed default permissions direct from the package:

```bash
# include seeder in project
$this->call(\Naykel\Authit\Database\Seeders\RolesPermissionsSeeder::class);
# seed from command line
php artisan db:seed --class=Naykel\\Authit\\Database\\Seeders\\RolesPermissionsSeeder

# NOT SAFE FOR PRODUCTION
$this->call(\Naykel\Authit\Database\Seeders\UsersSeeder::class);
```

Alternatively you can publish and run seeders locally with:

    php artisan vendor:publish --tag=authit-permissions


## Configuration

Authit provides a number of configuration options that you can adjust to suit your
application's needs. These options can be set in your `.env` file. Alternatively you can
publish the configuration file using the following command:

```bash
php artisan vendor:publish --tag=authit-config
```

**The following configuration options are set during the installation process**

### `NK_ALLOW_REGISTER`

By default, when Authit is installed, the registration form and routes are enabled. If
you would like to disable registration, you can set the `NK_ALLOW_REGISTER` to `false`
in your `.env` file:

Please note that this does not prevent users from being created. It only disables the
registration form. All other user creation methods and routes are still available.


```bash
NK_ALLOW_REGISTER=false
```

```html +parse
<x-gt-alert type="warning">
Note, disabling registration will also hide the registration links.
</x-gt-alert>
```

### `NK_USE_SINGLE_NAME_FIELD`

By default when registering a user account, the system uses a single `name` field.
However, if you prefer to use separate `first_name` and `last_name` fields, you can set
the following in your `.env` file:

This will update the registration form and user migration to include separate
`first_name` and `last_name` fields.

```bash
NK_USE_SINGLE_NAME_FIELD=false
```

## Routes (WIP)

All user routes are prefixed with `user.` and all admin routes are prefixed with `admin.`.


| Verb     | URI                  | Route Name                  | Description                           |
| -------- | -------------------- | --------------------------- | ------------------------------------- |
| `GET`    | `admin`              | `admin`                     | Displays the admin dashboard          |
| `POST`   | `admin/users`        | `admin.users.store`         | Creates a new user                    |
| `GET`    | `admin/users/:id`    | `admin.users.show`          | Displays a specific user              |
| `PUT`    | `admin/users/:id`    | `admin.users.update`        | Updates a specific user               |
| `DELETE` | `admin/users/:id`    | `admin.users.delete`        | Deletes a specific user               |
| `GET`    | `users/dashboard`    | `users.dashboard`           | Displays the user's dashboard         |
| `GET`    | `users/account`      | `users.account`             | Displays the user's account details   |
| `PUT`    | `users/account`      | `users.account.update`      | Updates the user's account details    |
| `GET`    | `users/edit-profile` | `users.edit-profile`        | Displays the user's profile edit form |
| `PUT`    | `users/edit-profile` | `users.edit-profile.update` | Updates the user's profile            |


