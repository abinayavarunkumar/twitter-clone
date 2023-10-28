<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twitter Clone</title>
    <link rel="stylesheet" href="{{ asset('assets/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
</head>
<body>
<div class="header">
    <div class="header-content">
       <ul class="global-actions">
            <li>
                <a class="global-actions-button-content" href="{{route('home')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Home
                </a>
            </li>

         
  <!-- 
            <li>
                <a class="global-actions-button-content">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                    Messages
                </a>
            </li> -->
        </ul>

        <!-- <button class="compose-tweet">
            <span class="wrap">
                <i class="fa fa-paper-plane"></i>
                Tweet
            </span>
        </button> -->

        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="" class="profile-picture-small">
        <form method="GET" action="{{ route('home') }}">
        <div class="search">
            <input type="text" placeholder="Search Twitter" name="query"/>
             <button type="submit" class="fa fa-search custom-button"></button>
        </div>
        </form>

        <i class="logo fa fa-twitter" aria-hidden="true"></i>
    </div>
    </div>
</div>
