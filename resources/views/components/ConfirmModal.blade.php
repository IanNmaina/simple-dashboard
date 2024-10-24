<div x-data="{ open: false }" x-show="open" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
    <div class="bg-black opacity-50 fixed inset-0" @click="open = false"></div>
    <div class="bg-white rounded-lg shadow-lg w-1/3 z-10 p-6">
        <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
        <p class="mb-4">Are you sure you want to delete this project? This action cannot be undone.</p>
        <div class="flex justify-end">
            <button @click="open = false" class="text-gray-500 hover:text-gray-700 mr-2">Cancel</button>
            <button 
                @click="document.getElementById('delete-form').submit()" 
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Delete
            </button>
        </div>
    </div>
</div>
