<div class="right-sidebar">
    <div class="who-to-follow top-level-panel">
                <ul class="who-to-follow-header">
                <li>
                    <h1>Who to follow</h1>
                </li>
            </ul>

            <ul class="who-to-follow-list">
                @foreach($userslist as $userli)
                <li>
                    <img src="{{ asset('storage/' . $userli->profile_image) }}" alt="" class="tweet-profile-thumbnail" />

                    <div class="who-to-follow-right-wrap">
                        <p class="who-to-follow-line-wrap">
                            <a href="#" class="who-to-follow-display-name">{{ $userli->name }}</a>
                            <a href="#" class="tweet-username">@ {{ $userli->user_name }}</a>
                        </p>

                        <div class="clear"></div>

                        <a href="#" class="follow">
                           
                                @if (auth()->user()->following->contains($userli))
                                    <form method="POST" action="{{ route('users.unfollow', $userli) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fa fa-user-plus custom-button  iconfillcol"> Un Follow</button> 
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('users.follow', $userli) }}">
                                    @csrf
                                    <button type="submit" class="fa fa-user-plus custom-button  iconfillcol "> Follow</button> 
                                    </form>
                                @endif
                                                
                        </a>
                    </div>

                    <div class="clear"></div>
                </li>
                @endforeach
            </ul>
            <div class="clear"></div>
    </div>

    <div class="footer top-level-panel">
        <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
    </div>
</div>
</div>
</body>
</html>