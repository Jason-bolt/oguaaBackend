@extends('my_layouts.app')

@section('content')
    <!-- System Users -->
    <section class="px-sm-5 py-sm-5 mb-5">
        <div class="container">
            <h2 class="mb-4">System Users</h2>
            <table class="table table-stripped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>Username</td>
                    <td>
                        <button
                            class="btn btn-danger rounded-pill"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteUser"
                        >
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>

            <!-- Modal -->
            <div
                class="modal fade"
                id="deleteUser"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body text-center">
                            <p class="lead">Delete User?</p>
                            <form action="{{ route('delete_user') }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">
                                    Delete <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                <form action="#">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input
                            class="form-control"
                            type="text"
                            name="username"
                            id="username"
                        />
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input
                            class="form-control"
                            type="text"
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
