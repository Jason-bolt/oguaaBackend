@extends('my_layouts.app')

@section('content')
    <!-- Search Bar -->
    <section class="px-sm-4 p-3">
        <div class="container text-center">
            <form action="#">
                <div class="row g-2 mt-2">
                    <div class="col-9 m-auto">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
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
            <p class="lead fs-3 py-2">Number of occupants: 500</p>
            <!-- Loop -->
            <div class="row g-4">
                <div class="col-sm-6 col-md-3">
                    <div class="card rounded shadow">
                        <img
                            src="{{ asset('pic.jpg') }}"
                            alt="image"
                            class="rounded"
                            style="height: 210px"
                            data-bs-target="#pic"
                            data-bs-toggle="modal"
                        />
                        <div class="card-body position-relative">
                            <p class="m-0 small"><strong>ID: </strong>AA/AAA/00/0000</p>
                            <p class="m-0 small">
                                <strong>Name: </strong>Emmanuel Emmanuel Abraham
                            </p>
                            <p class="m-0 small"><strong>Contact: </strong>0123456789</p>
                            <p class="m-0 small"><strong>Level: </strong>100</p>
                            <p class="m-0 small"><strong>Room: </strong>B13</p>
                            <p class="m-0 small"><em>BSC. COMPUTER SCIENCE</em></p>
                            <p class="m-0 small"><strong>Key status</strong></p>
                            <p class="m-0 small btn-group">
                                <a href="#" class="btn btn-sm btn-secondary">IN</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">OUT</a>
                            </p>
                            <div
                                class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                            >
                                <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card rounded shadow">
                        <img
                            src="{{ asset('me.jpg') }}"
                            alt="image"
                            class="rounded"
                            style="height: 210px"
                        />
                        <div class="card-body position-relative">
                            <p class="m-0 small"><strong>ID: </strong>AA/AAA/00/0000</p>
                            <p class="m-0 small">
                                <strong>Name: </strong>Emmanuel Emmanuel Abraham
                            </p>
                            <p class="m-0 small"><strong>Contact: </strong>0123456789</p>
                            <p class="m-0 small"><strong>Level: </strong>100</p>
                            <p class="m-0 small"><strong>Room: </strong>B13</p>
                            <p class="m-0 small"><em>BSC. COMPUTER SCIENCE</em></p>
                            <p class="m-0 small"><strong>Key status</strong></p>
                            <p class="m-0 small btn-group">
                                <a href="#" class="btn btn-sm btn-secondary">IN</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">OUT</a>
                            </p>
                            <div
                                class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                            >
                                <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card rounded shadow">
                        <img
                            src="{{ asset('pic.jpg') }}"
                            alt="image"
                            class="rounded"
                            style="height: 210px"
                            data-bs-target="#pic"
                            data-bs-toggle="modal"
                        />
                        <div class="card-body position-relative">
                            <p class="m-0 small"><strong>ID: </strong>AA/AAA/00/0000</p>
                            <p class="m-0 small">
                                <strong>Name: </strong>Emmanuel Emmanuel Abraham
                            </p>
                            <p class="m-0 small"><strong>Contact: </strong>0123456789</p>
                            <p class="m-0 small"><strong>Level: </strong>100</p>
                            <p class="m-0 small"><strong>Room: </strong>B13</p>
                            <p class="m-0 small"><em>BSC. COMPUTER SCIENCE</em></p>
                            <p class="m-0 small"><strong>Key status</strong></p>
                            <p class="m-0 small btn-group">
                                <a href="#" class="btn btn-sm btn-secondary">IN</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">OUT</a>
                            </p>
                            <div
                                class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                            >
                                <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card rounded shadow">
                        <img
                            src="{{ asset('me.jpg') }}"
                            alt="image"
                            class="rounded"
                            style="height: 210px"
                        />
                        <div class="card-body position-relative">
                            <p class="m-0 small"><strong>ID: </strong>AA/AAA/00/0000</p>
                            <p class="m-0 small">
                                <strong>Name: </strong>Emmanuel Emmanuel Abraham
                            </p>
                            <p class="m-0 small"><strong>Contact: </strong>0123456789</p>
                            <p class="m-0 small"><strong>Level: </strong>100</p>
                            <p class="m-0 small"><strong>Room: </strong>B13</p>
                            <p class="m-0 small"><em>BSC. COMPUTER SCIENCE</em></p>
                            <p class="m-0 small"><strong>Key status</strong></p>
                            <p class="m-0 small btn-group">
                                <a href="#" class="btn btn-sm btn-secondary">IN</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">OUT</a>
                            </p>
                            <div
                                class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                            >
                                <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card rounded shadow">
                        <img
                            src="{{ asset('pic.jpg') }}"
                            alt="image"
                            class="rounded"
                            style="height: 210px"
                            data-bs-target="#pic"
                            data-bs-toggle="modal"
                        />
                        <div class="card-body position-relative">
                            <p class="m-0 small"><strong>ID: </strong>AA/AAA/00/0000</p>
                            <p class="m-0 small">
                                <strong>Name: </strong>Emmanuel Emmanuel Abraham
                            </p>
                            <p class="m-0 small"><strong>Contact: </strong>0123456789</p>
                            <p class="m-0 small"><strong>Level: </strong>100</p>
                            <p class="m-0 small"><strong>Room: </strong>B13</p>
                            <p class="m-0 small"><em>BSC. COMPUTER SCIENCE</em></p>
                            <p class="m-0 small"><strong>Key status</strong></p>
                            <p class="m-0 small btn-group">
                                <a href="#" class="btn btn-sm btn-secondary">IN</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">OUT</a>
                            </p>
                            <div
                                class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                            >
                                <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card rounded shadow">
                        <img
                            src="{{ asset('me.jpg') }}"
                            alt="image"
                            class="rounded"
                            style="height: 210px"
                        />
                        <div class="card-body position-relative">
                            <p class="m-0 small"><strong>ID: </strong>AA/AAA/00/0000</p>
                            <p class="m-0 small">
                                <strong>Name: </strong>Emmanuel Emmanuel Abraham
                            </p>
                            <p class="m-0 small"><strong>Contact: </strong>0123456789</p>
                            <p class="m-0 small"><strong>Level: </strong>100</p>
                            <p class="m-0 small"><strong>Room: </strong>B13</p>
                            <p class="m-0 small"><em>BSC. COMPUTER SCIENCE</em></p>
                            <p class="m-0 small"><strong>Key status</strong></p>
                            <p class="m-0 small btn-group">
                                <a href="#" class="btn btn-sm btn-secondary">IN</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">OUT</a>
                            </p>
                            <div
                                class="justify-content-center position-absolute bottom-0 end-0 fs-2"
                            >
                                <i class="bi bi-key-fill pe-3" style="color: rgb(4, 138, 26)">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div
        class="modal fade"
        id="pic"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Person's Name</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body p-1">
                    <img src="{{ asset('pic.jpg') }}" class="img-fluid" alt="Image" />
                </div>
            </div>
        </div>
    </div>
@endsection
