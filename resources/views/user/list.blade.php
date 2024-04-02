@extends('layout')

@section('css')
    <style>
        h2 {
            text-align: center;
        }

        .table {
            display: flex;
            justify-content: center;
        }

        table {
            width: 90%;
            border-collapse: collapse;
        }

        thead th,
        tbody td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody td img {
            max-width: 100px;
        }

        .action-btn {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .action-btn.view {
            background-color: #28a745;
        }

        .action-btn.edit {
            background-color: #ffc107;
        }

        .action-btn.delete {
            background-color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <h2>Danh sách User</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><img src="{{ asset($user->image) }}" alt="John's Image"></td>
                        <td>
                            <a href="#" class="action-btn view">View</a>
                            <a href="#" class="action-btn edit">Edit</a>
                            <a href="#" class="action-btn delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
