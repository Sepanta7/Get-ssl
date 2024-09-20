<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = filter_var($_POST['domain'], FILTER_SANITIZE_STRING);
    
    // حذف http:// یا https:// اگر وارد شده باشد
    $domain = preg_replace('#^https?://#', '', $domain);

    if (!empty($domain)) {
        header("Location: issue_ssl.php?domain=" . urlencode($domain));
        exit;
    } else {
        echo "Please enter a valid domain.";
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
