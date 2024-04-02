<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.list', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // validate dữ liệu trước khi thực hiện thêm user
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required|unique:users,phone|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120'
        ]);

        // Tạo user mới và lưu user
        $user = new User();

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password');

        // Lưu ảnh vào thư mục public/images
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = null;
        }
        $user->image = $imagePath; // Gán đường dẫn của ảnh

        // luu vao database
        $user->save();

        // Chuyen den trang chu
        return redirect('/')->with('success', 'Đăng ký user thành công !');
    }

       public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

        public function update(Request $request, string $id)
    {
        //
    }

       public function destroy(string $id)
    {
        //
    }
}
