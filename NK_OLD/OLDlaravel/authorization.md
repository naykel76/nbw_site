# Authorization and Security

##

```php +torchlight-php
public function delete($id)
{
    // INSECURE!
    $post = Post::find($id);
    $post->delete();
}
```

```bash
php artisan make:policy PostPolicy --model=Post
```

```php +torchlight-php
<?php
 
namespace App\Policies;
 
use App\Models\Post;
use App\Models\User;
 
class PostPolicy
{
    public function delete(?User $user, Post $post): bool
    {
        return $user?->id === $post->user_id;
    }
}
```
##



#### Determine if the two models have the same ID and belong to the same table

If this user 'id' the currently authenticated user, then you are authorized.

```php +torchlight-php
$user->is(Auth::user());
$user->isNot(Auth::user());

$user->is($post->user);
$user->isNot($post->user);


$user->can();
$user->cannot();
```


## Additional Resources

- <a href="https://laravel.com/docs/11.x/authorization#gates" target="blank">Laravel Gates</a>
- <a href="https://laravel.com/docs/11.x/authorization#creating-policies" target="blank">Laravel Policies</a>