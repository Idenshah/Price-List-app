@if (session('success'))
<div class="mb-4 px-4 py-2 bg-green-300 text-white border-white rounded">
    {{$slot }}
</div>
@endif