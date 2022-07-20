 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Edit Page') }}
        </h2>
    </x-slot>
<div>
    <div class="container mt-5">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
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
            <a  href="{{ route('pages') }}" class="btn btn-primary mb-3">All Pages</a>
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
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="newimage" wire:model="newimage"/>
                             @if($newimage)
                                <img src="{{ $image->temporaryUrl() }}" width="120"/>
                           @else
                                <img src="{{ asset('assets/user/images')}}/{{ $image }}" alt="{{ $name }}" width="120">
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
                    <button wire:click.prevent="store()" class="btn btn-success">Update</button>
                </form>
           <!-- bg-white end-->
        </div>
        <!-- end container-->
   </div>
<!--end livewire div-->
</div>
