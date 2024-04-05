<form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <style>
       
         table {
            width: 100%;
            
            border-collapse: collapse;
            
            margin-top: 10px;
          
        }

        th,
        td {
            border: 1px solid #dddddd;
            
            text-align: left;
         
            padding: 8px;
       
        }
          
       

      
        #form-update {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #form-update label {
            display: block;
            margin-bottom: 8px;
        }

        #form-update input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #form-update input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        #form-update input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
     <form id="form-update" action="" method="get">
<table>
    <tr>
        <th> <label for="username">Tên người dùng:</label></th>
        <th>  <input type="text" id="username" name="username" value="{{ $user->username }}" required><br></th>
    </tr>
    <tr>
        <th> <label for="email">Email:</label></th>
        <th>  <input type="email" id="email" name="email" value="{{ $user->email }}" required><br></th>
    </tr>
    <tr>
        <th> <label for="phone">Số điện thoại:</label></th>
        <th> <input type="text" id="phone" name="phone" value="{{ $user->phone }}"><br></th>
    </tr>
    <tr>
        <th>  <label for="image">Ảnh đại diện:</label></th>
        <th> <input type="file" id="image" name="image"><br></th>
    </tr>
   
</table>
<br>
<button type="submit">Cập nhật</button>
</form>
   
  

   
  

   
   

  
   

    
</form>