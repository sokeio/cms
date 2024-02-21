<div>
    <button wire:click='test()'>Test</button>
    @foreach ($posts as $post)
        <div>{{$post->name}}</div>
    @endforeach
</div>
