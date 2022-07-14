<div>
   <form>
    <div class="form-group">
        <label for="title">title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="slug">slug</label>
        <input type="text" class="form-control" id="slug" placeholder="Enter slug" wire:model="slug">
        @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="image">image</label>
        <input type="text" class="form-control" id="image" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="desc">desc</label>
        <input type="text" class="form-control" id="desc" placeholder="Enter desc" wire:model="desc">
        @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="statno">statno</label>
        <input type="text" class="form-control" id="statno" placeholder="Enter statno" wire:model="statno">
        @error('statno') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="statname">statname</label>
        <input type="text" class="form-control" id="statname" placeholder="Enter statname" wire:model="statname">
        @error('statname') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="statsub">statsub</label>
        <input type="text" class="form-control" id="statsub" placeholder="Enter statsub" wire:model="statsub">
        @error('statsub') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="gallery">gallery</label>
        <input type="text" class="form-control" id="gallery" placeholder="Enter gallery" wire:model="gallery">
        @error('gallery') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="floorplan">floorplan</label>
        <input type="text" class="form-control" id="floorplan" placeholder="Enter floorplan" wire:model="floorplan">
        @error('floorplan') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="fimage">fimage</label>
        <input type="text" class="form-control" id="fimage" placeholder="Enter fimage" wire:model="fimage">
        @error('fimage') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br/>
     <div class="form-group">
        <label for="download">download</label>
        <input type="text" class="form-control" id="download" placeholder="Enter download" wire:model="download">
        @error('download') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
</div>
