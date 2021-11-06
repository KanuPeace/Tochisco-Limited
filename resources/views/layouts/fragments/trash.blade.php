@extends('app.layouts')
@section('content')
    <div class="max-w-2xl px-3 py-3 mx-auto md:px-0 md:justify-between md:items-center">
    {{-- message includes --}}
      @include('app.message')
        <div class="flex flex-col items-center justify-center mt-12 mb-9">
            @forelse ($todos as $todo)
                <div class="flex justify-between w-full p-6 mx-auto mt-5 bg-white rounded-lg shadow-md ">
                    <div class="items-center md:mr-3">
                        <p class="text-sm">{{ $todo->title }}</p>
                        <p class="text-xs">{{ Illuminate\Support\Str::limit($todo->content, 25) }}</p>
                    </div>
                    <div class="items-center inline-block mt-3 ml-1">
                        <a href="{{ route('todo.show',$todo->id) }}" class="inline-block px-2 font-bold text-center text-white bg-blue-500 rounded-md sm:px-1 sm:py-1 md:px-1 hover:bg-blue-400"><i class='bx bx-subdirectory-right bx-xs'></i></a> 
                        <a href="{{ route('complete-todo',$todo->id) }}" class="inline-block px-2 font-bold text-center text-white bg-green-500 rounded-md hover:bg-green-400"><i class='bx bx-chevron-down-square bx-xs'></i></a>
                        <a href="javascript:;" role="button" data-toggle="modal" data-target="#exampleModalTwo-{{ $todo->id }}" class="inline-block px-2 font-bold text-white bg-red-500 rounded-md hover:bg-red-400 text-cente"><i class='bx bx-trash bx-xs'></i></a>
                    </div>
                </div>
                {{-- modal --}}
                <div class="fixed inset-0 z-10 hidden overflow-y-auto md:mt-32 sm:mt-0" aria-labelledby="modal-title"
                    id="exampleModalTwo-{{ $todo->id }}" tabindex="-1" role="dialog">
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
                        role="document">
                        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-10" aria-hidden="true"></div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                <div class="items-start sm:flex sm:items-start">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: outline/exclamation -->
                                        <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 sm:text-left sm:mt-0 sm:ml-4">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                            Delete Todo
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-left text-gray-500">
                                                Are you sure you want to delete this todo.
                                                This action cannot be undone
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-dismiss="modal"
                                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        onclick="toggleModal('modal-id')">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-lg font-semibold text-purple-900">No Todo Yet <box-icon name='sad' color='red' size='xs'></box-icon></p>
            @endforelse
        </div>
        {{ $todos->links() }}
    </div>


<script type="text/javascript">
    $("#exampleModal").on('show.bs.modal', function(event) {
                console.log('texxxt')
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
    }
</script>
<script>
    function closeAlert(event){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
</script>
@endsection
