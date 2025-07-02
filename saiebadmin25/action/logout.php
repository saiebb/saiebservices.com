<?php
// Function to delete all cookies
function deleteAllCookies()
{
    // Loop through each cookie
    foreach ($_COOKIE as $cookieName => $cookieValue) {
        // Delete the cookie by setting its expiration time to a past time
        setcookie($cookieName, '', time() - 3600, '/'); // Expire in the past
        // Also unset it in the $_COOKIE superglobal array
        unset($_COOKIE[$cookieName]);
    }
}

// Call the function to delete all cookies
deleteAllCookies();

// Optional: Output a message
header("location:../index.php");
