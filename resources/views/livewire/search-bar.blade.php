<form class="d-flex my-2" role="search">
    <input wire:model.live="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Pencarian</button>
</form>
@if (sizeof($results) > 0)
<div class="dropdown-menu d-block py-0 mt-1">
    @foreach ($results as $result)
    <div class="px-3 py-1 border-bottom dropdown-item">
        <div class="d-flex flex-column ml-3">
            <span>{{$result->title}}</span>
        </div>
    </div>
    @endforeach
</div>
@endif