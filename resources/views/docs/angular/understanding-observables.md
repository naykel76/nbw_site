# Using Observables

<!-- TOC -->

- [Define the observable/subject/publisher](#define-the-observablesubjectpublisher)
- [Subscribe to the observable](#subscribe-to-the-observable)
- [Emit a new value](#emit-a-new-value)
- [Full Example](#full-example)
    - [Basic Example](#basic-example)
- [Additional Resources](#additional-resources)

<!-- /TOC -->



<a id="markdown-define-the-observablesubjectpublisher" name="define-the-observablesubjectpublisher"></a>

## Define the observable/subject/publisher

The terms `subject`, `publisher`, and `observable` are used interchangeably.

A `subject` acts as a data source that can emit a sequence of values over time. It serves as a way
to both produce and subscribe to data changes. Subjects are often used in communication between
components, in place of `@Input` and `@Output` annotations.

A `subject` maintains a list of its observers, commonly referred to as subscribers. Whenever the
state changes, the `subject` automatically notifies its subscribers.

You can think of subjects like event emitters, that maintain a registry of many listeners. When
something happens, the subject emits an event or value to its subscribers.


```js
// score.service.ts
gameStats: GameStats = { score: 0, lines: 0, level: 1, levelUp: 10 };

private scoreSubject = new BehaviorSubject<GameStats>(this.gameStats);

getScoreObservable(): Observable<GameStats> {
    return this.scoreSubject.asObservable();
}
```

In the service, we create a `BehaviorSubject` instance, which is a type of subject that requires
an initial value and emits its current value to new subscribers.

<a id="markdown-subscribe-to-the-observable" name="subscribe-to-the-observable"></a>

## Subscribe to the observable

A 'subscription' is an object used to establish a connection between an Observable and its
Observer. It allows you to receive values and notifications emitted by the Observable. Once you
subscribe to an Observable, the Observer's methods (such as next, error, and complete) get invoked
as the Observable emits values or completes.

An Observable instance begins publishing values only when someone subscribes to it. You subscribe
by calling the subscribe() method of the instance, passing an observer object to receive the
notifications.

```js
// score.component.ts
private scoreService = inject(ScoreService);

gameStats: GameStats = { score: 0, lines: 0, level: 0, levelUp: 0 };

ngOnInit(): void {
    this.scoreService.getScoreObservable().subscribe((stats: GameStats) => {
        this.gameStats = stats;
    })
}
```

In the component, we subscribe to the observable and update the game stats when a new value is
emitted. The `subscribe()` method takes up to three arguments: `next`, `error`, and `complete`. We
only need to handle `next` in this example.

<a id="markdown-emit-a-new-value" name="emit-a-new-value"></a>

## Emit a new value

```js
export class ScoreService {

    gameStats: GameStats = { score: 0, lines: 0, level: 1, levelUp: 10 };

    private scoreSubject = new BehaviorSubject<GameStats>(this.gameStats);

    getScoreObservable(): Observable<GameStats> {
        return this.scoreSubject.asObservable();
    }

    updateScore(gameStats: GameStats): void {
        this.scoreSubject.next(gameStats);
    }
}
```


<a id="markdown-full-example" name="full-example"></a>

## Full Example

```js
// score.component.ts
export class ScoreService {

    gameStats: GameStats = { score: 0, lines: 0, level: 1, levelUp: 10 };

    private scoreSubject = new BehaviorSubject<GameStats>(this.gameStats);

    getScoreObservable(): Observable<GameStats> {
        return this.scoreSubject.asObservable();
    }

    updateScore(gameStats: GameStats): void {
        this.scoreSubject.next(gameStats);
    }
}
```


```js
// score.component.ts
export class ScoreService {

    gameStats: GameStats = { score: 0, lines: 0, level: 1, levelUp: 10 };

    private scoreSubject = new BehaviorSubject<GameStats>(this.gameStats);

    getScoreObservable(): Observable<GameStats> {
        return this.scoreSubject.asObservable();
    }
}
```


<a id="markdown-basic-example" name="basic-example"></a>

### Basic Example

```js
// Creating an Observable
observable = new Observable(subscriber => {
    subscriber.next('Here is a message');
    subscriber.next('Here is another');
    subscriber.complete();
});
```

```js
// Subscribing to the Observable
subscription = this.observable.subscribe({
    next: value => console.log(value),
    complete: () => console.log('Observable completed')
});
```

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

<a href="https://angular.io/guide/observables" target="blank">https://angular.io/guide/observables</a>
