<?php
$audiolink="https://my.mixtape.moe/{$song->audioid}";
$artistlink="https://anilist.co/staff/{$song->artistid}";
$animelink="https://anilist.co/anime/{$song->animeid}";
?>

<head>
    @include('inc.jquerybs')
    <meta content='width=device-width, initial-scale=1, shrink-to-fit=no' name='viewport'>
    <meta content='{{$song->artist}} - {{$song->song}}' property='og:title'>
    <meta content='{{$audiolink}}' property='og:audio'>
    <meta content='Anison.ga' property='og:site_name'>
    <link rel=icon href='{{url('/')}}/favicon.ico'>
    <title>{{$song->artist}} - {{$song->song}}</title>
</head>

<body class="play" onload="makeRequest()">
    @include('inc.navbar')
    <br><br><h1>@if(empty($song->artistid)){{$song->artist}} @else <a target="_blank" href="<?= $artistlink?>">{{$song->artist}}</a> @endif - {{$song->song}}</h1>
    <h3><a target="_blank" href="<?= $animelink?>">{{$song->anime}}</a></h3><br><br>
    <div class='round audio'><audio preload='auto' controls loop controlsList='nodownload' src='<?= $audiolink?>'></audio></div><br> 
    @if(empty($song->lyrics)) @else
    <button class="btn btn-outline-dark btn-lg btn-block round audio" type="button" data-toggle="collapse" data-target="#collapseLyrics" aria-expanded="false" aria-controls="collapseLyrics">Show/hide lyrics</button>
    <div class="collapse" id="collapseLyrics"><br><div class="card card-body lyrics">{{$song->lyrics}}</div>
</div>@endif<br>

@notmobile
<button class="btn btn-outline-dark btn-lg btn-block audio" type="button" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo"">Show/hide anime info</button>
<div class="collapse" id="collapseInfo"><br>
    <div class="card audio text-center">
        <div class="card-header">Anime Info</div>
        <div style="vertical-align: middle;" class="card-body">
            <p class="round mr-3 " style="float: left; height: auto; width: auto;"><img id="cover" src="" border="1px"></p>
            <div class="list-group">
                <a class="list-group-item"><h4 id="title"></h4></a>
                <a class="list-group-item text-left" id="description"><b>Description: </b></a>
                <a class="list-group-item text-left" id="episodes"><b>Episodes: </b></a>
                <a class="list-group-item text-left" id="duration"><b>Duration: </b></a>
                <a class="list-group-item text-left" id="started"><b>Started: </b></a>
                <a class="list-group-item text-left" id="ended"><b>Ended: </b></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // Define the query
    var query = `query ($id: Int) {
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
    `;
    // Define the query variables and values that will be used in the query request
    var variables = {
        id: {{$song->animeid}}
    };


    // Define the config for the Api request
    var url = 'https://graphql.anilist.co',
    options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: ""
    };

    // Make the HTTP Api request
    function makeRequest() {
        options.body = JSON.stringify({
            query: query,
            variables: variables
        })
        fetch(url, options)
        .then(handleResponse)
        .then(handleData)
        .catch(handleError);

    }

    function handleResponse(response) {
        return response.json().then(function (json) {
            return response.ok ? json : Promise.reject(json);
        });
    }

    function handleData(data) {
        var dt = data.data.Media; //Aliased for simplicity
        document.getElementById('description').innerHTML += dt.description;
        document.getElementById('episodes').innerHTML += dt.episodes;
        document.getElementById('duration').innerHTML += dt.duration + " minutes";
        document.getElementById('started').innerHTML += dt.startDate.month + "/" + dt.startDate.day + "/" + dt.startDate.year;
        document.getElementById('ended').innerHTML += dt.endDate.month + "/" + dt.endDate.day + "/" + dt.endDate.year;
        document.getElementById('title').innerHTML = dt.title.romaji + " | " + dt.title.native;
        document.getElementById('cover').src = dt.coverImage.large;
    }

    function handleError(error) {
        console.log(error);
    }
</script>
@endnotmobile
</body><br><br>
