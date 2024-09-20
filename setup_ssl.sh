#!/bin/bash

mkdir -p /var/www/html/Get-ssl

curl -o /var/www/html/Get-ssl/get_domain.php https://raw.githubusercontent.com/sepanta7/Get-ssl/main/get_domain.php
curl -o /var/www/html/Get-ssl/issue_ssl.php https://raw.githubusercontent.com/sepanta7/Get-ssl/main/issue_ssl.php

echo "www-data ALL=(ALL) NOPASSWD: /usr/bin/certbot" | sudo tee -a /etc/sudoers

echo "SSL setup script completed. You can now access the form via http://your-server-ip/Get-ssl/get_domain.php"
