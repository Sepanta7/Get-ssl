<?php
if (isset($_GET['domain'])) {
    $domain = filter_var($_GET['domain'], FILTER_SANITIZE_STRING);

    if (!empty($domain)) {
        $command = "sudo certbot certonly --webroot -w /var/www/html/ -d $domain --non-interactive --agree-tos -m your-email@example.com";
        
        // اجرای دستور Certbot برای دریافت SSL
        $output = shell_exec($command);
        
        if (strpos($output, 'Congratulations!') !== false) {
            echo "SSL certificate successfully obtained for $domain.";
        } else {
            echo "Failed to obtain SSL certificate for $domain. Please check the logs for details.";
        }
        
        echo "<br>Telegram: @sepanta_n";
        echo "<br>GitHub: https://sepanta7";
    } else {
        echo "Invalid domain. Please go back and try again.";
    }
} else {
    echo "No domain provided.";
}
