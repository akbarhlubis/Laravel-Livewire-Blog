<div>
    <h1 class="mt-5">Ini Postingan Utama</h1>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    @endif

    @if ($addPost)
        @include('livewire.posts.create')
    @endif

    @if ($updatePost)
        @include('livewire.posts.update')
    @endif


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if (!$addPost)
                    <button wire:click="create()" class="btn btn-primary btn-sm float-end">Add New Post</button>
                @endif
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                        {{ $post->slug }}
                                    </td>
                                    <td>
                                        {{ $post->content }}
                                    </td>
                                    <td>
                                        <button class="btn {{ $post->status == 1 ? 'btn-success' : 'btn-danger' }}" wire:click="changeStatus({{$post->id}})">
                                            {{ $post->status == 1 ? 'Publish' : 'Draft' }}
                                        </button>
                                    </td>
                                    
                                    <td>
                                        <button wire:click="edit({{ $post->id }})"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="destroy({{ $post->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" align="center">
                                        No Posts Found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
