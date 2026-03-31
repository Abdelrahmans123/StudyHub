<?php

namespace App\Http\traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

trait ZoomMeeting
{
    private function generateZoomAccessToken()
    {
        $clientId = env('ZOOM_CLIENT_ID');
        $clientSecret = env('ZOOM_CLIENT_SECRET');
        $accountId = env('ZOOM_ACCOUNT_ID');

        return Cache::remember('zoom_access_token', 55 * 60, function () use ($clientId, $clientSecret, $accountId) {
            $response = Http::withBasicAuth($clientId, $clientSecret)
                ->asForm()
                ->post('https://zoom.us/oauth/token', [
                    'grant_type' => 'account_credentials',
                    'account_id' => $accountId,
                ]);

            if ($response->successful()) {
                return $response->json('access_token');
            }

            Log::error('Zoom OAuth Error: ' . $response->body());
            throw new \Exception('Could not generate Zoom access token. Check your credentials in .env.');
        });
    }

    public function createZoomMeeting($request)
    {
        $token = $this->generateZoomAccessToken();

        $response = Http::withToken($token)
            ->post('https://api.zoom.us/v2/users/me/meetings', [
                'topic'      => $request->sessionTopic,
                'type'       => 2, // 2 = scheduled meeting
                'start_time' => Carbon::parse($request->startDate)->toIso8601String(),
                'duration'   => $request->duration, // in minutes
                'timezone'   => 'Africa/Cairo',
                'settings'   => [
                    'join_before_host'  => false,
                    'host_video'        => false,
                    'participant_video' => false,
                    'mute_upon_entry'   => true,
                    'waiting_room'      => true,
                    'approval_type'     => config('zoom.approval_type', 0),
                    'audio'             => config('zoom.audio', 'both'),
                    'auto_recording'    => config('zoom.auto_recording', 'none'),
                ],
            ]);

        if ($response->successful()) {
            return json_decode($response->body());
        }

        Log::error('Zoom Meeting Creation Error: ' . $response->body());
        throw new \Exception('Failed to create Zoom Meeting: ' . $response->json('message', 'Unknown error'));
    }

    public function deleteZoomMeeting($id)
    {
        $token = $this->generateZoomAccessToken();

        $response = Http::withToken($token)
            ->delete('https://api.zoom.us/v2/meetings/' . $id);

        if (!$response->successful()) {
            Log::error('Zoom Meeting Deletion Error: ' . $response->body());
        }

        return $response->successful();
    }
}
