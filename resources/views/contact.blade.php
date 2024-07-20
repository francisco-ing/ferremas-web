<head><title>Contacto</title></head>
@include('header')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="p-6 bg-white rounded-xl shadow-lg lg:col-span-2 w-full max-w-lg">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
                <strong class="font-bold">¡Mensaje enviado!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700">Nombre:</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="email" class="block text-lg font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div>
                <label for="message" class="block text-lg font-medium text-gray-700">Mensaje:</label>
                <textarea id="message" name="message" required rows="5" class="mt-1 block w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>
 
@include('footer')