<div class="left-sidebar">
    <div class="user-summary top-level-panel">
        <div class="user-info-wrap">
                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="" class="profile-picture" />

                <div class="username-wrap">
                    <a href="#" class="display-name">{{ auth()->user()->name }}</a>
                    <a href="#" class="username">@ {{ auth()->user()->user_name }}</a>
                </div>

                <ul class="user-stats">
                    <li>
                        <a href="#" class="user-stats-header">Tweets</a>
                        <a href="#" class="user-stats-value">{{ auth()->user()->tweets->count() }}</a>
                    </li>
                    <li>
                        <a href="#" class="user-stats-header">Following</a>
                        <a href="#" class="user-stats-value">{{ auth()->user()->following->count() }}</a>
                    </li>
                    <li>
                        <a href="#" class="user-stats-header">Followers</a>
                        <a href="#" class="user-stats-value">{{ auth()->user()->followers->count() }}</a>
                    </li>
                </ul>
            </div>
    </div>

    <div class="trending top-level-panel">
       <h1>Trends</h1>

            <ul class="trend-list">
                @foreach($hasTags as $ht)
                <li class="trend">
                    <a href="#" class="trending-hashtag">#{{$ht->tag}}</a>
                    <!-- <p class="trend-description">Unde omnis iste #php natus error sit</p> -->
                    <p class="subtext">{{$ht->tweets->count()}} Tweets about this trend</p>
                </li> 
                @endforeach              
            </ul>
    </div>
        <div class="trending top-level-panel">
            @auth
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            @endauth
        </div>
</div>
