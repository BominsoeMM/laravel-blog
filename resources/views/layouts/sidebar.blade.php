
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action
            " href="{{route('home')}}">
        Home
    </a>
    <a class="list-group-item list-group-item-action" href="{{route('test')}}">
        Test
    </a>
</div>
<p class="small text-black-50">Manage Post</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('post.index')}}">
        Post list
    </a>
    <a class="list-group-item list-group-item-action" href="{{route('post.create')}}">
        Create Post
    </a>
</div>
<p class="small text-black-50">Manage Category</p>

<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('category.index')}}">
    Category List
    </a>
    <a class="list-group-item list-group-item-action" href="{{route('category.create')}}">
        Create Category
    </a>
</div>

@Admin
<p class="small text-black-50">Manage User</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{route('users.index')}}">
        User List
    </a>
</div>
    @endAdmin