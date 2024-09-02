<?php

// app/Services/ZohoEmailService.php

namespace App\Services;

use GuzzleHttp\Client;

class ZohoEmailService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://mail.zoho.com',
            // Add any additional Guzzle options as needed
        ]);
    }

    public function sendEmail($accessToken, $recipient, $subject, $body)
    {
        $response = $this->client->post('/api/accounts/{accountId}/messages', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'from' => 'your_email@example.com',
                'to' => $recipient,
                'subject' => $subject,
                'content' => $body,
            ],
        ]);

        return $response->getStatusCode(); // Return status code
    }
}

