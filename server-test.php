<?php


// // Temporarily enable cURL extension
// if (!function_exists('curl_init')) {
//     // Attempt to load the cURL extension dynamically
//     if (extension_loaded('curl') || dl('php_curl.dll')) {
//         echo "cURL extension temporarily enabled.";
//     } else {
//         echo "Failed to enable cURL extension.";
//     }
// } else {
//     echo "cURL is already enabled.";
// }




echo '<br>';
echo '<br>';


// // Check if cURL is enabled
// if (!function_exists('curl_init')) {
//     // Attempt to enable cURL
//     if (function_exists('shell_exec')) {
//         // Execute shell command to install cURL extension
//         $result = shell_exec('sudo apt-get install php-curl'); // For Ubuntu
//         // You may need to adjust the command for different distributions
//         // For CentOS: $result = shell_exec('sudo yum install php-curl');
        
//         // Check if installation was successful
//         if (strpos($result, 'php-curl is already the newest version') !== false) {
//             echo "cURL extension was already enabled.";
//         } else {
//             echo "cURL extension enabled successfully.";
//         }
//     } else {
//         echo "Unable to enable cURL. Shell_exec function is not available.";
//     }
// } else {
//     echo "cURL is already enabled.";
// }



echo '<br>';
echo '<br>';




// Check if cURL is enabled
if (function_exists('curl_init')) {
    echo "cURL is enabled.";
} else {
    echo "cURL is not enabled.";
}



?>

