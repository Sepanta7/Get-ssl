<?php
if (isset($_GET['domain'])) {
    $domain = filter_var($_GET['domain'], FILTER_SANITIZE_STRING);
    if (filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
        $command = "sudo certbot --nginx -d " . escapeshellarg($domain) . " --non-interactive --agree-tos --email your-email@example.com";
        $output = shell_exec($command);
        
        if ($output) {
            echo "SSL certificate successfully issued for " . htmlspecialchars($domain) . "<br>";
            echo "telegram:@sepanta_n<br>";
            echo "GitHub:https://sepanta7";
        } else {
            echo "There was an error issuing SSL certificate for " . htmlspecialchars($domain);
            echo "<br>telegram:@sepanta_n<br>";
            echo "GitHub:https://sepanta7";
        }
    } else {
        echo "Invalid domain name.";
        echo "<br>telegram:@sepanta_n<br>";
        echo "GitHub:https://sepanta7";
    }
} else {
    echo "Domain is not set.";
    echo "<br>telegram:@sepanta_n<br>";
    echo "GitHub:https://sepanta7";
}
