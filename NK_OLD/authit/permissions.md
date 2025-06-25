# Permissions

- [Introduction](#introduction)
- [Methods](#methods)
  - [Assigning Permissions and Roles](#assigning-permissions-and-roles)
  - [Checking Permissions](#checking-permissions)
- [Permissions via Roles](#permissions-via-roles)
  - [Assign and Revoke Roles](#assign-and-revoke-roles)
  - [Checking Roles](#checking-roles)
- [Other Methods to Document](#other-methods-to-document)

## Introduction

Authit uses the <a href="https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage"
target="blank">Laravel-Permission</a> package by Spatie to manage roles and permissions.

There are no additional actions required to use permissions, as the config, migrations and
middleware are handled during the installation process.

```html +parse
<x-gt-alert type="warning">
According to the Laravel-Permission documentation, it's better to assign permissions to Roles, and
then assign Roles to Users. See the <a href="https://spatie.be/docs/laravel-permission/v6/best-practices/roles-vs-permissions"
target="blank">Roles vs Permissions</a> for a deeper explanation.
</x-gt-alert>
```

## Methods

### Assigning Permissions and Roles

```php +torchlight-php
$user->givePermissionTo('edit articles');
$user->givePermissionTo('edit articles', 'delete articles');
$user->givePermissionTo(['edit articles', 'delete articles']);
$user->revokePermissionTo('edit articles');
$user->syncPermissions(['edit articles', 'delete articles']);
```

### Checking Permissions

```php +torchlight-php
$user->hasAllPermissions(['edit articles', 'publish articles']);
$user->hasAnyPermission(['edit articles', 'publish articles']);
$user->hasAnyPermission(['edit articles', 1, 5]);

$user->hasPermissionTo($somePermission->id);
$user->hasPermissionTo('1');
$user->hasPermissionTo('edit articles');
$user->hasPermissionTo(Permission::find(1)->id);
```


```php +torchlight-php
// you can also use laravel's can and cannot methods
$user->can('edit articles');
```

## Permissions via Roles


### Assign and Revoke Roles

```php +torchlight-php
$user->givePermissionTo('delete articles');
```

### Checking Roles

```php +torchlight-php
$user->hasRole('writer');
$user->hasRole(['editor', 'moderator']); // at least one role from an array of roles
```

---

## Other Methods to Document

```php +torchlight-php
$role = Role::findByName('writer');
$role->givePermissionTo('edit articles');
$role->givePermissionTo('edit articles');
$role->hasPermissionTo('edit articles');
$role->permissions->count();
$role->permissions->pluck('name');
$role->permissions;
$role->revokePermissionTo('edit articles');
$role->syncPermissions(['edit articles', 'delete articles']);
$user->assignRole('writer');
$user->assignRole('writer');
$user->assignRole('writer', 'admin');
$user->assignRole(['writer', 'admin']);
$user->getAllPermissions();
$user->getDirectPermissions() // Or $user->permissions;
$user->getPermissionsViaRoles();
$user->hasAllDirectPermissions(['edit articles', 'delete articles']);
$user->hasAllRoles(Role::all());
$user->hasAnyDirectPermission(['create articles', 'delete articles']);
$user->hasAnyRole('writer', 'reader');
$user->hasAnyRole(['writer', 'reader']);
$user->hasDirectPermission('edit articles')
$user->hasExactRoles(Role::all());

$user->removeRole('writer');
$user->syncRoles(['writer', 'admin']);
```