
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($isModalOpen)
               {{ __('Create Page') }}
            @else
               {{ __('Pages') }}
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
                All Pages
            </button>
        @include('livewire.admin.add-pages-component')
  @elseif($editModalOpen)

  <button wire:click="closeModalPopedit()"
                class="btn btn-primary">
                All Pages
            </button>
            <button wire:click="create()"
                class="btn btn-success mr-3">
                Create Page
            </button>
        @include('livewire.admin.edit-pages-componet')
   @else
   <button wire:click="create()"
                class="btn btn-success">
                Create Page
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
                <th>Image </th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody wire:sortable="updateProjectOrder">
            @foreach($pages as $value)
            <tr wire:sortable.item="{{ $value->id }}" wire:key="project-{{ $value->id }}">
                <td wire:sortable.handle style="width: 10px; cursor: move;"><i class="fa fa-arrows-alt text-muted"></i></td>
                <th style="width: 10px;">
                    <div class="icheck-primary d-inline">
                        <input wire:model="selectedRows" type="checkbox" value="{{ $value->id }}" name="todo2" id="{{ $value->id }}">
                        <label for="{{ $value->id }}"></label>
                    </div>
                </th>
                <td>{{ $value->id }}</td>
                <td><img src="{{ asset('assets/user/images') }}/{{ $value->image }}" width="50"/></td>
                <td>{!! $value->name !!}</td>
                <td style="width: 15%">
                <a  href="{{ route('page.edit',['slug'=>$value->slug]) }}" class="btn btn-primary btn-sm">Edit</a>
               
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