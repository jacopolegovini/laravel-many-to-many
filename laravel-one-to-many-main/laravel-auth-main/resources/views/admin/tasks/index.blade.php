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
                    <a href="{{ route("admin.tasks.create") }}" class="btn btn-primary btn-lg">
                        Create new task
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
                            <th scope="col">Priority</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $tasks as $index => $task )
                        <tr>
                            <td>
                                <form action="" class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check" id="btncheck{{$task->id}}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btncheck{{$task->id}}">Done</label>
                                </form>
                            </td>
                            <td>
                                {{ $task->id }}
                            </td>
                            <td>
                                {{ $task->title }}
                            </td>
                            <td>
                                {{ $task->author }}
                            </td>
                            <td>
                                {{ $task->date }}
                            </td>
                            <td>
                                {{ $task->priority }}
                            </td>
                            <td>
                                {{ $task->description }}
                            </td>
                            <td>
                                <a href="/admin/tasks/{{ $index + 1 }}" class="btn btn-sm btn-primary me-2">Show</a>
                                <a href="{{ route("admin.tasks.edit", $task->id) }}"  class="btn btn-sm btn-success me-2">Edit</a>

                                <form class="d-inline env-destroyer" action="{{ route("admin.tasks.delete", $task->id) }}" method="POST" custom-data-name="{{ $task->name }}" >
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
                            <td colspan="6">No task are available at the moment, you are free to go!</td>
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
