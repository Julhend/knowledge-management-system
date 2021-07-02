@extends('layouts.main')

@section('content')
<div class="col-md-8 padding-20">
    <div class="row">
        <!-- BREADCRUMBS -->
        <div class="breadcrumb-container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">KMS</a>
                </li>
                <li>
                    <a href="{{ route('categories.show', [$article->category->slug, $article->category->id]) }}">{{ $article->category->name }}</a>
                </li>
                <li class="active">{{ $article->title }}</li>
            </ol>
        </div>
        <!-- END BREADCRUMBS -->
        <!-- ARTICLE  -->
        <div class="panel panel-default">
            <div class="article-heading margin-bottom-5">
                <i class="fa fa-pencil-square-o"></i> {{ $article->title }}
            </div>
            <div class="article-info">
                <div class="art-date">
                    <!-- <i class="fa fa-calendar-o"></i> {{ $article->created_at }} -->
                    <!-- MINUTE AGO -->
                    <i class="fa fa-calendar-o"></i>  {{ $article->created_at }} - {{ $article->created_at->diffForHumans() }}
                </div>
                @if($article->category->count())
                    <div class="art-category">
                        <a href="{{ route('categories.show', [$article->category->slug, $article->category->id]) }}">
                            <i class="fa fa-folder"></i> {{ $article->category->name }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="article-content">
                {!! $article->full_text !!}
            </div>
            @if($article->tags_count)
                <div class="article-content">
                    <div class="article-tags">
                        <b>Tags:</b>
                        @foreach($article->tags as $tag)
                            <a href="{{ route('tags.show', [$tag->slug, $tag->id]) }}" class="btn btn-default btn-o btn-sm">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
 <!-- leave a reply -->
        
     
                        <!-- LEAVE A COMMENT SECTION -->
                        <div class="panel-transparent">
    
                            <div class="article-content">
                            <div class="btn-group">
                             <button class="btn btn-default" id="button-comment">  <i class="fa fa-comment-o"></i> Leave a Comment</button>
                            </div>
                            <form action="" style="margin-top:10px;display:none;" method="POST" class="comment-form" id="first-comment">
                                <input type="text" name="name" placeholder="Your Name">
                                <br>
                                <textarea rows="4" name="comment" placeholder="Your Reply"></textarea>

                                <button type="submit" value="Submit" class="btn btn-wide btn-primary">Post Comment</button>
                            </form>
                        </div>
                         </div>
                        <!-- END LEAVE A REPLY SECTION -->

 <!-- TEST COMMENT -->
                    <div class="panel panel-default">
                        <div class="article-heading">
                            <i class="fa fa-comments-o"></i> Comments
                        </div>

                        <!-- FIRST LEVEL COMMENT 1 -->
                        <div class="article-content">
                            <div class="article-comment-top">
                             @foreach($article->comments->where('parent',0) as $comment)
                                <div class="comments-user">
                                     <img src="{{ asset('images/user.png') }}" alt="user">
                                    <div class="user-name"> {{ $comment->name }}</div>
                                    <div class="comment-post-date">
                                        <span class="italics">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="comments-content">
                                    <p>
                                      {{ $comment->content }}
                                    </p>
                                    <div class="article-read-more">
                                        <button class="btn btn-default btn-sm">
                                            <i class="fa fa-reply"></i> Reply</button>
                                    </div>
                                </div>

                                <!-- SECOND LEVEL COMMENT -->
                            @foreach($comment->childs as $child)
                                <div class="article-comment-second">
                                    <div class="comments-user">
                                       <img src="{{ asset('images/user.png') }}" alt="user">
                                        <div class="user-name">  {{ $child->name }}</div>
                                        <div class="comment-post-date">Posted On
                                            <span class="italics">  {{ $child->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="comments-content">
                                        <p>
                                              {{ $child->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                                <!-- END SECOND LEVEL COMMENT -->
                                @endforeach
                            </div>
                        </div>
                        <!-- END FIRST LEVEL COMMENT 1 -->
                    </div>
 <!-- END TEST COMMENT -->

    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#button-comment').click(function(){
            // alert(0);
               $('#first-comment').toggle('slide');
        });
    });
    
</script>

@endsection