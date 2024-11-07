@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-3 fw-bold text-center">
                    Task to do:
                </h1>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <a href="{{ route("admin.projects.create") }}" class="btn btn-primary btn-lg">
                        Create new project
                    </a>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Done</th>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $projects as $index => $project )
                        <tr>
                            <td>
                                <form action="" class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check" id="btncheck{{$project->id}}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btncheck{{$project->id}}">Done</label>
                                </form>
                            </td>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                {{ $project->title }}
                            </td>
                            <td>
                                {{ $project->author }}
                            </td>
                            <td>
                                {{ $project->date }}
                            </td>
                            <td>
                                {{ $project->description }}
                            </td>
                            <td>
                                <a href="/admin/projects/{{ $index + 1 }}" class="btn btn-sm btn-primary me-2">Show</a>
                                <a href="{{ route("admin.projects.edit", $project->id) }}"  class="btn btn-sm btn-success me-2">Edit</a>

                                <form class="d-inline env-destroyer" action="{{ route("admin.projects.delete", $project->id) }}" method="POST" custom-data-name="{{ $project->name }}" >
                                    @method("DELETE")
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No project are available at the moment, you are free to go!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section("additional-scripts")
    @vite("resources/js/posts/delete-confirmation.js");
@endsection
