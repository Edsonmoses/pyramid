<div>
    <div class="container mt-5">
       {{-- <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">--}}
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lnewogo">Main Logo</label>
                            <input type="file" class="form-control" id="logo" wire:model="newlogo"/>
                             @if($newlogo)
                                <img src="{{ $newlogo->temporaryUrl() }}" width="120"/>
                             @else
                                <img src="{{ asset('assets/user/images') }}/{{ $logo }}" width="120"/>
                            @endif
                            @error('newlogo') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="tophone">Top Phone</label>
                            <input type="text" class="form-control" id="tophone" placeholder="Enter top phone" wire:model="tophone"/>
                            @error('tophone') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                         <br/>
                        <div class="form-group">
                            <label for="flogo">Footer logo</label>
                            <input type="file" class="form-control" id="newflogo" wire:model="newflogo"/>
                             @if($newflogo)
                                <img src="{{ $newflogo->temporaryUrl() }}" width="120"/>
                            @else
                                <img src="{{ asset('assets/user/images') }}/{{ $flogo }}" width="120"/>
                            @endif
                            @error('newflogo') <span class="text-danger">{{ $message }}</span>@enderror
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
                            <label for="fnewavicon">Favicon</label>
                            <input type="file" class="form-control" id="fnewavicon" wire:model="newfavicon"/>
                             @if($newfavicon)
                                <img src="{{ $newfavicon->temporaryUrl() }}" width="120"/>
                            @else
                                <img src="{{ asset('assets/user/ico') }}/{{ $favicon }}" width="120"/>
                            @endif
                            @error('newfavicon') <span class="text-danger">{{ $message }}</span>@enderror
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
                            <input type="file" class="form-control" id="newcreation" wire:model="newcreation"/>
                             @if($newcreation)
                                <img src="{{ $newcreation->temporaryUrl() }}" width="120"/>
                            @else
                                <img src="{{ asset('assets/user/images') }}/{{ $creation }}" width="120"/>
                            @endif
                            @error('newcreation') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                     <!--row end-->
                </div>
                <br/>
                    <button wire:click.prevent="storeSetting()" class="btn btn-success">Update</button>
                    <br/>
                </form>
           {{-- <!-- bg-white end-->
        </div>--}}
        <!-- end container-->
   </div>
<!--end livewire div-->
</div>
