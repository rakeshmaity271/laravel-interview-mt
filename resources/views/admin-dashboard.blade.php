@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('Admin Dashboard') }}</div>
            <div class="card">
              <div class="card-header">
                <h3>Categories</h3>
                @include('includes.alerts.success')
              </div>
              <div class="card-body">
                <ul class="list-group">
                  @foreach ($categories as $category)
                    <li class="list-group-item">
                      <div class="d-flex justify-content-between">
                        {{ $category->name }}
                        <a href="{{route('edit-category', ['id' => $category->id])}}">Edit</a>
                        <a href="{{route('delete-category', ['id' => $category->id])}}">Delete</a>
                      </div>
                      @if ($category->children)
                        <ul class="list-group mt-2">
                          @foreach ($category->children as $child)
                            <li class="list-group-item">
                              <div class="d-flex justify-content-between">
                                {{ $child->name }}
                                <a href="{{route('edit-category', ['id' => $child->id])}}">Edit</a>
                                <a href="{{route('delete-category', ['id' => $child->id])}}">Delete</a>


                              </div>
                            </li>
                          @endforeach
                        </ul>
                      @endif
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

    </div>
</div>
@endsection
