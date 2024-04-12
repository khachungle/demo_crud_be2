<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Lấy danh sách người dùng với phân trang
        //$users = User::paginate(3); // Số người dùng trên mỗi trang là 3
        // Trả về view 'user.list' và truyền biến $users vào view
        //return view('user.list', compact('users'));

        if(Auth::check()){
            $users = User::paginate(3); // Số người dùng trên mỗi trang là 3
            // Trả về view 'user.list' và truyền biến $users vào view
            return view('user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
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


       if(Auth::check()){
                //
                $user = User::find($id);
                if(!$user){
                    return response()->json(['message' => 'Người dùng không tồn tại'], 404);
                }
               return view('user.viewuser',['user' => $user]);
    }

    return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit(string $id)
    {

        if(Auth::check()){
            $user = User::findOrFail($id);
            return view('user.update', compact('user'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function update(Request $request, string $id)
    {
   
        if(Auth::check()){
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                'phone' => 'nullable|string|max:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra hình ảnh có được tải lên không
            ]);
    
            $user = User::findOrFail($id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
    
            // Xử lý tải ảnh lên
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $fileName);
                $user->image = $fileName;
            }
    
            $user->save();
    
            return redirect('/')->with('success', 'Cập nhật thông tin thành công !');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function destroy(string $id)
    {

        if(Auth::check()){
            $user = User::find($id);
            if(!$user){
                return response()->json(['message' => 'Người dùng không tồn tại'], 404);
            }
            $user->delete();
            return redirect('/')->with('success', 'Xóa thành công !');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * trang dang nhap
     */
    public function login()
    {
        return view('user.login');
    }

        /**
     * dang nhap
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * dang xuat
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
