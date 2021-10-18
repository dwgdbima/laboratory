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


    <div class="ttm-row sidebar ttm-sidebar-right clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 content-area">
                    <!-- post -->
                    <article class="post ttm-blog-single clearfix">

                        <!-- post-featured-wrapper -->
                        <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                            <div class="ttm-post-featured">
                                <img class="img-fluid" src="{{asset($blog->thumbnail)}}" alt="">
                            </div>
                        </div><!-- post-featured-wrapper end -->
                        <!-- ttm-blog-classic-content -->
                        <div class="ttm-blog-single-content">
                            <div class="ttm-post-entry-header">
                                <div class="post-meta">
                                    <span class="ttm-meta-line byline"><i class="fa fa-user"></i>By
                                        {{$blog->user->name}}</span>
                                    <span class="ttm-meta-line entry-date"><i class="fa fa-calendar"></i><time
                                            class="entry-date published"
                                            datetime="{{$blog->created_at}}">{{$blog->publish_at}}</time></span>
                                </div>
                            </div>
                            <div class="entry-content">
                                <h3>{{$blog->title}}</h3>
                                <div class="ttm-box-desc-text">
                                    {!! $blog->content !!}
                                    <div class="ttm-blogbox-desc-footer">
                                        <div class="ttm-blogbox-footer-readmore">
                                            <div class="ttm-blogbox-footer-right">
                                                <div
                                                    style="font-size: 17px; margin-right: 8px; font-weight: 500; display: inline-block;">
                                                    Tag Post :</div>
                                                @foreach ($blog->tags as $tag)
                                                <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-grey mr-2"
                                                    href="#">{{$tag->name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- ttm-blog-classic-content end -->
                    </article><!-- post end -->
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