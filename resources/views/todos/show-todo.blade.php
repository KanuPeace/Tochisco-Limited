@extends('app.layouts')

@section('content')
<div class="max-w-2xl px-3 py-3 mx-auto mt-10 md:px-0 md:justify-between md:items-center">
    <div class="mb-7">
         <a href="{{ url('/') }}" class="mb-12 text-purple-500"><box-icon name='arrow-back' size="xs"></box-icon> back</a>
         <a href="{{ route('todo.edit',$todo->id) }}" class="float-right px-5 py-1 mt-0 text-sm font-semibold text-white bg-purple-600 rounded-full hover:bg-purple-500">Update Todo</a>
    </div>
    <div>
        <h3 class="text-lg font-semibold text-blue-500">{{ $todo->title }}</h3>
    </div>
    <div class="h-full mt-10 bg-white border-gray-500 rounded-2xl">
        <p class="py-5 text-sm text-gray-700 px-7">{{ $todo->content }}</p>
    </div>
</div>
@endsection