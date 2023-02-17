@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}</div>
                @include('includes.alerts.success')
                <div class="card-body">
                    <form action="{{route('edit-category', ['id' => $category->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="" value="{{$category->name}}">
                          @if ($errors->has('name'))
                            <small id="emailHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parent Category</label>
                            <select class="form-control" name="parent_id">
                                <option value="">select option</option>
                                @if($categories)
                                    @foreach($categories as $cat)
                                        <option @if($category->parent_id == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                        <button type="submit" class="btn btn-primary">Edit Category</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
