@extends('layouts.main')

@section('title', 'Trang Chu')

@section('main')
<h2>Home</h2>
<!-- <a href="/authors/create" class="btn btn-danger">New Author</a> -->
<a href="{{ route('books.create') }}" class="btn btn-danger">Add New Author</a>
@if(session('success'))
    <span>{{session('success')}}</span>
@elseif(session('error'))
    <span>{{session('error')}}</span>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td><a href="{{ route('book.show', $book->id) }}">{{ $book->name }}</a></td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $book->id }}">
                    <i class="bi bi-trash3"></i>
                </button>

                <div class="modal fade" id="exampleModal-{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Book your sure you want to delete this {{ $book->id }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
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

<div class="row">{{ $books->links('components.pagination') }}</div>
@endsection