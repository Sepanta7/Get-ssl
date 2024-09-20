<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = filter_var($_POST['domain'], FILTER_SANITIZE_STRING);
    $domain = preg_replace('#^https?://#', '', $domain);

    if (!empty($domain)) {
        $command = "sudo certbot --apache -d $domain --non-interactive --agree-tos -m your-email@example.com";
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
?>
    <form method="POST" action="">
        <label for="domain">Enter your domain or subdomain (e.g., example.com):</label>
        <input type="text" id="domain" name="domain" required>
        <button type="submit">Submit</button>
    </form>
<?php
}
