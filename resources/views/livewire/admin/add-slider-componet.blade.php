<div>
    <div class="container mt-5">
       {{-- <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">--}}
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Main Image</label>
                            <input type="file" class="form-control" id="image" wire:model="image"/>
                             @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter location" wire:model="location"/>
                            @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="btname">Button Name</label>
                            <input type="text" class="form-control" id="btname" placeholder="Enter button name" wire:model="btname"/>
                            @error('btname') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name" wire:keyup="generateSlug"/>
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="url">Link to the project</label>
                            <select class="form-control" wire:model="url">
                                <option value="">Select Project</option>
                                @foreach($projects as $project)
                                        <option value="{{ $project->slug }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            @error('url') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                     <!--row end-->
                </div>
                <br/>
                    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
                </form>
           {{-- <!-- bg-white end-->
        </div>--}}
        <!-- end container-->
   </div>
<!--end livewire div-->
</div>
