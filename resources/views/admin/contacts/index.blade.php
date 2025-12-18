@extends('admin.layout')

@section('title', 'Contact Messages')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Messages Header -->
        <div class="border-b border-gray-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Contact Messages</h1>
                    <p class="text-gray-600 mt-1">Manage customer inquiries and messages</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search messages..." 
                               class="border border-gray-300 rounded-lg px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Stats -->
        <div class="bg-gray-50 border-b border-gray-200 p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Messages</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalContacts }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Unread</p>
                            <p class="text-2xl font-bold text-red-600">{{ $unreadContacts }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-envelope-open text-red-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Important</p>
                            <p class="text-2xl font-bold text-yellow-600">{{ $importantContacts }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-star text-yellow-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Replied</p>
                            <p class="text-2xl font-bold text-green-600">{{ $repliedContacts }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-reply text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulk Actions -->
        <div class="bg-gray-50 border-b border-gray-200 p-4">
            <div class="flex items-center space-x-4">
                <select id="bulk-action" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Bulk Actions</option>
                    <option value="mark_read">Mark as Read</option>
                    <option value="mark_replied">Mark as Replied</option>
                    <option value="mark_important">Mark as Important</option>
                    <option value="unmark_important">Unmark Important</option>
                    <option value="delete">Delete</option>
                </select>
                <button onclick="applyBulkAction()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    Apply
                </button>
            </div>
        </div>

        <!-- Messages List -->
        <div class="p-6">
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="select-all" class="rounded border-gray-300">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sender
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject & Message
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="contacts-table-body">
                        @foreach($contacts as $contact)
                        <tr class="{{ $contact->status === 'unread' ? 'bg-blue-50' : '' }} {{ $contact->is_important ? 'border-l-4 border-yellow-400' : '' }}" id="contact-{{ $contact->id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="contact-checkbox rounded border-gray-300" value="{{ $contact->id }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-medium">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                                        @if($contact->phone)
                                        <div class="text-sm text-gray-500">{{ $contact->phone }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $contact->subject }}</div>
                                <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($contact->message, 80) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $contact->created_at->format('M j, Y') }}</div>
                                <div class="text-sm text-gray-500">{{ $contact->created_at->format('g:i A') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($contact->status === 'unread')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Unread
                                </span>
                                @elseif($contact->status === 'read')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Read
                                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Replied
                                </span>
                                @endif
                                
                                @if($contact->is_important)
                                <span class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Important
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="viewMessage({{ $contact->id }})" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                <button onclick="toggleImportant({{ $contact->id }})" class="text-yellow-600 hover:text-yellow-900 mr-3">
                                    {{ $contact->is_important ? 'Unmark' : 'Mark' }} Important
                                </button>
                                <button onclick="deleteMessage({{ $contact->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} results
                </div>
                <div class="flex space-x-2">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Message View Modal -->
<div id="messageModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 class="text-xl font-bold text-gray-800">Message Details</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">
                    &times;
                </button>
            </div>
            
            <div class="mt-4 space-y-4" id="messageContent">
                <!-- Message content will be loaded here -->
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition duration-200">
                    Close
                </button>
                <button onclick="markAsReplied(currentMessageId)" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-reply mr-2"></i>Mark as Replied
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let currentMessageId = null;

// Select All Checkbox
document.getElementById('select-all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.contact-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Bulk Actions
function applyBulkAction() {
    const action = document.getElementById('bulk-action').value;
    const selectedIds = getSelectedContactIds();
    
    if (selectedIds.length === 0) {
        alert('Please select contacts to perform action.');
        return;
    }
    
    if (!action) {
        alert('Please select an action.');
        return;
    }
    
    fetch('{{ route("admin.contacts.bulk-action") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            action: action,
            contact_ids: selectedIds
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error performing bulk action.');
    });
}

function getSelectedContactIds() {
    const checkboxes = document.querySelectorAll('.contact-checkbox:checked');
    return Array.from(checkboxes).map(cb => cb.value);
}

// View Message
function viewMessage(messageId) {
    currentMessageId = messageId;
    
    fetch(`/admin/contacts/${messageId}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('messageContent').innerHTML = `
            <div class="space-y-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-semibold text-lg">${data.name}</h4>
                        <p class="text-gray-600">${data.email}</p>
                        ${data.phone ? `<p class="text-gray-600">${data.phone}</p>` : ''}
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">${new Date(data.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</p>
                        <p class="text-sm text-gray-500">${new Date(data.created_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}</p>
                    </div>
                </div>
                
                <div>
                    <h5 class="font-medium text-gray-700 mb-2">Subject: ${data.subject}</h5>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-700 whitespace-pre-wrap">${data.message}</p>
                </div>
            </div>
        `;
        
        // Mark as read if unread
        if (data.status === 'unread') {
            markAsRead(messageId);
        }
        
        document.getElementById('messageModal').classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error loading message.');
    });
}

function closeModal() {
    document.getElementById('messageModal').classList.add('hidden');
}

function markAsRead(messageId) {
    fetch(`/admin/contacts/${messageId}/read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    });
}

function markAsReplied(messageId) {
    fetch(`/admin/contacts/${messageId}/replied`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeModal();
            location.reload();
        }
    });
}

function toggleImportant(messageId) {
    fetch(`/admin/contacts/${messageId}/toggle-important`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}

function deleteMessage(messageId) {
    if (confirm('Are you sure you want to delete this message?')) {
        fetch(`/admin/contacts/${messageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`contact-${messageId}`).remove();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting message.');
        });
    }
}
</script>
@endsection