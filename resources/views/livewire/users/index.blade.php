<div class="mt-5">
        <div class="input-group mb-5">
            <span class="input-group-text" id="search">Search</span>
            <input type="search" class="form-control" placeholder="Search name or email" aria-label="Search name or email" name="search" wire:model.live="search">
        </div>

    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
</div>
