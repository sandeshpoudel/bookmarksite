@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @include('inc.message')
                   <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal" type="button" name="button">Add a Bookmark</button>
                   <!-- Show my bookmarks -->
<hr>
<h3>My Bookmarks</h3>
@if (count($bookmarks)>0)
<ul class="list-group">
@foreach ($bookmarks as $bookmark )
    <li class="list-group-item clearfix">
        <a href="{{$bookmark->url}}" target="_blank" style="position:absolute; top:30%">{{$bookmark->name}}</a>
        <span class="pull-right button-group">
            <button type="button" class="btn btn-success btn-xs" name="button">Edit</button>
            <button data-id="{{$bookmark->id}}" type="button" class="delete-bookmark btn btn-danger btn-xs" name="button"><span class="glyphicon glyphicon-remove"> </span>Delete</button>
        </span>
        
    </li>    
@endforeach
</ul>

@endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Starts here -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Bookmark</h4>
      </div>
      <div class="modal-body">
       <form action="{{route('bookmarks.store')}}" method="post">
       {{ @csrf_field() }}
        <div class="form-group">
            <label for="name">Bookmark Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="url">Bookmark url</label>
            <input type="text" class="form-control" name="url">
        </div>
        <div class="form-group">
            <label for="description">Web Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Make a bookmark</button>

       </form>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
