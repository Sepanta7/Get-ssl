#!/bin/bash

read -p "Enter your domain or subdomain (e.g., example.com): " domain

if [[ -z "$domain" ]]; then
    echo "No domain provided. Exiting."
    exit 1
fi

# Install Certbot if not already installed
if ! command -v certbot &> /dev/null; then
    echo "Certbot not found. Installing..."
    sudo apt update
    sudo apt install certbot python3-certbot-apache -y
fi

# Issue SSL certificate
sudo certbot --apache -d "$domain" --non-interactive --agree-tos -m your-email@example.com

if [[ $? -eq 0 ]]; then
    echo "SSL certificate successfully obtained and activated for $domain."
else
    echo "Failed to obtain or activate SSL certificate for $domain. Please check the logs for details."
fi

echo "SSL setup script completed."
echo "Telegram: @sepanta_n"
echo "GitHub: https://sepanta7"
