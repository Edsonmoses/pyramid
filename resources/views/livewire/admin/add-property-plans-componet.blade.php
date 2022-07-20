<div>
    <div class="container mt-5">
       {{-- <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">--}}
                <form>
                <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name" wire:keyup="generateSlug"/>
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                         <div class="form-group">
                            <label for="nameb"> Name B</label>
                            <input type="text" class="form-control" id="nameb" placeholder="Enter name b( is the name in white color)" wire:model="nameb" wire:keyup="generateSlug"/>
                            @error('nameb') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" wire:model="image"/>
                             @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter slug" wire:model="slug"/>
                            @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="subname">Sub Title</label>
                            <input type="text" class="form-control" id="subname" placeholder="Enter sub title" wire:model="subname"/>
                            @error('subname') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="url">Page/Project</label>
                            <select class="form-control" wire:model="url">
                                <option value="#">Select Page/Project</option>
                                @foreach($projects as $project)
                                        <option value="{{ $project->slug }}">{{ $project->name }}</option>
                                @endforeach
                                 @foreach($pages as $page)
                                        <option value="/about-us">{{ $page->name }}</option>
                                @endforeach
                            </select>
                            @error('url') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea  rows="4" cols="50" class="form-control" id="desc" placeholder="Enter desc" wire:model="desc"></textarea>
                            @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
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
