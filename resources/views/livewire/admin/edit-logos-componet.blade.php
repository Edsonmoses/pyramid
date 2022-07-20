
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Edit Logo') }}
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
         <a  href="{{ route('logos') }}" class="btn btn-primary mb-3">All Logos</a>
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="newimage">Logo Image</label>
                            <input type="file" class="form-control" id="inewmage" wire:model="newimage"/>
                             @if($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                            @else
                                <img src="{{ asset('assets/user/images')}}/{{ $image }}" alt="{{ $name }}" width="120">
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="slug">slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter slug" wire:model="slug"/>
                            @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Logo Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name" wire:keyup="generateSlug"/>
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="logoUrl">Link to the project</label>
                            <select class="form-control" wire:model="logoUrl">
                                <option value="#">Select Project</option>
                                @foreach($projects as $project)
                                        <option value="{{ $project->slug }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            @error('logoUrl') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <br/>
                    </div>
                     <!--row end-->
                </div>
                <br/>
                    <button wire:click.prevent="storeLogos()" class="btn btn-success">Update</button>
                </form>
            <!-- bg-white end-->
        </div>
        <!-- end container-->
   </div>
<!--end livewire div-->
</div>
