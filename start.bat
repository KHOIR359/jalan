rmdir "public/photos" /s /q
rmdir "public/storage" /s /q
php artisan storage:link
npm install
npm run dev
php artisan migrate
php artisan db:seed
