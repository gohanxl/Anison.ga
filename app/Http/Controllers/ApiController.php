<?php

namespace Anison\Http\Controllers;

use Anison\Song;

class ApiController extends Controller
{
    // Retrieve specific entry from API

    public function api($type, $id)
    {
        return Song::where($type, '=', $id)->get();
    }
}
