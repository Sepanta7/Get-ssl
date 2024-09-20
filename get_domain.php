<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = filter_var($_POST['domain'], FILTER_SANITIZE_STRING);
    if (!empty($domain)) {
        header("Location: issue_ssl.php?domain=" . urlencode($domain));
        exit;
    } else {
        echo "Please enter a valid domain.";
    }
} else {
?>
    <form method="POST" action="">
        <label for="domain">Enter your domain or subdomain:</label>
        <input type="text" id="domain" name="domain" required>
        <button type="submit">Submit</button>
    </form>
<?php
}
