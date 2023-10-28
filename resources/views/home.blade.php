@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/tweets">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="4" placeholder="What's happening?"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tweet</button>
                        </div>
                    </form>

                    @if($tweets->count() > 0)
                        <ul class="list-group">
                            @foreach($tweets as $tweet)
                                <li class="list-group-item">
                                    <p>{{ $tweet->body }}</p>
                                    <small>By {{ $tweet->user->name }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tweets yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
