@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Posts</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Restore</th>

                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{$post->image}}" width="50px" height="50px" alt="{{$post->title}}"></td>
                        <td>{{ $post->title  }}</td>
                        <td>{{ $post->content  }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-info"> Edit </a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-xs btn-danger">Trash</button>
                            </form>


                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $posts->links() }}
        </div>
    </div>

@endsection
