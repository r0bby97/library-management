# Library Management

A library-themed web coursework project built with HTML, CSS, JavaScript/jQuery and PHP. It contains pages for browsing books, viewing book details, user accounts, ratings and wishlists.

The repository was previously named `filmdatenbank`; the actual interface and content focus on books.

## What is included

- A home page and a catalog with individual book pages.
- Interfaces for registration, login, accounts and user lists.
- Pages for adding books, rating books and viewing wishlists.
- A PHP/MySQL registration exercise in `php/DBverwaltung.php`.

Some pages are interface exercises rather than complete backend features. This is a learning project, not a production library system.

## Preview the interface

Open `index.html` in a browser, or serve the folder locally:

```bash
python3 -m http.server 8000
```

Then visit [localhost:8000](http://localhost:8000). This previews the static interface only; Python's static server does not execute PHP.

## PHP/MySQL exercise

For the registration exercise, use a local PHP server with the `mysqli` extension and MySQL/MariaDB. Create the database referenced by `php/DBverwaltung.php` (originally `robert3`) and adjust its local connection settings. The script creates the `users` table when it runs.

From the repository root, a local PHP server can be started with:

```bash
php -S localhost:8000
```

Use dummy data only: the original exercise interpolates input into SQL and stores passwords without hashing. Prepared statements, password hashing and a complete authentication flow are necessary before any real deployment.

GitHub Pages cannot run this PHP/MySQL backend, so no complete live application is linked here.

## Structure

- `*.html`: interface pages.
- `css/`: page styles.
- `bilder/`: book and interface images.
- `scripts/`: bundled JavaScript library.
- `php/`: database exercise.

## Feedback and contributions

For a bug report, open a repository issue with steps to reproduce, expected and actual behavior, and your browser or device details. Discuss substantial changes in an issue before opening a pull request. Keep changes focused and describe how you checked them.
