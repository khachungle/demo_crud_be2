<form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <style>
        .form-update {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
        }
    </style>
    <div class="form-update">
        <h2>Update</h2>
        <form id="form-update" action="" method="get">
    
    
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" required><br>
    
    
            <label for="email">Email:</label></th>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>
    
    
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" value="{{ $user->phone }}"><br>
    
            <label for="interest">Sở thích:</label>
            <input type="text" id="interest" name="interest" value="{{ $user->interest }}"><br>
    
            <label for="image">Ảnh đại diện:</label>
            <input type="file" id="image" name="image"><br>
    
            <input type="submit" value="Cập Nhật">
    
            <br>
    
        </form>
    </div>
   














