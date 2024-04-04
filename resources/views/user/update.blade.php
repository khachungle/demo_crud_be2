<form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="username">Tên người dùng:</label>
    <input type="text" id="username" name="username" value="{{ $user->username }}" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

    <label for="phone">Số điện thoại:</label>
    <input type="text" id="phone" name="phone" value="{{ $user->phone }}"><br>

    <label for="image">Ảnh đại diện:</label>
    <input type="file" id="image" name="image"><br>

    <button type="submit">Cập nhật</button>
</form>