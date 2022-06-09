@extends('layouts.app')
@section('title', 'Posts')
@section('content')
<div class="container">
    @if(session('message'))
    <div class="alert alert-danger">
        {{session('message')}}
    </div>
    @endif
    <a href="{{route('admin.posts.create')}}" class="btn btn-outline-info my-3">Crea nuovo post +</a>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Slug</th>
                <th scope="col">Event</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{ $post->title}}</td>
                <td>{{ $post->content}}</td>
                <th><img src="{{ $post->image}}" alt="post->image" width="50" ;></th>
                <td>{{ $post->slug}}</td>
                <td><a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning">Modifica</a></td>
                <td>
                    @include('includes.deletePost')
                    {{-- <a href=" {{ route('admin.posts.edit', $post->id) }} " class="btn btn-danger">Edit</a> --}}
                </td>
            </tr>
            @empty
            <h2>Non ci sono post</h2>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
@section('scripts')
<script src="{{ asset('js/delete-form.js') }}"></script>
@endsection
