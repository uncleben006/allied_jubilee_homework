
########## local ############

# Build image base on Dockerfile
docker build . -t uncleben006/allied_jubilee

# Run container in daemon and mount project
docker run -it -d --name allied_jubilee \
-p 443:443 -p 80:80 \
-e LC_ALL=C.UTF-8 \
-v /media/ben_wang/ben/github/allied_jubilee/:/usr/src/app \
uncleben006/allied_jubilee bash

# Execute container
docker exec -it allied_jubilee bash

# permission config & nginx config
chgrp -R www-data storage bootstrap/cache database/allied_jubilee.sqlite &&
chmod -R ug+rwx storage bootstrap/cache database/allied_jubilee.sqlite &&
ln -s /etc/nginx/sites-available/allied_jubilee_nginx.conf /etc/nginx/sites-enabled/allied_jubilee_nginx.conf &&
rm /etc/nginx/sites-enabled/default &&
service php7.4-fpm start &&
service nginx start &&
crontab /etc/cron.d/allied_jubilee.cronjob &&
cron

########## local ############


########## prod ############

# push to my docker hub
docker push uncleben006/allied_jubilee

# Run container in daemon without mounting
docker run -it -d --name allied_jubilee \
-p 443:443 -p 80:80 \
-e LC_ALL=C.UTF-8 \
uncleben006/allied_jubilee bash

# Configure GCP Cloud SQL and connect
# Run migration
php artisan migrate

# Execute container
docker exec -it allied_jubilee bash

# permission config & nginx config
chgrp -R www-data storage bootstrap/cache database/allied_jubilee.sqlite &&
chmod -R ug+rwx storage bootstrap/cache database/allied_jubilee.sqlite &&
ln -s /etc/nginx/sites-available/allied_jubilee_nginx.conf /etc/nginx/sites-enabled/allied_jubilee_nginx.conf &&
rm /etc/nginx/sites-enabled/default &&
service php7.4-fpm start &&
service nginx start &&
crontab /etc/cron.d/allied_jubilee.cronjob &&
cron

########## prod ############


