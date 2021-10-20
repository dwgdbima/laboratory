@extends('web.user.main')
@push('styles')

@endpush
@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner">
        <div class="container">
            <div class="row d-flex flex-row align-items-center justify-content-between">
                <div class="page-title-heading">
                    <h2 class="title">Blog</h2>
                </div>
                <div class="breadcrumb-wrapper">
                    <span>
                        <a title="Homepage" href="{{'/'}}">Beranda</a>
                    </span>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
</div><!-- page-title end-->


<!--site-main start-->
<div class="site-main">


    <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 content-area">
                    @forelse ($blogs as $blog)
                    <!-- post -->
                    <article class="post ttm-blog-classic clearfix">
                        <!-- post-featured-wrapper -->
                        <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                            <div class="ttm-post-featured">
                                <img class="img-fluid" src="{{asset($blog->thumbnail)}}" alt="">
                            </div>
                        </div><!-- post-featured-wrapper end -->
                        <!-- ttm-blog-classic-content -->
                        <div class="ttm-blog-classic-content">
                            <div class="ttm-post-entry-header">
                                <div class="post-meta">
                                    <span class="ttm-meta-line byline"><i class="fas fa-user"></i>By
                                        {{$blog->user->name}}</span>
                                    <span class="ttm-meta-line entry-date"><i class="fa fa-calendar"></i><time
                                            class="entry-date published" datetime="{{$blog->created_at}}">
                                            {{$blog->publish_at}}</time></span>
                                </div>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="blog-single.html">{{$blog->title}}</a></h2>
                                </header>
                            </div>
                            <div class="entry-content">
                                <div class="ttm-box-desc-text">
                                    {{Str::limit(strip_tags($blog->content), 400)}}
                                </div>
                                <div class="ttm-blogbox-desc-footer">
                                    <div class="ttm-blogbox-footer-readmore">
                                        <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                                            href="{{route('blog.show', $blog->slug)}}">Read More!</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- ttm-blog-classic-content end -->
                    </article><!-- post end -->
                    @empty
                    <x-display-error />
                    @endforelse
                    {{$blogs->links('web.user.paginator.paginator_blog')}}
                </div>
                @include('web.user.blog.sidebar')
            </div><!-- row end -->
        </div>
    </div>


</div>
<!--site-main end-->
@endsection

@push('scripts')

@endpush