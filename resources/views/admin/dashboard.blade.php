@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-gray-600 mt-1">Here's what's happening with your store today.</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Sales -->
        <div class="bg-gradient-to-r from-blue-500 to-cyan-600 rounded-xl text-white p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-white bg-opacity-10 rounded-full -mr-6 -mt-6"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">Total Sales</p>
                        <h3 class="text-2xl font-bold mt-2">${{ number_format($totalSales, 2) }}</h3>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-dollar-sign text-white text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-green-300 text-sm">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>12% increase</span>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl text-white p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-white bg-opacity-10 rounded-full -mr-6 -mt-6"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Total Orders</p>
                        <h3 class="text-2xl font-bold mt-2">{{ $totalOrders }}</h3>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-shopping-bag text-white text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-green-300 text-sm">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>8% increase</span>
                </div>
            </div>
        </div>

        <!-- Total Products -->
        <div class="bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl text-white p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-white bg-opacity-10 rounded-full -mr-6 -mt-6"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Total Products</p>
                        <h3 class="text-2xl font-bold mt-2">{{ $totalProducts }}</h3>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-tshirt text-white text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-green-300 text-sm">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>5% increase</span>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="bg-gradient-to-r from-amber-500 to-orange-600 rounded-xl text-white p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-20 h-20 bg-white bg-opacity-10 rounded-full -mr-6 -mt-6"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-100 text-sm font-medium">Total Customers</p>
                        <h3 class="text-2xl font-bold mt-2">{{ $totalCustomers }}</h3>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-green-300 text-sm">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>15% increase</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Data -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Sales Chart -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Sales Overview</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">Last 7 Days</button>
                    <button class="px-3 py-1 text-xs text-gray-500 hover:bg-gray-100 rounded-full">Last 30 Days</button>
                </div>
            </div>
            <div class="h-64">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-blue-600 text-sm font-medium">View All</a>
            </div>
            <div class="space-y-4">
                @forelse($recentOrders as $order)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-800">
                            #{{ $order->order_number ?? 'ORD-' . $order->id }}
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ $order->user->name ?? ($order->customer_name ?? 'Guest Customer') }}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-800">${{ number_format($order->total_amount, 2) }}</p>
                        <span class="inline-block px-2 py-1 text-xs rounded-full 
                            @if($order->status == 'delivered') bg-green-100 text-green-800
                            @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                            @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800
                            @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($order->status ?? 'pending') }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="text-center py-6">
                    <i class="fas fa-shopping-bag text-gray-300 text-3xl mb-2"></i>
                    <p class="text-gray-500">No orders yet</p>
                    <p class="text-gray-400 text-sm mt-1">New orders will appear here</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Bottom Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Top Products -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Top Selling Products</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b border-gray-200">
                            <th class="pb-3 text-gray-600 font-medium">Product</th>
                            <th class="pb-3 text-gray-600 font-medium">Category</th>
                            <th class="pb-3 text-gray-600 font-medium text-right">Units Sold</th>
                            <th class="pb-3 text-gray-600 font-medium text-right">Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topProducts as $product)
                        <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50">
                            <td class="py-3">
                                <div class="flex items-center space-x-3">
                                    @if($product->image)
                                    <img src="{{ asset('img/products/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="h-10 w-10 rounded-lg object-cover">
                                    @else
                                    <div class="h-10 w-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-tshirt text-gray-400"></i>
                                    </div>
                                    @endif
                                    <span class="font-medium text-gray-800">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                    {{ $product->category ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="py-3 text-right font-semibold text-gray-800">
                                {{ $product->order_items_sum_quantity ?? 0 }}
                            </td>
                            <td class="py-3 text-right font-semibold text-green-600">
                                ${{ number_format(($product->order_items_sum_quantity ?? 0) * $product->price, 2) }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500">
                                <i class="fas fa-tshirt text-2xl mb-2 block"></i>
                                No sales data available
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Store Performance</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sync-alt text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Conversion Rate</p>
                            <p class="text-xs text-gray-600">Last 30 days</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-green-600">3.2%</span>
                </div>

                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Avg. Order Value</p>
                            <p class="text-xs text-gray-600">Last 30 days</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-gray-800">${{ number_format($totalSales / max($totalOrders, 1), 2) }}</span>
                </div>

                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-clock text-purple-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Returning Customers</p>
                            <p class="text-xs text-gray-600">Last 30 days</p>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-gray-800">24%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        
        const chartLabels = {!! json_encode($salesData->pluck('date')) !!};
        const chartData = {!! json_encode($salesData->pluck('total')) !!};
        
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Sales ($)',
                    data: chartData,
                    borderColor: '#0ea5e9',
                    backgroundColor: 'rgba(14, 165, 233, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#0ea5e9',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            color: '#6b7280',
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection