
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($isModalOpen)
               {{ __('Create Project') }}
             @elseif($editModalOpen)
               {{ __('Edit Project') }}
            @else
               {{ __('Projects') }}
            @endif
        </h2>
    </x-slot>
<div class="py-12">
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
            
   @if($isModalOpen)
   <button wire:click="closeModalPopover()"
                class="btn btn-primary">
                All Projects
            </button>
        @include('livewire.admin.create')
  @elseif($editModalOpen)

  <button wire:click="closeModalPopedit()"
                class="btn btn-primary">
                All Projects
            </button>
            <button wire:click="create()"
                class="btn btn-success mr-3">
                Create Project
            </button>
        @include('livewire.admin.update')
   @else
   <button wire:click="create()"
                class="btn btn-success">
                Create Project
            </button>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ Str::limit($value->desc, 100) }}</td>
                <td style="width: 15%">
                <a  href="{{ route('project.edit',['slug'=>$value->slug]) }}" class="btn btn-primary btn-sm">Edit</a>
               
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete </button>
                </td>
                <td>
                    @if ($value->disable == 'active')
                    <a href="#" onclick="confirm('Ara you sure, You want to deactivate this project link') || event.stopImmediatePropagation();" wire:click.prevent="disable({{ $value->id }})" style="margin-left: 10px" class="btn btn-danger btn-sm">Deactivate</a>
                    @else
                    <a href="#" onclick="confirm('Ara you sure, You want to activate this project link') || event.stopImmediatePropagation();" wire:click.prevent="enable({{ $value->id }})" style="margin-left: 10px" class="btn btn-success btn-sm">Activate</a>
                    @endif
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
     @endif
    </div>
</div>
