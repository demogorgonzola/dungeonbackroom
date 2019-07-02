nohup php artisan serve > /dev/null 2>&1 &
serverPGID=$(ps -p $! -o pgid --no-headers)
php artisan dusk
kill -- -$serverPGID &
# echo 'Server PGID:' $serverPGID
