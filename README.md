# InstaSam

## Directories and Files

#### index.php

The entry point of the application.

#### sql

.sql files to help setup the database and add dummy data.

#### api

All of the server side PHP code lives here.

* `helpers.php`: Any helper functions that all files could use
* `database.php`: Connects to the database
* `queries.php`: All of the SQL queries for the database
* `login.php`: Login an existing user
* `comments.php`: GET and POST comments for insta_posts
* `insta_posts.php`: GET and POST insta_posts
* `users.php`: GET and POST users

#### css

All of the css styles.

#### js

All of the client side JavaScript

* `lib`: Any third party libraries
* `elements.js`: Contains any HTML elements constructed by JavaScript.
* `networkRequests.js`: Contains any ajax requests to the server.
* `script.js`: The main JS file where we put most of our logic.