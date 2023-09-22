@if(session()->has('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bottom-3 right-3 p-4 bg-blue-500 text-white text-sm rounded-xl"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session()->has('error'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bottom-3 right-3 p-4 bg-red-500 text-white text-sm rounded-xl"
    >
        <p>{{ session('error') }}</p>
    </div>
@endif
