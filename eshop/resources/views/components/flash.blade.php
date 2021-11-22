@if(session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="bg-primary text-white py-2 px-4 text-sm">
        <p class="text-center my-auto">{{ session('success') }}</p>
    </div>
@endif
