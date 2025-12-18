@extends('admin.layout')

@section('title', 'Orders Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Orders Management</h1>
            <p class="text-gray-600 mt-1">Manage and track customer orders</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition duration-200 font-medium flex items-center">
                <i class="fas fa-download mr-2"></i>Export
            </button>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Order #</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Customer</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Amount</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Payment</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Date</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($orders as $order)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4">
                            <p class="font-mono font-semibold text-gray-800">#{{ $order->order_number }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-gray-800">{{ $order->customer_name }}</p>
                                <p class="text-sm text-gray-500">{{ $order->customer_email }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-800">${{ number_format($order->total_amount, 2) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($order->status == 'delivered') bg-green-100 text-green-800
                                @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800
                                @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($order->payment_status == 'paid') bg-green-100 text-green-800
                                @elseif($order->payment_status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->payment_status == 'failed') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-800">{{ $order->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $order->created_at->format('h:i A') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.orders.show', $order) }}" 
                                   class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition duration-200">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-100 hover:bg-red-200 text-red-600 p-2 rounded-lg transition duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="text-gray-400">
                                <i class="fas fa-shopping-bag text-4xl mb-4"></i>
                                <p class="text-lg">No orders found</p>
                                <p class="text-sm mt-1">Orders will appear here when customers make purchases</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($orders->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>
@endsection