# Authentication



<!-- MarkdownTOC -->

- [Manually Authenticate User](#manually-authenticate-user)
  - [Create Roles and Permissions](#create-roles-and-permissions)
  - [Assign Roles to Permissions or Permissions to Roles](#assign-roles-to-permissions-or-permissions-to-roles)
  - [Using Permissions via Roles](#using-permissions-via-roles)

<!-- /MarkdownTOC -->

<a id="manually-authenticate-user"></a>
## Manually Authenticate User

```php
Auth::loginUsingId(1);
```

<a id="spatie-permissions-and-roles"></a>
##Spatie Permissions and Roles

<a id="create-roles-and-permissions"></a>
### Create Roles and Permissions

```php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name' => 'writer']); //create role
$permission = Permission::create(['name' => 'edit articles']); //create permission
```

<a id="assign-roles-to-permissions-or-permissions-to-roles"></a>
### Assign Roles to Permissions or Permissions to Roles

```php
// A permission can be assigned to a role using 1 of these methods:
$role->givePermissionTo($permission);
$permission->assignRole($role);

// Multiple permissions can be synced to a role using 1 of these methods:
$role = Role::create(['name' => 'admin']);
$permissions = ['create', 'edit'];
$role->syncPermissions($permissions);
	or
$permission->syncRoles($roles);
```

A permission can be given to any user:

```php

$user->givePermissionTo('edit articles');

// You can also give multiple permission at once
$user->givePermissionTo('edit articles', 'delete articles');

// You may also pass an array
$user->givePermissionTo(['edit articles', 'delete articles']);
```


<a id="using-permissions-via-roles"></a>
### Using Permissions via Roles

A role can be assigned to any user:

```php
// assign single role
$user->assignRole('writer');
// You can also assign multiple roles at once
$user->assignRole(['writer', 'admin']);

```
