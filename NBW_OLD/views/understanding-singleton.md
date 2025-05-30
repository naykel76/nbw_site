
# Why use a Singleton

The purpose of registering a class as a singleton in the service provider is to instruct Laravel's
service container to provide the same instance of the class whenever it is resolved. This can be
useful in scenarios where you want to share the same instance of an object across multiple parts
of your application. Take for example ...


###### Example to review
....................

The `Cart` class implements the `CartContract`, to allow this to work or resolve you need to bind them in the service provider

The `CartContract` interface in the Cart class and the registration of the Cart class as a singleton instance of the CartContract interface in the BuyitServiceProvider class are related.

In Laravel, interfaces are often used to define contracts or blueprints for classes that implement them. By utilizing an interface, you can define a set of methods that a class must implement, ensuring a consistent API across multiple implementations.

In this case, the CartContract interface likely defines a set of methods that any shopping cart implementation should have. For example, it might include methods like add(), remove(), getItems(), etc. By having the Cart class implement the CartContract interface (class Cart implements CartContract), it guarantees that the Cart class has implemented all the methods defined in the interface.

Now, coming to the registration of the Cart class as a singleton instance of the CartContract interface in the BuyitServiceProvider class (public $singletons = [ CartContract::class => Cart::class ]), it serves a couple of purposes:

Dependency Injection: By registering CartContract::class as a singleton, whenever the application needs an instance of CartContract, it will receive an instance of the Cart class. This allows the code to depend on the CartContract interface rather than directly depending on the Cart class, promoting loose coupling and making it easier to swap out the cart implementation in the future if needed.

Interface Binding: Laravel's service container uses the registered bindings to resolve dependencies. In this case, when resolving CartContract::class, it will instantiate the Cart class as a singleton. This means that every time the application requests an instance of CartContract, it will receive the same instance of the Cart class.

To summarize, the use of the CartContract interface in the Cart class ensures that the Cart class adheres to the defined contract. The registration of Cart::class as a singleton instance of CartContract in the BuyitServiceProvider allows the application to depend on CartContract throughout the codebase and receive a consistent instance of the Cart class when it needs a shopping cart implementation.
