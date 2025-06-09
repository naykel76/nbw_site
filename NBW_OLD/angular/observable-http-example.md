# HTTP Observable Example

<!-- TOC -->

- [Create the service, observable and fetch the data](#create-the-service-observable-and-fetch-the-data)
- [Subscribe to the observable in the component](#subscribe-to-the-observable-in-the-component)
    - [Filter the observable data](#filter-the-observable-data)

<!-- /TOC -->

<a id="markdown-create-the-service-observable-and-fetch-the-data" name="create-the-service-observable-and-fetch-the-data"></a>

## Create the service, observable and fetch the data

Note: this example is extending a HTTP service that I created, but you can use the Angular HTTP
service instead.


```typescript
export class GroupService extends HttpService<any>   {

    // Define a private BehaviorSubject
    private _groups$ = new BehaviorSubject<Group | null>(null);
    // API endpoint
    private endpoint: string = '/api/groups';

    // Get the BehaviorSubject as an Observable
    // This is the public interface that the component will subscribe to
    groupsSubject(): Observable<Group | null> {
        return this._groups$.asObservable();
    }

    // run `GET` request, then Update the BehaviorSubject with the fetched data
    index(): void {
        this.get(this.endpoint).subscribe((data: Group) => this._groups$.next(data));
    }
}
```

<a id="markdown-subscribe-to-the-observable-in-the-component" name="subscribe-to-the-observable-in-the-component"></a>

## Subscribe to the observable in the component

The `service.index` method does not subscribe to the observable, it simply instructs the service
to fetch the data. ***The actual subscription to the observable and fetching of the data only
occurs when a component subscribes to it.***


```typescript
ngOnInit() {
    // fetch the data when the component is initialised
    this.groupService.index();

    // Subscribe to the observable to access the fetched data
    this.groupService.groupsSubject().subscribe((data: Group | null) => {
        // Now you can work with the fetched data, which is available in 'data'
    });
}
```

<a id="markdown-filter-the-observable-data" name="filter-the-observable-data"></a>

### Filter the observable data
