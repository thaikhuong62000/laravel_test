<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Log;

class MainController extends Controller
{
    public static function index()
    {
        return view('index');
    }

    public static function submitRegisterInfo(Request $request)
    {
        try {
            $client = MainController::getGoogleClient();
            $service = new Google_Service_Sheets($client);
            $spreadsheetId = env('GOOGLE_SHEET_ID');
            $range = 'Sh1!A:D';

            // get values
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();
            // update/add values
            $data = [
                [
                    $request->name,
                    $request->cmnd,
                    $request->phone,
                    $request->email,
                    $request->address,
                    $request->phuong,
                    $request->quan,
                    $request->tp,
                ]
            ];
            $requestBody = new \Google_Service_Sheets_ValueRange([
                'values' => $data
            ]);

            $params = [
                'valueInputOption' => 'RAW'
            ];

            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $params);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 409,
            ]);
        }
        return response()->json([
            'status' => 201,
        ]);
    }

    public static function getGoogleClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        $jsonKey = [
            "type" => "service_account",
            "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCWBO8Q+LlUR7JS\n7l4CycswxsEPzbkhnk+QTRHcJusrmoBs8mPw86H5zJplIja9zspP3NHB4KC2AF8b\nikciz3u+qJ8bJg2LQghWT8i4mCuuyfm9JJvo3GUdNw61trKMlcjU7U/HC4FSiGfP\nFC0+7w+lFRxAJVZeFXvFytyxXUMGjvz7VVgJnOocO05g3aYWEXHDZIhAFSfD8Tgo\ndzNiCRJTithj9banb9my3/CuUbfEOJ5YH9FXcA1Meq3Um/Vlity5OjyfwPUTmtoI\n1t18KPdnmt3agVxbJQfqbZsMThNbYEy5qGuyNoDBPYU+qdMX6rtJoAvNb6wwyxZ3\ny/+NMdHTAgMBAAECggEAJwlqogpuw1ESxIS1Xtler7cQVsnsAiT9RCnh210fNc3y\n3CaovfLPs747cNSZ1QNB3s0xodcPSrzHAtYVE6hU5XRgToK05IdOvxLswqgKOeXh\nwAeOMGZlQ1hn0f4T8QQq6clEyKEkSjMnfBmeenFfq0/WdZShqELD3eCfU+HWRpa5\nfy5LNcMcAR0I9Y1MSuapMbsTroELHM/zt1dIPG8n7IcnKskLTZFfOlOyqcQR+DcX\n1D/IiCAXalbFj9lc3hzSGPmAEYJSeukzOkzd2EZJcvdspI2DKG72er1uzhSqtZio\nPxSp+SvTPqjjDgsN+JIar9XXx19JJZm9jPapMB5KTQKBgQDNnUqf5d1WDXkCft1t\nCRUvdBWLZJQT2I3Q9OFwltHtE58HBNx/9PnSdYLbAu5MN2ChrL3cYZGl7K3JmtbE\nX3V/FjBaBDt89OxGK49raNGP8x+WvxnlC4JATKyNMawBeHdKOkL3ejrazgYcVF3g\nGfSHxpZ7boQ/IwmhcXKdEhaDPQKBgQC6yATvGKCirt81J2sGa9JeJoDEdxiK/Gr/\nodhX99ix3EQAHlPuHUu8eLaIA2PniqLUj5ZGiOPtbb5JZuOC+tgu04og4/JF+Fy3\npPv3F09csBoZQSftJx4nW2d8ob1XcEa4z0oOmaqYL0abF6zPqvvsnPJoKLY7b0XK\nGZF8+sm6TwKBgQDMVzRxonUMb0lCxKf0E6G9TkWXCXbsHjwaXTOqvAiW7vgNdrRY\najLZCLXqSIhgsGxVYKIzYbfoyUWRZVNpR2Ey0u9slmY0cghaWDIpUbtqrvlGzFbE\nvWJN2qVlkObbc0hCOZKR9iSFjVifUO0WqVTOlvq4YoYFZSHOEzwPg4liFQKBgFBm\nHMmWfj7Iq0fECeufqdPhGvh2k1fwQ1Z6IhfrlZkpyROL+nC6p4kfJOLzIqPeJyz8\nCaGe9w2SeaA665/LvhaZ9BEoTXcU60QZfmPj4sNxAirwwvDwL6idTbR2Inxq1eZj\nQ+t49dfAMdI8pKRXY018WVPAgoCe6xmNW/TCNuc9AoGAG2AuO6eZRpSXt+3029OI\nAm0jTodQdVqkiNrhZwAEX/W+NRUxanAX0VGM71l694H+lk7TT3Tb1bkBfVAnOWZ2\n2m20rT2XXL2InwU+rmvl2R8/6dZVbRSoefygXd0i8e5TnhRRiPTZlLfPcyopr0AY\ns8z0bfze9NoiP7rO3Lmclvw=\n-----END PRIVATE KEY-----\n",
            "client_email" => "work2-716@indigo-charge.iam.gserviceaccount.com",
            "client_id" => "106616832033590689012",
        ];
        $client->setAuthConfig($jsonKey);
        return $client;
    }
}
