<!-- MarkdownTOC -->

- [Local Composer Packages](#local-composer-packages)
- [Seeders](#seeders)
    - [User Seeder](#user-seeder)
- [User Seeder (with permissions)](#user-seeder-with-permissions)

<!-- /MarkdownTOC -->

<a id="local-composer-packages"></a>
## Local Composer Packages

``` json
"repositories": {
    "naykel/authit": {
        "type": "path",
        "url": "C:\\Users\\nayke\\sites\\nk_packages\\authit",
        "options": {
            "symlink": true
        }
    },
    "naykel/gotime": {
        "type": "path",
        "url": "C:\\Users\\nayke\\sites\\nk_packages\\gotime",
        "options": {
            "symlink": true
        }
    }
}
```

<a id="seeders"></a>
## Seeders

<a id="user-seeder"></a>
### User Seeder

```php
 \App\Models\User::create([
    'name' => 'Nathan Watts',
    'email' => 'nathan@naykel.com.au',
    'password' => '$2y$10$P2MbdroLtUcfnuCaPV3.k.PdCalluZVtS1SYMQSv6mQVXKb4tyxwC',
    'email_verified_at' => now(),
    'phone' => '0408 887 461',
    'street' => '427 Boon Street',
    'city' => 'Brisbane',
    'postcode' => 4001,
    'state' => 'Queensland',
])->assignRole('super');
```

<a id="user-seeder-with-permissions"></a>
## User Seeder (with permissions)

```php
\App\Models\User::create([
    'name' => 'Nathan Watts',
    'email' => 'nathan@naykel.com.au',
    'password' => bcrypt('1'),
    'email_verified_at' => now(),
])->assignRole('super')->givePermissionTo(['see all', 'access admin']);

\App\Models\User::create([
    'name' => 'Angela Bailey',
    'email' => 'admin@example.com',
    'password' => bcrypt('1'),
    'email_verified_at' => now(),
 ])->assignRole('admin')->givePermissionTo('access admin');

\App\Models\User::create([
    'name' => 'Jimmy Peters',
    'email' => 'user@example.com',
    'password' => bcrypt('1'),
    'email_verified_at' => now(),
    'phone' => '0412 123 456',
    'street' => '427 Boon Street',
    'city' => 'Brisbane',
    'postcode' => 4001,
    'state' => 'Queensland'
]);
```
