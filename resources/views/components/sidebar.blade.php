<div class="flex flex-col h-screen w-64 pt-5 bg-black text-white fixed">
        <a href="{{ route('homepage') }}" class="btn btn-ghost  text-lg font-bold flex justify-start"> LightGram</a>
    <div class="border-b border-gray-700"></div>
    <nav class="mt-4 flex flex-col flex-1">
        <a href="{{ route('homepage') }}" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('profile') }}" class="block py-2 px-4 hover:bg-gray-700">Profile</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="block  py-2 px-4 hover:bg-gray-700 w-full text-left">Logout</button>
        </form>
    </nav>
</div>