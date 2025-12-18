<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Cart;

class ProfileController extends Controller
{
    /**
     * Display the user's profile dashboard.
     */
    public function show(Request $request): View
    {
        $user = $request->user();
        
        // Dynamic data fetch karo
        $ordersCount = Order::where('user_id', $user->id)->count();
        $pendingOrders = Order::where('user_id', $user->id)->where('status', 'pending')->count();
        $completedOrders = Order::where('user_id', $user->id)->where('status', 'completed')->count();
        
        $cartItemsCount = Cart::where('user_id', $user->id)->count();
        $wishlistItemsCount = Wishlist::where('user_id', $user->id)->count();
        
        $recentOrders = Order::where('user_id', $user->id)
                           ->latest()
                           ->take(5)
                           ->get();

        return view('profile.show', compact(
            'user', 
            'ordersCount',
            'pendingOrders',
            'completedOrders',
            'cartItemsCount',
            'wishlistItemsCount',
            'recentOrders'
        ));
    }

    /**
     * Display the user's orders.
     */
    public function orders(Request $request): View
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)
                      ->latest()
                      ->paginate(10);

        return view('profile.orders', compact('user', 'orders'));
    }

    /**
     * Display the user's wishlist.
     */
    public function wishlist(Request $request): View
    {
        $user = $request->user();
        $wishlistItems = Wishlist::where('user_id', $user->id)
                                ->with('product')
                                ->latest()
                                ->get();

        return view('profile.wishlist', compact('user', 'wishlistItems'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    // Add this method to your existing ProfileController
public function cart(Request $request): View
{
    $user = $request->user();
    $cartItems = Cart::where('user_id', $user->id)
                    ->with('product')
                    ->get();

    return view('profile.cart', compact('user', 'cartItems'));
}
}