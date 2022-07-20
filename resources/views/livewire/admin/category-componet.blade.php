
@if($isModalOpen)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
         </h2>
    </x-slot>
 @elseif($editModalOpen)
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>
 @else
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Category') }}
        </h2>
    </x-slot>
@endif
        
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
        @include('livewire.admin.add-category-componet')
  @elseif($editModalOpen)

  <button wire:click="closeModalPopedit()"
                class="btn btn-primary">
                All Projects
            </button>
            <button wire:click="create()"
                class="btn btn-success mr-3">
                Create Project
            </button>
        @include('livewire.admin.edit-category-componet')
   @else
   <button wire:click="create()"
                class="btn btn-success">
                Create Project
            </button>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th></th>
                <th>
                    <div class="icheck-primary d-inline ml-2">
                        <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                        <label for="todoCheck2"></label>
                    </div>
                </th>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody wire:sortable="updateProjectOrder">
            @foreach($category as $value)
            <tr wire:sortable.item="{{ $value->id }}" wire:key="project-{{ $value->id }}">
                <td wire:sortable.handle style="width: 10px; cursor: move;"><i class="fa fa-arrows-alt text-muted"></i></td>
                <th style="width: 10px;">
                    <div class="icheck-primary d-inline">
                        <input wire:model="selectedRows" type="checkbox" value="{{ $value->id }}" name="todo2" id="{{ $value->id }}">
                        <label for="{{ $value->id }}"></label>
                    </div>
                </th>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                <button  wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
               
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete </button>
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
     @endif
    </div>
</div>
<style>
    .draggable-mirror{
        background: white;
        width: 90%;
        display: flex;
        justify-content: space-between;
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }
</style>