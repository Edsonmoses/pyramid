
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
     @if ($selectedRows)
            <div class="btn-group ml-2">
                <button type="button" class="btn btn-default">Bulk Actions</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a>
                    <a wire:click.prevent="markAllAsScheduled" class="dropdown-item" href="#">Mark as Scheduled</a>
                    <a wire:click.prevent="markAllAsClosed" class="dropdown-item" href="#">Mark as Closed</a>
                    <a wire:click.prevent="export" class="dropdown-item" href="#">Export</a>
                </div>
            </div>

            <span class="ml-2">selected {{ count($selectedRows) }} {{ Str::plural('appointment', count($selectedRows)) }}</span>
      @endif
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
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
                <th>Disable View Project Link</th>
                <th>Un/Publish</th>
            </tr>
        </thead>
        <tbody wire:sortable="updateProjectOrder">
            @foreach($project as $value)
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
                <td>
                    @if ($value->off == 'show')
                    <a href="#" onclick="confirm('Ara you sure, You want to unpublish this project') || event.stopImmediatePropagation();" wire:click.prevent="unPublish({{ $value->id }})" style="margin-left: 10px" class="text-success"><i class="fa fa-toggle-on fa-2x" aria-hidden="true"></i></a>
                    @else
                    <a href="#" onclick="confirm('Ara you sure, You want to publish this project') || event.stopImmediatePropagation();" wire:click.prevent="Publish({{ $value->id }})" style="margin-left: 10px" class="text-danger"><i class="fa fa-toggle-off fa-2x" aria-hidden="true"></i></a>
                    @endif
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