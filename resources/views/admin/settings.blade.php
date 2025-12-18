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
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
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
                            <p class="text-2xl font-bold text-gray-800">{{ $totalMessages }}</p>
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
                            <p class="text-2xl font-bold text-red-600">{{ $unreadMessages }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-envelope-open text-red-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Replied</p>
                            <p class="text-2xl font-bold text-green-600">{{ $repliedMessages }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-reply text-green-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">This Month</p>
                            <p class="text-2xl font-bold text-purple-600">{{ $monthlyMessages }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-calendar text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages List -->
        <div class="p-6">
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" class="rounded border-gray-300">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sender
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject
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
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($messages as $message)
                        <tr class="{{ $message->status === 'unread' ? 'bg-blue-50' : 'hover:bg-gray-50' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="rounded border-gray-300">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-medium">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $message->subject }}</div>
                                <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($message->message, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $message->created_at->format('M j, Y') }}</div>
                                <div class="text-sm text-gray-500">{{ $message->created_at->format('g:i A') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($message->status === 'unread')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Unread
                                </span>
                                @elseif($message->status === 'read')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Read
                                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Replied
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="viewMessage({{ $message->id }})" class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                <button onclick="replyToMessage({{ $message->id }})" class="text-green-600 hover:text-green-900 mr-3">Reply</button>
                                <button onclick="deleteMessage({{ $message->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing {{ $messages->firstItem() }} to {{ $messages->lastItem() }} of {{ $messages->total() }} results
                </div>
                <div class="flex space-x-2">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Message View Modal -->
<div id="messageModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 class="text-xl font-bold text-gray-800">Message Details</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="mt-4" id="messageContent">
                <!-- Message content will be loaded here -->
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition duration-200">
                    Close
                </button>
                <button onclick="replyToCurrentMessage()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-reply mr-2"></i>Reply
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function viewMessage(messageId) {
    // Fetch message details and populate modal
    fetch(`/admin/contact-messages/${messageId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('messageContent').innerHTML = `
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="font-semibold text-lg">${data.name}</h4>
                            <p class="text-gray-600">${data.email}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">${data.created_at}</p>
                            <span class="px-2 py-1 text-xs rounded-full ${getStatusClass(data.status)}">
                                ${data.status.charAt(0).toUpperCase() + data.status.slice(1)}
                            </span>
                        </div>
                    </div>
                    <div>
                        <h5 class="font-medium text-gray-700">Subject: ${data.subject}</h5>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-wrap">${data.message}</p>
                    </div>
                    ${data.admin_notes ? `
                    <div>
                        <h6 class="font-medium text-gray-700 mb-2">Admin Notes:</h6>
                        <div class="bg-yellow-50 p-3 rounded-lg">
                            <p class="text-gray-700">${data.admin_notes}</p>
                        </div>
                    </div>
                    ` : ''}
                </div>
            `;
            
            // Mark as read
            if (data.status === 'unread') {
                markAsRead(messageId);
            }
            
            document.getElementById('messageModal').classList.remove('hidden');
        });
}

function getStatusClass(status) {
    switch(status) {
        case 'unread': return 'bg-red-100 text-red-800';
        case 'read': return 'bg-blue-100 text-blue-800';
        case 'replied': return 'bg-green-100 text-green-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function closeModal() {
    document.getElementById('messageModal').classList.add('hidden');
}

function markAsRead(messageId) {
    fetch(`/admin/contact-messages/${messageId}/read`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
}

function replyToMessage(messageId) {
    // Implement reply functionality
    const email = prompt('Enter your reply:');
    if (email) {
        fetch(`/admin/contact-messages/${messageId}/reply`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ reply: email })
        }).then(() => {
            location.reload();
        });
    }
}

function deleteMessage(messageId) {
    if (confirm('Are you sure you want to delete this message?')) {
        fetch(`/admin/contact-messages/${messageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            location.reload();
        });
    }
}

function replyToCurrentMessage() {
    const email = prompt('Enter your reply:');
    if (email) {
        // Implement reply logic
        closeModal();
    }
}
</script>
@endsection