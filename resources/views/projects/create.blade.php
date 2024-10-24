@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4" x-data="{ showModal: true }">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">
        <h1 class="text-2xl font-semibold mb-6 text-center">Add New Project</h1>
        
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded-md shadow-md mt-1 block w-full focus:ring-0 focus:border-blue-500">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" class="border border-gray-300 rounded-md shadow-md mt-1 block w-full focus:ring-0 focus:border-blue-500"></textarea>
            </div>
            
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="border border-gray-300 rounded-md shadow-md mt-1 block w-full focus:ring-0 focus:border-blue-500">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="On Hold">On Hold</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="border border-gray-300 rounded-md shadow-md mt-1 block w-full focus:ring-0 focus:border-blue-500">
                @error('deadline') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            
            <div class="flex justify-between mt-6">
                <button type="button" @click="showModal = false" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
