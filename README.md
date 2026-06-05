# Laravel 10 | PHP 8.2 - Perumahan application

## Run Locally

Clone project

```bash
  git clone https://github.com/yogabagaskurniawan/perumahan.git
```

Buka direktori projek

```bash
  cd perumahan
```

Selanjutnya ketikan perintah

```bash
    composer install
```

-   Copy file .env.example ke .env dan edit kredensial database di sana. (perintah dibawah ini untuk CMD di Windows)

```bash
    copy .env.example .env
```

-   Selanjutnya generate app key

```bash
    php artisan key:generate
```

```bash
    php artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
```

#### Login

-   email = admin@example.com
-   password = 123
