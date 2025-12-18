@extends('admin.layout')

@section('title', 'My Profile')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
            <div class="flex items-center space-x-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=0ea5e9&size=128" 
                     alt="{{ Auth::user()->name }}" 
                     class="h-20 w-20 rounded-full border-4 border-white border-opacity-20">
                <div>
                    <h1 class="text-2xl font-bold">{{ Auth::user()->name }}</h1>
                    <p class="text-blue-100">{{ Auth::user()->email }}</p>
                    <p class="text-blue-100 text-sm mt-1">Administrator • Joined {{ Auth::user()->created_at->format('F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Personal Information -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h3>
                        <form action="{{ route('admin.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" name="phone" value="{{ Auth::user()->phone ?? '' }}" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="+1 (555) 000-0000">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                                    <input type="text" value="Administrator" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-600"
                                           disabled>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                <textarea name="bio" rows="3" 
                                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Tell us about yourself...">{{ Auth::user()->bio ?? '' }}</textarea>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200 font-medium">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Settings -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Security Settings</h3>
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <input type="password" name="current_password" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password" name="new_password" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit" 
                                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition duration-200 font-medium">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Account Status -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Account Status</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Verification</span>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Verified</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">2FA</span>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">Disabled</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Last Login</span>
                                <span class="text-gray-800 text-sm">{{ Auth::user()->last_login_at?->format('M j, Y H:i') ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition duration-200">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-blue-600"></i>
                                </div>
                                <span class="font-medium">Two-Factor Authentication</span>
                            </a>
                            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition duration-200">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-bell text-green-600"></i>
                                </div>
                                <span class="font-medium">Notification Settings</span>
                            </a>
                            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition duration-200">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-download text-purple-600"></i>
                                </div>
                                <span class="font-medium">Export Data</span>
                            </a>
                        </div>
                    </div>

                    <!-- System Info -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">System Information</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Member Since</span>
                                <span class="text-gray-800">{{ Auth::user()->created_at->format('M j, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Account ID</span>
                                <span class="text-gray-800">#{{ Auth::user()->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Timezone</span>
                                <span class="text-gray-800">UTC</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection