rmdir "public/photos" /s /q
rmdir "public/storage" /s /q
php artisan storage:link
composer install
npm install
npm run dev
php artisan migrate:fresh
php artisan db:seed
