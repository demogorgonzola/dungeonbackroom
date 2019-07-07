nohup php artisan serve > storage/logs/laravel-no-hup.log 2>&1 &
serverPGID=$(ps -p $! -o pgid --no-headers | tr -d '[:space:]')
php artisan dusk
kill -- -$serverPGID &
