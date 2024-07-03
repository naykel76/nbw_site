
```php
public string $greeting = 'Hey there!';

public function changeGreeting()
{
    $greetings = ['Hey there!', 'Hello!', 'Aloha!', 'Hi!'];
    $this->greeting = $greetings[array_rand($greetings)];
}
```

```html
<div class="my flex items-center">
    <x-gt-button wire:click="changeGreeting" text="Change Greeting" class="dark" />

    <div x-data="greet" class="mx">
        <div x-text="msg"> </div>
    </div>

    @script
        <script>
            Alpine.data('greet', () => {
                return {
                    count: 0,
                    init() {
                        this.msg = this.$wire.greeting;
                        this.$wire.$watch('greeting', () => console.log('Times Changed', this.count++));
                    },
                }
            });
        </script>
    @endscript
</div>
```