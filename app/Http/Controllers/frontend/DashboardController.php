<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalVisit = Visitor::count();
        $user = User::count();
        $title = 'Dashboard';
        $home = 'active';
        $all = Menu::latest()->take(8)->get();
        $food = Menu::where('category', 'makanan')->take(8)->get();
        $cosmetic = Menu::where('category', 'kosmetik')->take(8)->get();
        $clothes = Menu::where('category', 'pakaian')->take(8)->get();
        return view('frontend.index', compact('home','food', 'clothes', 'title', 'user', 'totalVisit', 'all', 'cosmetic'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function about()
    {
        $post = Post::latest('updated_at')->where('status', 'accept')->get();
        $title = 'About';
        $about = 'active';
        return view('frontend.about', compact('about', 'title', 'post'));
    }

    public function menu()
    {
        $title = 'Shop';
        $all = Menu::latest()->take(8)->get();
        $food = Menu::where('category', 'makanan')->take(8)->get();
        $cosmetic = Menu::where('category', 'kosmetik')->take(8)->get();
        $clothes = Menu::where('category', 'pakaian')->take(8)->get();
        $menu = 'active';
        return view('frontend.menu', compact('food', 'clothes', 'title', 'all', 'cosmetic', 'menu'));
    }

    public function detail($id)
    {
        $title = 'Detail';
        $detailId = Crypt::decrypt($id);
        $detail = Menu::find($detailId);
        return view('frontend.detail', compact('detail', 'title'));
    }

    public function history()
    {
        $title = 'History';
        $id = Auth::user()->id;
        $order = Order::withTrashed()->where('user_id', $id)->paginate(10);
        return view('frontend.history', compact('order', 'title'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $title = 'Pencarian';
        $all = Menu::latest()->where('title', 'LIKE', "%{$search}%")->get();
        $food = Menu::where('title', 'LIKE', "%{$search}%")->where('category', 'makanan')->get();
        $cosmetic = Menu::where('title', 'LIKE', "%{$search}%")->where('category', 'kosmetik')->get();
        $clothes = Menu::where('title', 'LIKE', "%{$search}%")->where('category', 'pakaian')->get();
        $menu = 'active';
        return view('frontend.menu', compact('food', 'clothes', 'all', 'cosmetic', 'menu', 'title'));
    }
    
    public function order()
    {
        $title = 'Order';
        $id = Auth::user()->id;
        $order = Order::withTrashed()->where('status', '!=', 'dibatalkan')->where('user_id', $id)->paginate(10);
        return view('frontend.order', compact('order', 'title'));
    }

    public function postSearch(Request $request)
    {
        $search = $request->search;
        $post = Post::where('status', 'accept')->where('description', 'LIKE', "%{$search}%")->get();
        $title = 'About';
        $about = 'active';
        return view('frontend.about', compact('about', 'title', 'post'));
    }
}