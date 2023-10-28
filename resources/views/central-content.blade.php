<div class="central-content top-level-panel">
    <ul class="tweet-feed">
        <li class="new-tweet">
             <img src="assets/avatars/1.png" alt="" class="profile-picture-small" />
                <div class="tweet-input-wrap">
                    <input type="text" placeholder="What's happening?" />
                    <a class="fa fa-camera attach-photo"></a>
                </div>
        </li>

         <li class="view-new-tweets">
                <p>View 22 new Tweets</p>
            </li>

        @foreach($tweets as $tweet)
            <li class="tweet">
                <img src="assets/avatars/1.png" alt="" class="tweet-profile-thumbnail" />
                <div class="tweet-content-wrap">
                    <div class="tweet-header">
                        <a href="#" class="tweet-display-name">LillyRue</a>
                        <a href="#" class="tweet-username">@lilly_rue</a>
                        <a href="#" class="tweet-time">20m</a>
                    </div>
                    <p class="tweet-text">
                        Watch <a href="#" class="user-mention">@lorem_ipsum</a> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor :</br><a href="#" class="external-link">https://google.com/1JOUC81</a>
                    </p>
                    <ul class="tweet-action-buttons">
                        <li>
                            <a href="#">
                                <i class="fa fa-reply"></i>
                                <span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-retweet"></i>
                                <span>6</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star"></i>
                                <span>9</span>
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
