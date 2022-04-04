#!/bin/sh

echo "Starting startup.sh.."
echo "*   *       *       *       *       php /var/www/html/gigco/app/artisan schedule:run >> /var/log/cron.log 2>&1" >> /etc/crontabs/root
crontab -l
