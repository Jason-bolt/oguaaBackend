@extends('my_layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <div class="p-2">
                <div class="font-medium text-red-600">
                    Success
                </div>
                {{ session('success') }}
            </div>
        </div>
    @endif

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
    <!-- Data Collection -->
    <section class="p-5">
        <div class="container">
            <form action="{{ route('add_occupant') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-5">
                        <div class="card shadow">
                            <div class="p-5">
                                <img
                                    class="bd-placeholder-img card-img-top"
                                    width="100%"
                                    id="output"
                                    height="225"
                                    src="{{ asset('avat3.png') }}"
                                    alt="Profile"
                                    role=" upload your image"
                                    aria-label="Placeholder: Index"
                                    preserveAspectRatio="xMidYMid slice"
                                    focusable="false"
                                />
                            </div>
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" />

                            <div class="card-body">
                                <input
                                    type="file"
                                    accept="image/*"
                                    name="image"
                                    id="file"
                                    onchange="loadFile(event)"
                                    required
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card shadow">
                            <div class="card-header pb-0">
                                <h5>Details</h5>
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="first_name" class="form-label">First Name:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="first_name"
                                    value="{{ old("first_name") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="middle_name" class="form-label">Middle Name:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="other_name"
                                    value="{{ old("other_name") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="last_name" class="form-label">Last Name:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="last_name"
                                    value="{{ old("last_name") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="contact" class="form-label">Contact:</label>
                                <input
                                    type="tel"
                                    class="form-text form-control mt-0"
                                    name="contact"
                                    value="{{ old("contact") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="program" class="form-label">Program:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="program"
                                    value="{{ old("program") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="level" class="form-label">Level:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="level"
                                    value="{{ old("level") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="index_number" class="form-label">Index Number:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="index_number"
                                    value="{{ old("index_number") }}"
                                    required
                                />
                            </div>

                            <div class="form-group px-3 pt-3">
                                <label for="room_number" class="form-label">Room Number:</label>
                                <input
                                    type="text"
                                    class="form-text form-control mt-0"
                                    name="room_number"
                                    value="{{ old("room_number") }}"
                                    required
                                />
                            </div>

                            <div class="m-3">
                                <button
                                    class="btn text-white"
                                    style="background-color: rgb(4, 138, 26)"
                                >
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection


<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
