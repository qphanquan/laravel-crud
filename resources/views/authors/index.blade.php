@extends('layouts.main')

@section('main')
<!-- <h2>Home</h2>
<a href="{{ route('authors.create') }}" class="btn btn-danger">Add New Author</a>
@if(session('success'))
    <span>{{session('success')}}</span>
@elseif(session('error'))
    <span>{{session('error')}}</span>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $author)
        <tr>
            <th scope="row">{{ $author->id }}</th>
            <td>
                <img class="img-fuild" width="100" height="100" src="{{asset('images/'.$author->avatar)}}" alt="">
            </td>
            <td><a href="{{ route('authors.show', $author->id) }}">{{ $author->name }}</a></td>
            <td>
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $author->id }}">
                    <i class="bi bi-trash3"></i>
                </button>

                <div class="modal fade" id="exampleModal-{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Author your sure you want to delete this {{ $author->id }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row">{{ $authors->links('components.pagination') }}</div> -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Authors table</h6>
                    <span><a href="{{ route('authors.create') }}" class="btn btn-danger">Add New Author</a></span>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bio</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BirthDay</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($authors as $author)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{asset('images/'.$author->avatar)}}" class="avatar avatar-sm me-3" alt="{{$author->id}}">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="{{ route('authors.show', $author->id) }}">
                                                    <h6 class="mb-0 text-sm">{{$author->name}}</h6>
                                                </a>
                                                <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$author->bio}}</p>
                                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($author->gender == 0)
                                        <span class="badge badge-sm bg-gradient-success">
                                            Nam
                                        </span>
                                        @elseif($author->gender == 1)
                                        <span class="badge badge-sm bg-gradient-success">
                                            Nữ
                                        </span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$author->birth_day}}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $author->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>

                                        <div class="modal fade" id="exampleModal-{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Author your sure you want to delete this {{ $author->id }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row p-3">{{ $authors->links('components.pagination') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection