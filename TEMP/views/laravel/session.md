
## Session

| Action                  | Command                               |
| :---------------------- | :------------------------------------ |
| Delete key from session | `session()->forget('key')`            |
| Delete multiple keys    | `session()->forget(['key1', 'key2'])` |
| Delete multiple keys    | `session()->flush()`                  |
| Check existence         | `session()->has('users')`             |
| Retrieve data           | `session('key');`                     |

