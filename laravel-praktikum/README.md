# Laravel Praktikum (Demo MVC)

Folder ini di-bind mount ke container:

```text
./laravel-praktikum  →  /app
```

**Bisa diedit langsung dari host** (Cursor, VS Code, Finder). Perubahan langsung dipakai server di http://localhost:8000.

## Isi demo

- `public/index.php` — route `/`, `/mahasiswa`, `/about`
- `artisan` — `php artisan serve`

## Permission host

Service Docker Laravel memakai `HOST_UID` / `HOST_GID` dari `.env` agar file milik user Mac Anda.

```bash
# di folder PRAKTIKUM
echo "HOST_UID=$(id -u)" >> .env
echo "HOST_GID=$(id -g)" >> .env
docker compose up -d laravel
```

## Upgrade ke Laravel resmi

```bash
docker compose exec laravel bash
composer create-project laravel/laravel .
```

Setelah itu tetap edit project dari folder host `laravel-praktikum/`.
