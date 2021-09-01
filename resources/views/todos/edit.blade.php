@extends('app.layouts')

@section('content')
<div class="max-w-2xl px-3 py-3 mx-auto mt-10 md:px-0 md:justify-between md:items-center">
    <div class="mb-7">
         <a href="{{ route('todo.show',$todo->id) }}" class="mb-12 text-purple-500"><box-icon name='arrow-back' size="xs"></box-icon> back</a>
    </div>
    <div class="flex flex-col items-center justify-center mt-3">
        <h3 class="mb-5 text-lg font-bold text-purple-800">Update Todo</h3>
        <form action="{{ route('todo.update',$todo->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="text-gray-700">Title</label>
                <input type="text" id="name" name="title" value="{{ $todo->title }}"
                    class="form-input  @error('title') is-invalid @enderror px-2 mt-1 block w-full rounded-md bg-gray-100 border-purple-400 focus:border-purple-500 focus:bg-white focus:ring-0">
                @error('title')
                    <div class="mt-3 text-xs text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-7">
                <label for="content" class="text-gray-700">Description</label>
                <textarea name="content" id="content"
                    class="mt-1 block w-full rounded-md @error('content') is-invalid @enderror bg-gray-100 border-purple-400 focus:border-purple-500 focus:bg-white focus:ring-0"
                    cols="30" rows="3">{{ $todo->content }}</textarea>
                @error('content')
                    <div class="mt-3 text-xs text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-7">
                <button type="submit" class="w-full px-5 py-2 text-lg font-semibold text-white bg-purple-600 rounded-md hover:bg-purple-700 md:w-96 items-right focus:outline-none focus:border-none focus:ring-1">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection
