<?php
// Allow Editors to see Private blogs  
$subRole = get_role( 'editor' );   
if ($subRole) {
    $subRole->add_cap( 'read_private_posts' ); 
}


// Ensure the autoload file is included to use Guzzle
require_once get_template_directory() . '/vendor/autoload.php';


// Hook into user registration
// add_action('user_register', 'call_momence_api_on_registration');
function call_momence_api_on_registration($user_id) {
    // Retrieve user data
    $user_info = get_userdata($user_id);
    $email = $user_info->user_email;
    $first_name = $user_info->first_name;
    $last_name = $user_info->last_name;
    // $phone_number = get_user_meta($user_id, 'phone_number', true); // Assuming phone number is stored as user meta
    // $home_location_id = 0; // Set this to the appropriate value or retrieve dynamically


    ////////First approach///////////////////

    // Create the API client
    $client = new \GuzzleHttp\Client();

    try {
        // Make the API request
        $response = $client->request('POST', 'https://api.momence.com/api/v2/host/members', [
            'body' => json_encode([
                'email' => $email,
                'firstName' => $first_name,
                'lastName' => $last_name,
                // 'phoneNumber' => $phone_number,
                // 'homeLocationId' => $home_location_id,
            ]),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        // Log the API response for debugging (optional)
        error_log('Momence API Response: ' . $response->getBody());
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        // Log any errors
        error_log('Momence API Error: ' . $e->getMessage());
    }


    //////// Second approach///////////
  
    // API endpoint
    $url = 'https://api.momence.com/api/v2/host/members';

    // Your authorization key
    $authKey = 'your_auth_key_here'; // Replace with your actual auth key

    // Member data
    $memberData = [
        'firstName' => 'John',
        'lastName'  => 'Doe',
        'email'     => 'john.doe@example.com',
        'phone'     => '1234567890',
        // Add other required fields here
    ];

    // Initialize cURL
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $authKey,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($memberData));

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Decode the response if needed
        $responseData = json_decode($response, true);
        print_r($responseData);
    }

    // Close cURL
    curl_close($ch);

}







