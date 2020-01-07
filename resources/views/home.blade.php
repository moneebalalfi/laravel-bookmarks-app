@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('inc.messages')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hi">
                        Add Bookmark
                    </button>
                    <hr>
                    @if (count($bookmarks))
                        <h3>My Bookmarks:</h3>
                        <ul class="list-group">
                            @foreach ($bookmarks as $bookmark)
                                <li class="list-group-item">
                                    <a href="{{ $bookmark->url }}" target="_blank" style="position:absolute;top: 30%; font-size: 17px; color:#051046"><b>{{ $bookmark->name }}</b><span class="badge">{{ $bookmark->description }}</span></a>
                                    <span class="float-right button-group">
                                        <button data-id="{{ $bookmark->id }}" class="delete-bookmark btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-secondary text-center">
                            <h3>You Don't Have Any Bookmark Yet!</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

  
  <!-- FORM Modal -->
  <div class="modal fade" id="hi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Bookmark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('bookmarks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Bookmark Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Bookmark Url</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Website Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

