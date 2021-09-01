{{-- deleted message --}}
@if(session()->has('deleted'))
<div class="relative px-4 py-4 mb-4 text-white bg-red-500 border-0 rounded">
<span class="inline-block mr-5 text-xl align-middle">
<i class="fas fa-bell"></i>
</span>
<span class="inline-block mr-8 align-middle">
  {{ Session()->get('deleted') }}
</span>
<button class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="closeAlert(event)">
<span>×</span>
</button>
</div>
@endif
{{-- created message --}}
@if(session()->has('created'))
<div class="relative px-4 py-4 mb-4 text-white bg-green-500 border-0 rounded">
<span class="inline-block mr-5 text-xl align-middle">
  <i class="fas fa-bell"></i>
</span>
<span class="inline-block mr-8 align-middle">
  {{ Session()->get('created') }}
</span>
<button class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="closeAlert(event)">
  <span>×</span>
</button>
</div>
@endif
{{-- updated message --}}
@if(session()->has('updated'))
<div class="relative px-4 py-4 mb-4 text-white bg-green-500 border-0 rounded">
<span class="inline-block mr-5 text-xl align-middle">
  <i class="fas fa-bell"></i>
</span>
<span class="inline-block mr-8 align-middle">
  {{ Session()->get('updated') }}
</span>
<button class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="closeAlert(event)">
  <span>×</span>
</button>
</div>
@endif
{{-- complete message --}}
@if(session()->has('completed'))
<div class="relative px-4 py-4 mb-4 text-white bg-green-500 border-0 rounded">
<span class="inline-block mr-5 text-xl align-middle">
  <i class="fas fa-bell"></i>
</span>
<span class="inline-block mr-8 align-middle">
  {{ Session()->get('completed') }}
</span>
<button class="absolute top-0 right-0 mt-4 mr-6 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none" onclick="closeAlert(event)">
  <span>×</span>
</button>
</div>
@endif