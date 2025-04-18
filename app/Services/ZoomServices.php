<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ZoomServices
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = env('ZOOM_API_BASE_URL', 'https://api.zoom.us/v2'); // ✅ Fix base URL
    }

    private function getAccessToken()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode('B3Gip0VbRQqmJ5TrgySoHA' . ':' . 'ejBZvhiSTODpNAFKKRzmJE2jOPv9yKos'),
        ])->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' =>'E6wv2ONxSRWUtLSSEgSkeA',
        ]);

        return $response->json()['access_token'] ?? null;
    }


    public function createMeeting($topic, $startTime, $duration, $timezone)
    {
        $accessToken = $this->getAccessToken();
        //echo $accessToken;die;
        if (!$accessToken) {
            throw new \Exception("Failed to retrieve Zoom access token.");
        }

        $response = $this->client->post($this->baseUrl . '/users/me/meetings', [ // ✅ Fix URL
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'topic'      => $topic,
                'type'       => 2, // Scheduled meeting
                'start_time' => $startTime, // Format: 2025-02-10T10:00:00Z
                'duration'   => $duration, // Duration in minutes
                'timezone'   => $timezone,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
