                          # Deployment Luma Daya

Panduan singkat untuk upload project Laravel ini ke hosting.

## Kebutuhan Server

- PHP 8.3 atau lebih baru
- Extension PHP umum Laravel: `ctype`, `curl`, `dom`, `fileinfo`, `filter`, `hash`, `                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                mbstring`, `openssl`, `pcre`, `pdo`, `pdo_mysql`, `session`, `tokenizer`, `xml`
- Composer
- MySQL/MariaDB
- Node.js hanya dibutuhkan saat build asset. Kalau build sudah dilakukan lokal, folder `public/build` bisa langsung diupload.

## File Environment

1. Copy `.env.production.example` menjadi `.env`.
2. Isi `APP_URL` dengan domain asli.
3. Isi koneksi database MySQL.
4. Isi `ADMIN_EMAIL` dan `ADMIN_PASSWORD` dengan akun admin yang aman.
5. Generate key:

```bash
php artisan key:generate --force
```

## Deploy Dengan SSH

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Login admin:

```text
/admin
```

Gunakan email dan password dari `ADMIN_EMAIL` / `ADMIN_PASSWORD`.

## Shared Hosting / cPanel

Cara paling aman:

1. Upload seluruh project ke folder di luar `public_html`, misalnya `luma-app`.
2. Arahkan document root domain ke folder `luma-app/public`.
3. Jika hosting tidak bisa mengubah document root, upload isi folder `public` ke `public_html`, lalu sesuaikan `index.php` agar menunjuk ke folder project Laravel di luar `public_html`.
4. Jalankan migration dan seed lewat terminal hosting jika tersedia.
5. Pastikan folder ini writable: `storage`, `bootstrap/cache`.
6. Jalankan atau buat symlink storage: `public/storage -> storage/app/public`.

## Setelah Upload

- Buka `/admin/login`.
- Login dengan akun admin dari `.env`.
- Ubah password admin setelah berhasil login jika masih memakai password sementara.
- Cek upload gambar di menu `Kontak & setting`, `Hero slider`, dan `Artikel`.

## Catatan Keamanan

- Jangan upload `.env` ke repository publik.
- Pastikan `APP_DEBUG=false` di hosting.
- Ganti `ADMIN_PASSWORD` sebelum menjalankan `php artisan db:seed --force`.
- Gunakan HTTPS untuk domain production.
