<div x-show="showModal" @click.away="showModal = false" class="fixed inset-0 flex items-center justify-center z-50" style="background: rgba(0,0,0,0.5);">
    <div class="bg-white rounded-lg p-6 w-11/12 max-w-md" @click.stop>
        <h2 class="text-lg font-bold mb-4">Add New Project</h2>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="name">Project Name</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                <textarea name="description" id="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="status">Status</label>
                <select name="status" id="status" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Not Started">Not Started</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="deadline">Deadline</label>
                <input type="date" name="deadline" id="deadline" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="button" @click="showModal = false" class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Create</button>
            </div>
        </form>
    </div>
</div>
