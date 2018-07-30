<?php

namespace Anison\Http\Controllers;

use Anison\Requests;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    // All requests

    public function index()
    {
        $requests = Requests::all();

        return view('requests')->with('requests', $requests);
    }

    // Submitting requests

    public function submit(Request $request)
    {
        $this->validate($request, [
            'song'  => 'required',
            'anime' => 'required',
            'link'  => 'required',
        ]);

        // Create new request
        $requests = new Requests();
        $requests->song = $request->input('song');
        $requests->anime = $request->input('anime');
        $requests->link = $request->input('link');

        // Save request
        $requests->save();

        // Redirect when done
        return redirect('/')
                ->with('success1', 'Your request has been received!')
                ->with('inputsong', $request->input('song'))
                ->with('inputanime', $request->input('anime'))
                ->with('inputlink', $request->input('link'));
    }
}
