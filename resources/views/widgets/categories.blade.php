<div class="blog-widget">
    <h3 class="title">Categories</h3>
    <div class="widget_categories">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{route('categories.show',$category)}}">{{$category->name}} @if($category->post_count)
                            <span>({{$category->posts_count}})</span> @endif</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
