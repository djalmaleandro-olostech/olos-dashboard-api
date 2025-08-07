<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;

class MetricController extends Controller
{

    public function index()
    {
       $client = new Client([
            'base_uri' => env('JIRA_BASE_URL'),
            'auth' => [env('JIRA_EMAIL'), env('JIRA_API_TOKEN')],
        ]);

        $accountId= '712020:bf8d2b28-3bde-48f6-91ee-049452bc01a5';
        $jql = "assignee = {$accountId}";

        $response = $client->get('/rest/api/3/search', [
            'query' => [
                'jql' => $jql,
                'maxResults' => 50
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $transformed = array_map(function ($issue) {
            return [
                'summary' => $issue['fields']['summary'] ?? null,
                'timespent' => $issue['fields']['timespent'] ?? null,
            ];
        }, $data['issues'] ?? []);


        $data['issues'] = $transformed;

        return $data;
    }

}
