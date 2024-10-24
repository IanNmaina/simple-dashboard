@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6" x-data="{ showModal: false }">
    <h1 class="text-3xl font-bold mb-6 text-center">Project Management</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-3 px-4 text-left text-gray-600">Project Name</th>
                    <th class="py-3 px-4 text-left text-gray-600">Description</th>
                    <th class="py-3 px-4 text-left text-gray-600">Status</th>
                    <th class="py-3 px-4 text-left text-gray-600">Deadline</th>
                    <th class="py-3 px-4 text-left text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
                    <td class="py-4 px-4 border-b border-gray-200">{{ $project->name }}</td>
                    <td class="py-4 px-4 border-b border-gray-200">{{ Str::limit($project->description, 50) }}</td>
                    <td class="py-4 px-4 border-b border-gray-200">
                        <span class="inline-flex items-center justify-center px-2 py-1 rounded-full text-white 
                {{ $project->status == 'Completed' ? 'bg-green-500' : ($project->status == 'In Progress' ? 'bg-blue-500' : 'bg-red-500') }} text-xs md:text-sm">
                            {{ $project->status }}
                        </span>

                    </td>

                    <td class="py-4 px-4 border-b border-gray-200 {{ \Carbon\Carbon::now()->gt($project->deadline) ? 'text-red-500' : '' }}">
                        {{ $project->deadline ? $project->deadline->format('d-m-Y') : 'N/A' }} <!-- Handle null cases -->
                    </td>
                    <td class="py-4 px-4 border-b border-gray-200 flex space-x-2">
                        <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <button
                            @click="if(confirm('Are you sure you want to delete this project?')) { document.getElementById('delete-form-{{ $project->id }}').submit(); }"
                            class="text-red-600 hover:underline">
                            Delete
                        </button>

                        <form id="delete-form-{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
@endsection