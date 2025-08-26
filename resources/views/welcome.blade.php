<x-app-layout>
    <div class="min-h-screen bg-gray-300 flex items-center justify-center">
        <div class="text-center space-y-4">
            <h1 class="text-4xl font-bold text-blue-600">Welcome to the Loyalty App 🎉</h1>
            <p class="text-lg text-gray-700">Earn points with every invoice you scan.</p>
            <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Login
            </a>
        </div>
    </div>
</x-app-layout>
