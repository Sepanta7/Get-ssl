<?php
if (isset($_GET['domain'])) {
    $domain = filter_var($_GET['domain'], FILTER_SANITIZE_STRING);

    if (!empty($domain)) {
        $command = "sudo certbot --apache -d $domain --non-interactive --agree-tos -m your-email@example.com";
        // برای سرور Nginx از دستور زیر استفاده کنید:
        // $command = "sudo certbot --nginx -d $domain --non-interactive --agree-tos -m your-email@example.com";
        
        $output = shell_exec($command);
        
        if (strpos($output, 'Congratulations!') !== false) {
            echo "SSL certificate successfully obtained and activated for $domain.";
        } else {
            echo "Failed to obtain or activate SSL certificate for $domain. Please check the logs for details.";
        }
        
        echo "<br>Telegram: @sepanta_n";
        echo "<br>GitHub: https://sepanta7";
    } else {
        echo "Invalid domain. Please go back and try again.";
    }
} else {
    echo "No domain provided.";
}
