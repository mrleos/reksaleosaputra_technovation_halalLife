<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Post;
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
        $title = 'Dashboard';
        $food = Menu::where('category', 'food')->paginate(10);
        $drink = Menu::where('category', 'drink')->paginate(10);
        return view('frontend.index', compact('food', 'drink', 'title'));
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
        $food = Menu::where('category', 'food')->paginate(10);
        $drink = Menu::where('category', 'drink')->paginate(10);
        $menu = 'active';
        return view('frontend.menu', compact('menu','food','drink', 'title'));
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
        $food = Menu::where('title', 'LIKE', "%{$search}%")->where('category', 'food')->paginate(10);
        $drink = Menu::where('title', 'LIKE', "%{$search}%")->where('category', 'drink')->paginate(10);
        $menu = 'active';
        return view('frontend.menu', compact('menu','food','drink'));
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