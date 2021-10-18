<div class="col-lg-4 widget-area sidebar-right">
    <aside class="widget widget-search">
        <form action="{{route('blog')}}" role="search" method="get" class="search-form" action="#">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="input-text" placeholder="Enter Your Keyboard...." name="term">
            </label>
            <button class="btn" type="submit" value="Search"> <i class="ti ti-search" aria-hidden="true"></i> </button>
        </form>
    </aside>
    <aside class="widget widget-Categories with-title">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach ($categories as $category)
            <li><a
                    href="{{route('blog.category', $category->slug)}}">{{$category->name}}</a><span>{{$category->blogs_count}}</span>
            </li>
            @endforeach
        </ul>
    </aside>
    <aside class="widget widget-recent-post with-title">
        <h3 class="widget-title">Recent Posts</h3>
        <ul class="widget-post ttm-recent-post-list">
            @foreach ($recentPosts as $recentPost)
            <li>
                <a href="{{route('blog.show', $recentPost->slug)}}"><img class="img-fluid"
                        src="{{asset($recentPost->thumbnail)}}" alt="post-img"></a>
                <span class="post-date">{{$recentPost->publish_at}}</span>
                <a href="{{route('blog.show', $recentPost->slug)}}">{{$recentPost->title}}</a>
            </li>
            @endforeach
        </ul>
    </aside>
    <aside class="widget tagcloud-widget with-title">
        <h3 class="widget-title">Popular Tags</h3>
        <div class="tagcloud">
            @foreach ($tags as $tag)
            <a href="{{route('blog.tag', $tag->slug)}}" class="tag-cloud-link">{{$tag->name}}</a>
            @endforeach
        </div>
    </aside>
</div>