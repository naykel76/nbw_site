# MongoDB
<!-- TOC -->

- [Getting Started](#getting-started)
- [Insert commands](#insert-commands)
- [Find commands](#find-commands)
    - [Sorting results](#sorting-results)
- [Delete commands](#delete-commands)
- [Update commands](#update-commands)
- [Aggregation commands](#aggregation-commands)

<!-- /TOC -->
<a id="markdown-getting-started" name="getting-started"></a>

## Getting Started

| Command            | Description                                   |
| ------------------ | --------------------------------------------- |
| `mongo`            | Start the MongoDB shell.                      |
| `mongod`           | Start the MongoDB server.                     |
| `db`               | Show the current database.                    |
| `show dbs`         | List all available databases.                 |
| `use <database>`   | Switch to a specific database.                |
| `show collections` | List all collections in the current database. |

<a id="markdown-insert-commands" name="insert-commands"></a>

## Insert commands

| Command                          | Description                              |
| -------------------------------- | ---------------------------------------- |
| `db.collectionName.insert()`     | Insert a document into a collection.     |
| `db.collectionName.insertMany()` | Insert many documents into a collection. |


```js
db.products.insertOne({ name: "Product 2", price: 19.99 })

db.products.insertMany([
    { name: "Product 1", description: "Description of Product 1.", price: 19.99, units: 50 },
    { name: "Product 2", description: "Description for Product 2.", price: 29.99, units: 30 },
    { name: "Product 3", description: "Description for Product 3.", price: 9.49, units: 100 },
])
```

<a id="markdown-find-commands" name="find-commands"></a>

## Find commands

| Command                                | Description                                      |
| -------------------------------------- | ------------------------------------------------ |
| `db.collectionName.find().limit()`     | Limit the number of results in a query.          |
| `db.collectionName.find().skip()`      | Skip a specified number of results in a query.   |
| `db.collectionName.find().count()`     | Count the number of documents in a collection.   |
| `db.collectionName.find().distinct()`  | Find distinct values in a field.                 |
| `db.collectionName.find().pretty()`    | Format query results for readability.            |
| `db.collectionName.find().explain()`   | Get query execution plan and statistics.         |
| `db.collectionName.find().forEach()`   | Iterate over query results and apply a function. |
| `db.collectionName.find().mapReduce()` | Perform map-reduce operations.                   |
| `db.collectionName.find().hint()`      | Force MongoDB to use a specific index.           |

```js
db.products.find() // all
db.products.find({field: value}) // filter
db.products.find({field: value}, { field: 1, otherField: 1 }) // filter and show fields
```

<a id="markdown-sorting-results" name="sorting-results"></a>

### Sorting results

```js
db.collectionName.find().sort({ sortBy: 1 }) // ascending
db.collectionName.find().sort({ sortBy: -1 }) // descending
// sort by multiple fields
db.collectionName.find().sort({ sortBy: 1, anotherSortBy: 1 })
db.collectionName.find().sort({ sortBy: -1, anotherSortBy: 1 })
```

<a id="markdown-delete-commands" name="delete-commands"></a>

## Delete commands

| Command                          | Description                                  |
| -------------------------------- | -------------------------------------------- |
| `db.collectionName.deleteOne()`  | Delete a single document from a collection.  |
| `db.collectionName.deleteMany()` | Delete multiple documents from a collection. |


```js
db.products.deleteOne({ name: "Product 1"})
// delete all
db.products.deleteMany({})
```

<a id="markdown-update-commands" name="update-commands"></a>

## Update commands

```js
db.products.updateOne({ name: "Product 1"}, { $set: { price: 29.99 }})
```


| `db.collectionName.update()`              | Update documents in a collection.                  |
| `db.collectionName.remove()`              | Remove documents from a collection.                |
| `db.collectionName.aggregate()`           | Perform aggregation operations on a collection.    |
| `db.collectionName.createIndex()`         | Create an index on a collection field.             |
| `db.collectionName.dropIndex()`           | Delete an index from a collection.                 |

<a id="markdown-aggregation-commands" name="aggregation-commands"></a>

## Aggregation commands

| Command                                   | Description                                        |
| ----------------------------------------- | -------------------------------------------------- |
| `db.collectionName.aggregate().unwind()`  | Deconstruct an array field.                        |
| `db.collectionName.aggregate().group()`   | Group documents by a specified field.              |
| `db.collectionName.aggregate().match()`   | Filter documents in an aggregation pipeline.       |
| `db.collectionName.aggregate().sort()`    | Sort documents in an aggregation pipeline.         |
| `db.collectionName.aggregate().project()` | Include or exclude fields in an aggregation.       |
| `db.collectionName.aggregate().lookup()`  | Perform a left outer join with another collection. |


