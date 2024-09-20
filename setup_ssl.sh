#!/bin/bash

# شناسایی توزیع لینوکس
if [ -f /etc/os-release ]; then
    . /etc/os-release
    OS_NAME=$NAME
    OS_VERSION=$VERSION_ID
else
    echo "Unsupported OS. Exiting."
    exit 1
fi

read -p "Enter your domain or subdomain (e.g., example.com): " domain

if [[ -z "$domain" ]]; then
    echo "No domain provided. Exiting."
    exit 1
fi

install_certbot() {
    case $OS_NAME in
        "Ubuntu"*)
            sudo apt update
            sudo apt install certbot python3-certbot-apache -y
            ;;
        "Debian"*)
            sudo apt update
            sudo apt install certbot python3-certbot-apache -y
            ;;
        "Fedora"*)
            sudo dnf install certbot python3-certbot-apache -y
            ;;
        "Rocky Linux"*)
            sudo dnf install certbot python3-certbot-apache -y
            ;;
        "Oracle Linux"*)
            sudo dnf install certbot python3-certbot-apache -y
            ;;
        *)
            echo "Unsupported OS. Exiting."
            exit 1
            ;;
    esac
}

# نصب Certbot در صورت نیاز
if ! command -v certbot &> /dev/null; then
    echo "Certbot not found. Installing..."
    install_certbot
fi

# صدور گواهی SSL
sudo certbot --apache -d "$domain" --non-interactive --agree-tos -m your-email@example.com

if [[ $? -eq 0 ]]; then
    echo "SSL certificate successfully obtained and activated for $domain."
else
    echo "Failed to obtain or activate SSL certificate for $domain. Please check the logs for details."
fi

echo "SSL setup script completed."
echo "Telegram: @sepanta_n"
echo "GitHub: https://sepanta7"
