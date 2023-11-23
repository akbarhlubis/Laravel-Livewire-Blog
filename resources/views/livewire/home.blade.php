<div>
    <h1>Ini Home</h1>
    @include('livewire.search-bar')
    <div class="card-group">
        @forelse ($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
        @empty
        <h1>Kosong</h1>
        @endforelse
    </div>
</div>
