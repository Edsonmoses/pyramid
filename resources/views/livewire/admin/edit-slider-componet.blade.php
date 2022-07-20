 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Edit Slider') }}
        </h2>
    </x-slot>
<div>
    <div class="container mt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            

            <a  href="{{ route('sliders') }}" class="btn btn-primary mb-4">All Sliders</a>
       {{-- <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">--}}
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="newimage">Main Image</label>
                            <input type="file" class="form-control" id="newimage" wire:model="mewimage"/>
                             @if($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                            @else
                                <img src="{{ asset('assets/user/images') }}/{{ $image }}" width="120"/>
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
                    <button wire:click.prevent="storeSlider()" class="btn btn-success">Update</button>
                </form>
           {{-- <!-- bg-white end-->
        </div>--}}
        <!-- end container-->
   </div>
<!--end livewire div-->
</div>
