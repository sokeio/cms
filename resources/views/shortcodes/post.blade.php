<div>
    @isset($posts)
        @foreach ($posts as $post)
            <div>{{ $post->name }}</div>
        @endforeach
    @endisset
</div>
