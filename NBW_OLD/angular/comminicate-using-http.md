# Communicating Using HTTP
<!-- TOC -->

- [Setup for server communication](#setup-for-server-communication)
- [Requesting data from a server](#requesting-data-from-a-server)
    - [Subscribing to the Observable](#subscribing-to-the-observable)

<!-- /TOC -->

<a id="markdown-setup-for-server-communication" name="setup-for-server-communication"></a>

## Setup for server communication

Before you can use `HttpClient`, you need to import and the Angular `HttpClientModule` to the providers array in in `app.config.ts`:

```js
import { HttpClientModule } from '@angular/common/http';

export const appConfig: ApplicationConfig = {
    providers: [
        ..., // other providers
        HttpClientModule()
    ]
};
```

You can then inject the `HttpClient` service into your component or service. Note that the
`HttpClient` returns an `Observable` object so you also need to import `Observable` from `rxjs`.

```js
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export class HttpTestingService {
    constructor(private http: HttpClient) { }
}
```

<a id="markdown-requesting-data-from-a-server" name="requesting-data-from-a-server"></a>

## Requesting data from a server

Use the `HttpClient.get()` method to fetch data from a server. The `HttpClient` makes a request to
the server and returns an `Observable` object. The `get()` method takes two arguments; the
endpoint URL from which to fetch, and an options object that is used to configure the request.

The return type varies based on the `observe` and `responseType` values that you pass to the call.

```js
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export class HttpTestingService {

    private baseURL = 'http://localhost:3232'
    private http = inject(HttpClient);

    getJsonResponse(): Observable<any> {
        return this.http.get<JSON>(`${this.baseURL}/api/json-response`);
    }
}
```

<a id="markdown-subscribing-to-the-observable" name="subscribing-to-the-observable"></a>

### Subscribing to the Observable

Once you have the `Observable` object, you can then subscribe to the the data.

```js
export class HttpTestingComponent {

    private httpTestingService = inject(HttpTestingService);

    getJsonResponse() {
        this.httpTestingService.getJsonResponse().subscribe((data) => {
            console.log(data);
        });
    }
}
```
