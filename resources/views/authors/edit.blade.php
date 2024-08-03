@extends('layouts.main')

@section('title', 'Create Author')

@section('main')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Edit Author</h6>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-0">
                        <form action="{{route('authors.update', $author->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-lable">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Bio:</label>
                                <textarea name="bio" class="form-control" required>{{ $author->bio }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Avatar:</label>
                                <img src="{{asset('images/'.$author->avatar)}}" class="avatar avatar-sm me-3" alt="{{$author->id}}">
                                <input type="file" name="avatar" value="{{ $author->avatar }}" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Birthday:</label>
                                <input type="date" name="birth_day" value="{{ $author->birth_day }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Gender:</label>
                                @if ($author->gender == 0)
                                <input type="radio" name="gender" value="{{\App\Enums\AuthorGenderEnum::male}}" class="form-control-check" checked> 
                                <span>Nam</span>
                                <input type="radio" name="gender" value="{{\App\Enums\AuthorGenderEnum::female}}" class="form-control-check"> 
                                <span>Nữ</span>
                                @elseif ($author->gender == 1)
                                <input type="radio" name="gender" value="{{\App\Enums\AuthorGenderEnum::male}}" class="form-control-check"> 
                                <span>Nam</span>
                                <input type="radio" name="gender" value="{{\App\Enums\AuthorGenderEnum::female}}" class="form-control-check" checked> 
                                <span>Nữ</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <span><a href="{{ route('authors.index') }}" class="btn btn-danger">Cancel</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection