<div>
    <div class="container mt-5">
       {{-- <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">--}}
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
                            <input type="text" class="form-control" id="slug" placeholder="Enter slug" wire:model="slug"/>
                            @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="image" wire:model="image"/>
                             @if($image)
                                <img src="{{ $image->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="desc">desc</label>
                            <textarea  rows="4" cols="50" class="form-control" id="desc" placeholder="Enter desc" wire:model="desc"></textarea>
                            @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hbcolor">Border & Number color</label>
                            <input type="text" class="form-control" id="hbcolor" placeholder="Enter Border & Number color" wire:model="hbcolor"/>
                            @error('hbcolor') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                         <br/>
                        <div class="form-group">
                            <label for="gallery">gallery</label>
                            <input type="file" class="form-control" id="gallery" placeholder="Enter gallery" wire:model="gallery" multiple/>
                             @if($gallery)
                                @foreach ($gallery as $image )
                                    <img src="{{ $image->temporaryUrl() }}" width="120" style="float: left; padding:5px;"/>
                                @endforeach 
                            @endif
                            @error('gallery') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="floorplan">floorplan</label>
                            <input type="file" class="form-control" id="floorplan" placeholder="Enter floorplan" wire:model="floorplan" multiple/>
                             @if($floorplan)
                                @foreach ($floorplan as $image )
                                    <img src="{{ $image->temporaryUrl() }}" width="120" style="float: left; padding:5px;"/>
                                  
                                @endforeach 
                            @endif
                            
                            @error('floorplan') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                               <p style="clear: both; width:100%"></p>
                             <label for="newfimage">Bottom image</label>
                            <input type="file" class="form-control" id="fimage" placeholder="Enter fimage" wire:model="fimage" multiple/>
                            @if($fimage)
                                <img src="{{ $fimage->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('fimage') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="download">Brochure</label>
                            <input type="file" class="form-control" id="download" placeholder="Enter download" wire:model="download"/>
                            @error('download') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
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
                        @foreach($inputs as $key => $value)
                        <div class="col-md-12">
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
