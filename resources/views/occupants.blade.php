@extends('my_layouts.app')

@section('content')
    <!-- Search Bar -->
    <section class="px-sm-4 p-3">
        <div class="container text-center">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="row g-2 mt-2">
                    <div class="col-9 m-auto">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                name="search_query"
                                placeholder="Search by room number, index number or last name"
                            />
                            <button
                                type="submit"
                                class="btn text-white"
                                style="background-color: rgb(4, 138, 26)"
                            >
                                <i class="bi bi-search"> Search</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Occupants -->
    <section class="px-sm-5 py-sm-3 mb-5">
        <div class="container">
            <!-- Number of Occupants -->
            @if(!isset($search))
                <p class="lead fs-3 py-2">Number of occupants: {{ $occupant_count }}</p>
            @else
                <p class="lead fs-3 py-2">Search result</p>
            @endif
            <!-- Loop -->
            <div class="row g-4">
                @forelse($occupants as $occupant)
                    <div class="col-sm-6 col-md-3">
                        <div class="card rounded shadow">
                            <img
                                src="{{ asset('occupants_image/' . $occupant->image) }}"
                                alt="{{ $occupant->first_name }}"
                                class="rounded"
                                data-bs-toggle="modal"
                                data-bs-target="#pic{{ $occupant->id }}"
                                style="height: 210px"
                            />
                            <div class="card-body position-relative">
                                <p class="m-0 small"><strong>ID: </strong>{{ $occupant->index_number }}</p>
                                <p class="m-0 small">
                                    <strong>Name: </strong>{{ $occupant->first_name . ' ' . $occupant->other_name . ' ' . $occupant->last_name }}
                                </p>
                                <p class="m-0 small"><strong>Contact: </strong>{{ $occupant->contact }}</p>
                                <p class="m-0 small"><strong>Level: </strong>{{ $occupant->level }}</p>
                                <p class="m-0 small"><strong>Room: </strong>{{ $occupant->room_number }}</p>
                                <p class="m-0 small"><em>{{ $occupant->program }}</em></p>
                                <p class="m-0 small"><strong>Key status</strong></p>
                                <p class="m-0 small btn-group">
                                    <a href="/key_in/{{ $occupant->id }}/{{ $occupant->room_number }}" class="btn btn-sm {{ $occupant->key_status == true ? 'btn-outline-secondary' : 'btn-secondary' }} ">IN</a>
                                    <a href="/key_out/{{ $occupant->id }}/{{ $occupant->room_number }}" class="btn btn-sm {{ $occupant->key_status == true ? 'btn-secondary' : 'btn-outline-secondary' }}">OUT</a>
                                </p>
                                {{-- Check if super admin --}}
                                @if (\Illuminate\Support\Facades\Auth::user()->is_admin)
                                    <button class="btn rounded-circle btn-white position-absolute" style="top: 2pt; right: 5pt;" data-bs-target="#edit{{ $occupant->id }}" data-bs-toggle="modal">
                                        <i class="bi bi-pencil-fill" style="color: rgb(4, 138, 26)"></i>
                                    </button>

                                    <!-- Edit occupant Modal -->
                                    <div
                                        class="modal fade"
                                        id="edit{{ $occupant->id }}"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit occupant details</h5>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                    ></button>
                                                </div>
                                                <div class="modal-body p-1">
                                                    <form action="occupant/edit/{{ $occupant->id }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row g-4">
                                                            <div class="col-md-5">
                                                                <div class="card shadow">
                                                                    <div class="p-5">
                                                                        <img
                                                                            class="bd-placeholder-img card-img-top"
                                                                            width="100%"
                                                                            id="output"
                                                                            height="225"
                                                                            src="{{ asset('occupants_image/' . $occupant->image) }}"
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
                                                                            value="{{ $occupant->first_name }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="middle_name" class="form-label">Middle Name:</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-text form-control mt-0"
                                                                            name="other_name"
                                                                            value="{{ $occupant->other_name }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="last_name" class="form-label">Last Name:</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-text form-control mt-0"
                                                                            name="last_name"
                                                                            value="{{ $occupant->last_name }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="contact" class="form-label">Contact:</label>
                                                                        <input
                                                                            type="tel"
                                                                            class="form-text form-control mt-0"
                                                                            name="contact"
                                                                            value="{{ $occupant->contact }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="program" class="form-label">Program:</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-text form-control mt-0"
                                                                            name="program"
                                                                            value="{{ $occupant->program }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="level" class="form-label">Level:</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-text form-control mt-0"
                                                                            name="level"
                                                                            value="{{ $occupant->level }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="index_number" class="form-label">Index Number:</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-text form-control mt-0"
                                                                            name="index_number"
                                                                            value="{{ $occupant->index_number }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="form-group px-3 pt-3">
                                                                        <label for="room_number" class="form-label">Room Number:</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-text form-control mt-0"
                                                                            name="room_number"
                                                                            value="{{ $occupant->room_number }}"
                                                                            required
                                                                        />
                                                                    </div>

                                                                    <div class="m-3">
                                                                        <button
                                                                            class="btn text-white"
                                                                            style="background-color: rgb(4, 138, 26)"
                                                                        >
                                                                            Save changes <i class="bi bi-save"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($occupant->hasKey)
                                    <div
                                        class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                                    >
                                        <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                        </i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Pic Modal -->
                    <div
                        class="modal fade"
                        id="pic{{ $occupant->id }}"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $occupant->first_name . ' ' . $occupant->other_name . ' ' . $occupant->last_name }}</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body p-1 text-center">
                                    <img src="{{ asset('occupants_image/' . $occupant->image) }}" class="img-fluid" alt="Image" />
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    @if(!isset($search))
                        <p class="display-1 py-5">
                            No Occupant Added
                        </p>
                    @else
                        <p class="display-3 py-5">
                            No occupant for the search query
                        </p>
                    @endif
                @endforelse

            </div>
        </div>
    </section>


@endsection

<script>
    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
