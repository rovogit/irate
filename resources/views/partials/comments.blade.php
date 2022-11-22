<?php

/**
 * @var \App\Models\Comment[] $comments
 */

?>
@if($comments->isNotEmpty())
    <div class="comment_area mb-50 clearfix">
        <h4 class="mb-5">{{ __('Comments') }}</h4>
        <ol class="pl-0">
            @foreach($comments as $comment)
                <li class="single_comment_area">
                    <div class="comment-content d-flex">
                        <div class="comment-author"><img src="{{ $comment->user->avatar }}" alt="author"></div>
                        <div class="comment-meta py-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6>{{ $comment->user->name }}</h6>
                                <a class="post-date ms-1" href="#">{{ $comment->created_at->diffForHumans() }}</a>
                            </div>
                            <p>{{ $comment->message }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endif