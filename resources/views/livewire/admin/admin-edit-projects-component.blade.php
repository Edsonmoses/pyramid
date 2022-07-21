  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Edit Project') }}
                <a href="/admin/projects"
                class="btn btn-primary" style="float: right">
                All Projects
            </a>
        </h2>
       
    </x-slot>
<div>
    <div class="container mt-5">
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
        <form>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" wire:model="title">
                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name" wire:keyup="generateSlug"/>
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
                    <label for="newimage">image</label>
                    <input type="file" class="form-control" id="newimage" wire:model="newimage">
                     @if($newimage)
                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                    @else
                        <img src="{{ asset('assets/user/images') }}/{{ $image }}" width="120"/>
                    @endif
                    @error('newimage') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="desc">desc</label>
                    <textarea  rows="4" cols="50" class="form-control" id="desc" placeholder="Enter desc" wire:model="desc"></textarea>
                    @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="hbcolor">Border & Number color</label>
                    <input type="text" class="form-control" id="hbcolor" placeholder="Enter Border & Number color" wire:model="hbcolor"/>
                    @error('hbcolor') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-6">
                
                <br/>
                <div class="form-group">
                    <label for="newgallery">Gallery</label>
                    <input type="file" class="form-control" id="newgallery" placeholder="Upload gallery images" wire:model="newgallery" multiple>
                    @if($newgallery)
                        @foreach ($newgallery as $newgallery)
                            @if ($newgallery)
                                <img src="{{ $newgallery->temporaryUrl() }}" width="120" style="float: left; padding:5px;"/>
                            @endif
                        @endforeach
                    @else
                        @foreach ($gallery as $image)
                            @if ($image)
                                <img src="{{ asset('assets/user/images') }}/{{ $image }}" width="120" style="float: left; padding:5px;"/>
                            @endif
                        @endforeach
                    @endif
                    <p style="clear: both"></p>
                    @error('newgallery') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="newfloorplan">Floorplan</label>
                    <input type="file" class="form-control" id="newfloorplan" placeholder="Upload floorplan" wire:model="newfloorplan" multiple>
                    @if($newfloorplan)
                        @foreach ($newfloorplan as $newfloorplan)
                            @if ($newfloorplan)
                                <img src="{{ $newfloorplan->temporaryUrl() }}" width="120" style="float: left; padding:5px;"/>
                            @endif
                        @endforeach
                    @else
                        @foreach ($floorplan as $image)
                            @if ($image)
                                <img src="{{ asset('assets/user/images') }}/{{ $image }}" width="120" style="float: left; padding:5px;"/>
                            @endif
                        @endforeach
                    @endif
                     <p style="clear: both"></p>
                    @error('newfloorplan') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="newfimage">Bottom image</label>
                    <input type="file" class="form-control" id="newfimage" placeholder="upload image" wire:model="newfimage" multiple/>
                   @if($newfimage)
                        @foreach ($newfimage as $newfimage)
                            @if ($newfimage)
                                <img src="{{ $newfimage->temporaryUrl() }}" width="120" style="float: left; padding:5px;"/>
                            @endif
                        @endforeach
                    @else
                        @foreach ($fimage as $image)
                            @if ($image)
                                <img src="{{ asset('assets/user/images') }}/{{ $image }}" width="120" style="float: left; padding:5px;"/>
                            @endif
                        @endforeach
                    @endif
                    <p style="clear: both"></p>
                    @error('fimage') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
                <div class="form-group">
                    <label for="newdownload">Brochure</label>
                    <input type="file" class="form-control" id="newdownload" placeholder="Enter download" wire:model="newdownload">
                    @error('newdownload') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <br/>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statno.0">statno</label>
                            <input type="text" class="form-control" id="statno.0" placeholder="Enter statno" wire:model="statno.0"/>
                            @error('statno.0') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                            <label for="statname.0">statname</label>
                            <input type="text" class="form-control" id="statname.0" placeholder="Enter statname" wire:model="statname.0"/>
                            @error('statname.0') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="statsub.0">statsub</label>
                            <input type="text" class="form-control" id="statsub.0" placeholder="Enter statsub" wire:model="statsub.0"/>
                            @error('statsub.0') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                            <label for="btn"></label>
                            <button class="btn text-white btn-info btn-sm mt-4" wire:click.prevent="add({{$i}})">Add</button>
                            </div>
                    </div>
                    <!--row end-->
                </div>
            </div>
                @foreach($inputs as $key => $value)
                <div class="col-md-12">
                    <br/>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="statno.0">statno</label>
                                <input type="text" class="form-control" id="statno.0" placeholder="Enter statno" wire:model="statno.{{ $value }}"/>
                                @error('statno.'.$value) <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="statname.0">statname</label>
                                <input type="text" class="form-control" id="statname.0" placeholder="Enter statname" wire:model="statname.{{ $value }}"/>
                                @error('statname.'.$value) <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="statsub.0">statsub</label>
                                <input type="text" class="form-control" id="statsub.0" placeholder="Enter statsub" wire:model="statsub.{{ $value }}"/>
                                @error('statsub.'.$value) <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="btn"></label>
                                <button class="btn btn-danger btn-sm mt-4" wire:click.prevent="remove({{$key}})">Remove</button>
                            </div>
                        </div>
                        <!--row end-->
                    </div>
                </div>
                @endforeach
            </div>
            <br/>
            <div class="col-md-3">
                 <button wire:click.prevent="storeProject()" class="btn btn-success">Update</button>
            </div>
            <br/>
                <!--row end-->
            </div>
           
        </form>
    </div>
</div>
