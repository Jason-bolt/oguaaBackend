@extends('my_layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <div class="p-2">
                <div class="font-medium text-red-600">
                    Whoops! Something went wrong.
                </div>

                <ul class="mt-3 text-sm text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- System Users -->
    <section class="px-sm-5 py-sm-5 mb-5">
        <div class="container">
            <h2 class="mb-4">System Users</h2>
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>
                            <a href="user/delete/{{ $user->id }}" class="btn btn-danger rounded-pill" onclick="return confirm('User {{ $user->username }} will be deleted!')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        No User added
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Add User -->
    <section class="p-sm-5">
        <div class="container">
            <button
                class="btn text-white mb-2"
                style="background-color: rgb(4, 138, 26)"
                data-bs-toggle="collapse"
                data-bs-target="#addUser"
            >
                Add new user <i class="bi bi-plus"></i>
            </button>
        </div>

        <div class="collapse py-4" id="addUser">
            <div class="container col-6 text-start">
                <h3>Add User</h3>
                <form action="{{ route('create_user') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input
                            class="form-control"
                            type="text"
                            name="username"
                            id="username"
                            value="{{ old('username') }}"
                        />
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input
                            class="form-control"
                            type="password"
                            name="password"
                            id="password"
                        />
                    </div>

                    <button
                        type="submit"
                        class="btn text-white mt-2 px-5"
                        style="background-color: rgb(4, 138, 26)"
                    >
                        Save
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
