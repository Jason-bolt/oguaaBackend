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
                                alt="image"
                                class="rounded"
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
