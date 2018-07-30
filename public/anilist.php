<?php


$query = '
query ($id: Int) {
  Media (id: $id, type: ANIME) {
    id
    description
    duration
    episodes
    startDate {
      year
      month
      day
    }
    endDate {
      year
      month
      day
    }
    title {
      romaji
      english
      native
    }
    coverImage {
      large
    }
  }
}
';
$variables = [
    'id' => "{$song->animeid}",
];
$http = new GuzzleHttp\Client();
$response = $http->post('https://graphql.anilist.co', [
    'json' => [
        'query'     => $query,
        'variables' => $variables,
    ],
]);
$json = $response->getBody()->getContents();
$json = json_decode($json, true);
$romaji = $json['data']['Media']['title']['romaji'];
$native = $json['data']['Media']['title']['native'];
$image = $json['data']['Media']['coverImage']['large'];
$episodes = $json['data']['Media']['episodes'];
$duration = $json['data']['Media']['duration'].' minutes';
$description = $json['data']['Media']['description'];
$description = strip_tags($description);
$start = $json['data']['Media']['startDate']['month'].'/'.$json['data']['Media']['startDate']['day'].'/'.$json['data']['Media']['startDate']['year'];
$end = $json['data']['Media']['endDate']['month'].'/'.$json['data']['Media']['endDate']['day'].'/'.$json['data']['Media']['endDate']['year'];
