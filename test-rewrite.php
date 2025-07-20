<?php
echo "<h1>URL Rewrite Test</h1>";
echo "<p>If you can see this page, URL rewriting is working!</p>";
echo "<p><strong>Request URI:</strong> " . $_SERVER['REQUEST_URI'] . "</p>";
echo "<p><strong>Query String:</strong> " . ($_SERVER['QUERY_STRING'] ?? 'None') . "</p>";
if (isset($_GET['test'])) {
    echo "<p><strong>Test Parameter:</strong> " . htmlspecialchars($_GET['test']) . "</p>";
}
?>