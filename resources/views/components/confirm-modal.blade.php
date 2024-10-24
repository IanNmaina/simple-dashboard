<div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
        <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
        <p class="mb-6">Are you sure you want to delete this project?</p> <!-- Removed direct access to project name -->

        <div class="flex justify-end space-x-3">
            <button @click="showModal = false" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
            <form id="delete-form" method="POST" :action="`/projects/${projectId}`"> <!-- Dynamically set the form action -->
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
</div>
