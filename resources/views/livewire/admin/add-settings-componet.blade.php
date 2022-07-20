<div>
    <div class="container mt-5">
       {{-- <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">--}}
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="logo">Main Logo</label>
                            <input type="file" class="form-control" id="logo" wire:model="logo"/>
                             @if($logo)
                                <img src="{{ $logo->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('logo') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="tophone">Top Phone</label>
                            <input type="text" class="form-control" id="tophone" placeholder="Enter top phone" wire:model="tophone"/>
                            @error('tophone') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                         <br/>
                        <div class="form-group">
                            <label for="flogo">Footer Logo</label>
                            <input type="file" class="form-control" id="flogo" wire:model="flogo"/>
                             @if($flogo)
                                <img src="{{ $flogo->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('flogo') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter location" wire:model="location" wire:keyup="generateSlug"/>
                            @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone" wire:model="phone"/>
                            @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" class="form-control" id="favicon" wire:model="favicon"/>
                             @if($favicon)
                                <img src="{{ $favicon->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('favicon') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email" wire:model="email"/>
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                         <br/>
                          <div class="form-group">
                            <label for="fdesc">Footer desc</label>
                            <textarea  rows="4" cols="50" class="form-control" id="fdesc" placeholder="Enter desc" wire:model="fdesc"></textarea>
                            @error('fdesc') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="box">Address</label>
                            <input type="text" class="form-control" id="box" placeholder="Enter address" wire:model="box"/>
                            @error('box') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="creation">Creation logo</label>
                            <input type="file" class="form-control" id="creation" wire:model="creation"/>
                             @if($creation)
                                <img src="{{ $creation->temporaryUrl() }}" width="120"/>
                            @endif
                            @error('creation') <span class="text-danger">{{ $message }}</span>@enderror
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
