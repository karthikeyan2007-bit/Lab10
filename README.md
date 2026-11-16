# Lab 10 — PHP web applications

Three PHP programs behind one landing page (`index.php`).

| Program | Files | What it does |
|---|---|---|
| **a** Sessions | `a-session/index.php` → `login.php` → `hello.php` → `logout.php` | Takes a name, stores the name and start time in `$_SESSION`, shows a hello page with the start time in the top-right corner and a Logout button. Logout destroys the session and shows a Thank You page with the duration of usage. |
| **b** Date/time | `b-datetime/index.php` | Prints the current date, time and day with `date()` (Asia/Kolkata). |
| **c** Age check | `c-age/index.html` → `check.php` | HTML form posts name + age. Under 18: *"Hello NAME, you are not authorized to visit the site"*. Otherwise: *"Welcome to this site"*. |

Shared pieces: `includes/layout.php` (page header/footer, `e()` escaping, `human_duration()`), `assets/style.css`.

## Run

```bash
php -S localhost:8150 -t .
```

Then open http://localhost:8150/.

## Hosting on Render

Live: **https://lab10-php.onrender.com**

GitHub Pages can't run PHP, so this repo ships a `Dockerfile` (PHP 8.4 + Apache, Asia/Kolkata timezone) and a `render.yaml` Blueprint for a free Render web service. The free instance sleeps when idle, so the first request after a while takes ~50 s.

Local check:

```bash
docker build -t lab10 . && docker run -p 8150:80 lab10
```
