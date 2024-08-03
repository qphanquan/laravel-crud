@extends('layouts.main')

@section('title', 'Create Author')

@section('main')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Create Author</h6>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-0">
                        <form action="{{route('authors.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="form-lable">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Bio:</label>
                                <textarea name="bio" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Avatar:</label>
                                <input type="file" name="avatar" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Birthday:</label>
                                <input type="date" name="birth_day" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-lable">Gender:</label>
                                <input type="radio" name="gender" value="{{\App\Enums\AuthorGenderEnum::male}}" class="form-control-check">
                                <span>Nam</span>
                                <input type="radio" name="gender" value="{{\App\Enums\AuthorGenderEnum::female}}" class="form-control-check">
                                <span>Nữ</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
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