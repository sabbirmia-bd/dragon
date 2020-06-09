@extends('layouts.frontend_master')

@section('frontend_content')
  <!-- .breadcumb-area start -->
     <div class="breadcumb-area bg-img-4 ptb-100">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="breadcumb-wrap text-center">
                         <h2>Blog Details</h2>
                         <ul>
                             <li><a href="{{ url('/') }}">Home</a></li>
                             <li><span>Blog Details</span></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- .breadcumb-area end -->
     <!-- blog-details-area start-->
     <div class="blog-details-area ptb-100">
         <div class="container">
             <div class="row">
                 <div class="col-lg-9 col-12">
                     <div class="blog-details-wrap">
                         <img src="{{ asset('uploads\blog_photo') }}/{{ $bloginfo->blog_photo }}" alt="">
                         <h3>{{ $bloginfo->blog_title }}</h3>
                         <ul class="meta">
                             <li>{{ $bloginfo->created_at->format('d M Y') }}</li>
                             <li>By {{ Auth::User()->name }}</li>
                         </ul>
                         <p>{{ $bloginfo->blog_description }}</p>
                         <div class="share-wrap">
                             <div class="row">
                                 <div class="col-sm-7 ">
                                     <ul class="socil-icon d-flex">
                                         <li>share it on :</li>
                                         <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                         <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                         <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                         <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                         <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                                     </ul>
                                 </div>
                                 <div class="col-sm-5 text-right">
                                     <a href="javascript:void(0);">Next Post <i class="fa fa-long-arrow-right"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="comment-form-area">
                         <div class="comment-main">
                             <h3 class="blog-title"><span>({{ App\Comment::where('blog_id', $blog_id)->count() }})</span>Comments:</h3>
                             <ol class="comments">
                                 <li class="comment even thread-even depth-1">
                                   @foreach ( App\Comment::where('blog_id',$blog_id)->limit(3)->get() as $comment)

                                     <div class="comment-wrap">
                                         <div class="comment-theme">
                                             <div class="comment-image">
                                                 {{-- <img src="{{ asset('uploads/blog_photo') }}/{{ $comment->blog_photo }}" alt="Jhon"> --}}
                                             </div>
                                         </div>
                                         <div class="comment-main-area">
                                             <div class="comment-wrapper">
                                                 <div class="sewl-comments-meta">
                                                     <h4>{{ $comment->name }} </h4>
                                                     <span>{{ $comment->created_at->format('d M Y h:i:s') }}</span>
                                                 </div>
                                                 <div class="comment-area">
                                                     <p>{{ $comment->comment }}</p>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                   @endforeach
                                 </li>
                             </ol>
                         </div>
                         <div id="respond" class="sewl-comment-form comment-respond form-style">
                             <h3 id="reply-title" class="blog-title">Leave a <span>comment</span></h3>
                             <form novalidate="" method="post" id="commentform" class="comment-form" action="{{ url('comment/post') }}">
                               @csrf
                                 <div class="row">
                                     <div class="col-12">
                                       @if (session('add_comment_status'))
                                         <div class="alert alert-success">
                                           {{ session('add_comment_status') }}
                                         </div>
                                       @endif
                                         <div class="sewl-form-inputs no-padding-left">
                                             <div class="row">
                                                 <div class="col-sm-6 col-12">
                                                     <input id="name" name="name" value="" tabindex="2" placeholder="Name" type="text">
                                                     <input type="hidden" name="blog_id" value="{{ $blog_id }}">
                                                     @error ('name')
                                                       <span class="text-danger">
                                                         {{ $message }}
                                                       </span>
                                                     @enderror
                                                 </div>
                                                 <div class="col-sm-6 col-12">
                                                     <input id="email" name="email" value="" tabindex="3" placeholder="Email" type="email">
                                                     @error ('email')
                                                       <span class="text-danger">
                                                         {{ $message }}
                                                       </span>
                                                     @enderror
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-12">
                                         <div class="sewl-form-textarea no-padding-right">
                                             <textarea id="comment" name="comment" tabindex="4" rows="3" cols="30" placeholder="Write Your Comments..."></textarea>
                                             @error ('comment')
                                               <span class="text-danger">
                                                 {{ $message }}
                                               </span>
                                             @enderror
                                         </div>
                                     </div>
                                     <div class="col-12">
                                         <div class="form-submit">
                                             <input name="submit" id="submit" value="Send" type="submit">
                                             {{-- <input name="comment_post_ID" value="1" id="comment_post_ID" type="hidden">
                                             <input name="comment_parent" id="comment_parent" value="0" type="hidden"> --}}
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-12">
                     <aside class="sidebar-area">
                         <div class="widget widget_categories">
                             <h4 class="widget-title">Categories</h4>
                             <ul>
                               @foreach ($categories as $category)
                                 <li><a href="">{{ $category->category_name }}</a></li>
                               @endforeach

                             </ul>
                         </div>
                         <div class="widget widget_recent_entries recent_post">
                             <h4 class="widget-title">Recent Post</h4>
                             <ul>
                               @foreach ($blogs as $blog)
                                 <li>
                                     <div class="post-img">
                                         <img width="70" height="60" src="{{ asset('uploads/blog_photo') }}/{{ $blog->blog_photo }}" alt="">
                                     </div>
                                     <div class="post-content">
                                         <a href="blog-details.html">{{ $blog->blog_title }} </a>
                                         <p>{{ $blog->created_at->format('d M Y') }}</p>
                                     </div>
                                 </li>
                               @endforeach
                             </ul>
                         </div>
                     </aside>
                 </div>
             </div>
         </div>
     </div>
     <!-- blog-details-area end -->
@endsection
