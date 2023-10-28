@extends('layout')

@section('content')
<div class="central-content top-level-panel">
    <ul class="tweet-feed">
        <li class="new-tweet">
             <form method="POST" action="/tweets">
                        @csrf
             <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"  alt='{{Auth::user()->name}}'  class="profile-picture-small" />             
                <div class="tweet-input-wrap">                   
                    <input type="text" placeholder="What's happening?" name="body" />
                    <input type="text" placeholder="Add hashtags (e.g., #example #twitter)" name="hashtags" />
                    <!-- <a class="fa fa-camera attach-photo"></a> -->
                    <button class="compose-tweet-inline" type="submit">
                    <span class="wrap">
                    <i class="fa fa-paper-plane"></i>
                    </span>
                    </button>                 
                   
                </div>
                 </form>
        </li>

            @if (empty($query))
            <li class="view-new-tweets">
            <p> <a href="{{ route('home', ['view_all' => 1]) }}">View {{$totalTweetsCount}} new Tweets</a></p>
            </li>
            @endif        

        @foreach($tweets as $tweet)
            <li class="tweet">
                <img src="{{ asset('storage/' . $tweet->user->profile_image) }}" alt="" class="tweet-profile-thumbnail" />
                <div class="tweet-content-wrap">
                    <div class="tweet-header">
                        <a href="#" class="tweet-display-name">{{ $tweet->user->name }}</a>
                        <a href="#" class="tweet-username">@ {{ $tweet->user->user_name }}</a>
                        <a href="#" class="tweet-time">{{ $tweet->created_ago }}</a>
                    </div>
                    <p class="tweet-text">
                       {{ $tweet->body }}
                    </p>
                    <ul class="tweet-action-buttons">
                        <li>
                            <a href="#">                                 
                                    <form method="POST" action="{{ route('tweets.retweet', $tweet) }}">
                                        @csrf
                                        <button type="submit" class="fa fa-retweet custom-button  @if ($tweet->isRetweetedBy(auth()->user())) iconfillcol @else iconcol @endif"></button> <span>{{ $tweet->retweets->count() }}</span>
                                    </form>
                            </a>
                        </li>
                        <li>
                            <a href="#">                            
                                <form method="POST" action="{{ route('tweets.like', $tweet) }}">
                                @csrf
                                <button type="submit" class="fa fa-heart custom-button @if ($tweet->isLikedBy(auth()->user())) iconfillcol @else iconcol @endif"></button> <span>{{ $tweet->likes->count() }}</span>
                                </form>                       
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-ellipsis-h"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </li>
        @endforeach
    </ul>
</div>
@endsection