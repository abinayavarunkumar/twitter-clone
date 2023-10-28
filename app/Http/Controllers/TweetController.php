<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Hashtag;

class TweetController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
         $query = $request->input('query', ''); // Get the search query from the request

        if ($query) {
         $tweets = Tweet::where('body', 'like', '%' . $query . '%')->get();
        } elseif ($request->input('view_all')) {
         $tweets = Tweet::latest()->get(); // Display all tweets
        } else {
            $tweets = Tweet::latest()->take(4)->get(); // Display latest 4 tweets
        }
        
        $tweets->transform(function ($tweet) {
            $tweet->created_ago = $tweet->created_at->diffForHumans();
            return $tweet;
        });

        $totalTweetsCount = Tweet::count();
        $loggedInUserId = Auth::id();
        $userslist=User::where('id','!=',$loggedInUserId)->latest()->get();
        $hasTags=Hashtag::latest()->get();

        return view('tweethome', compact('tweets','totalTweetsCount','query','userslist','hasTags'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'body' => 'required|max:255', // Define your validation rules here
            'hashtags' => 'nullable|regex:/#(\w+)/', // Validation rule for hashtags (optional)
        ]);

        // Create a new tweet
        $tweet = new Tweet;
        $tweet->body = $request->input('body');
        $tweet->user_id = auth()->user()->id; // Assign the authenticated user's ID

        $tweet->save();
        // Extract and store hashtags
        $hashtags = [];
        preg_match_all('/#(\w+)/', $request->input('hashtags'), $hashtags);

        foreach ($hashtags[1] as $tag) {
            $hashtag = Hashtag::firstOrCreate(['tag' => $tag]);
            $tweet->hashtags()->attach($hashtag);
        }

        return redirect()->route('home')->with('status', 'Tweet created successfully');
    }

    public function like(Tweet $tweet)
    {
        auth()->user()->likes()->toggle($tweet);
        return back();
    }

    public function retweet(Tweet $tweet)
    {
        auth()->user()->retweets()->toggle($tweet);
        return back();
    }

}
