<div>
    <h2 class="widget-title">Categories</h2>
    <ul class="category-list">
        @foreach ($categories as $category)
            <li>
                <a href="{{route('category',$category->name)}}">{{$category->name}}
                    <span class="ts-orange-bg">+{{(int)round($category->posts_count,-1)}}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
