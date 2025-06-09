# Postit Database Design

## Posts Table

## Purpose  

This table stores information about various types of content, such as blog posts,
articles, pages, and categories. It is designed as a generic content table that supports
multiple use cases, including hierarchical categorisation and flexible layout rendering.

## Schema  

This section outlines the structure of the table, including its columns, data types, and
any constraints. 

| Column | Type | Description                     | Constraints        |
| ------ | ---- | ------------------------------- | ------------------ |
| `id`   | INT  | Unique identifier for each item | PK, AUTO INCREMENT |


## Schema  

This section outlines the structure of the table, including its columns, data types, and any constraints.  

| Column         | Type       | Description                                         | Constraints          |
| -------------- | ---------- | --------------------------------------------------- | -------------------- |
| `id`           | INT        | Unique identifier for each post                     | PK, AUTO INCREMENT   |
| `title`        | VARCHAR    | Title of the post                                   | REQUIRED             |
| `slug`         | VARCHAR    | URL-friendly identifier                             | REQUIRED, UNIQUE     |
| `intro`        | MEDIUMTEXT | Optional introduction or summary                    | NULLABLE             |
| `headline`     | MEDIUMTEXT | Optional headline, different from the title         | NULLABLE             |
| `body`         | LONGTEXT   | Main content body                                   | NULLABLE             |
| `published_at` | DATETIME   | Date and time when the post is considered published | NULLABLE             |
| `created_at`   | DATETIME   | Timestamp when the post was created                 | MANAGED BY FRAMEWORK |
| `updated_at`   | DATETIME   | Timestamp when the post was last updated            | MANAGED BY FRAMEWORK |
| `route_prefix` | VARCHAR    | Optional prefix used for routing                    | NULLABLE             |
| `is_category`  | BOOLEAN    | Marks the post as a category                        | NULLABLE, DEFAULT 0  |
| `image_name`   | VARCHAR    | Name of the image associated with the post          | NULLABLE             |
| `extras`       | JSON       | Optional JSON-based for additional data             | NULLABLE             |
| `layout`       | VARCHAR    | Template to render                                  | NULLABLE             |
| `position`     | INT        | Controls manual ordering                            | NULLABLE, DEFAULT 0  |


## Relationships  

This section describes how this table relates to other tables in the database.

## Query Examples



  

<!--   
## Relationships  

- May support self-referencing for parent-child category relationships  
- Can be extended to relate to users, tags, or metadata via joins or pivot tables  

## Query Examples  

   Find all published posts:
     select * from posts where published_at is not null

   Get all categories:
     select * from posts where is_category = 1

   Order posts by custom sort order:
     select * from posts order by sort_order asc

Let me know if you want the relationships section expanded to reflect future features. -->