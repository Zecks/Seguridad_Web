<!-- Ubicación: resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Contenido del Dashboard -->
                    @if(auth()->user()->role === 'admin')
                        <h1 class="text-2xl font-bold mb-4">Lista de Usuarios</h1>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">Nombre</th>
                                    <th class="py-2 px-4 border-b">Email</th>
                                    <th class="py-2 px-4 border-b">Teléfono</th>
                                    <th class="py-2 px-4 border-b">Dirección</th>
                                    <th class="py-2 px-4 border-b">Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->phone }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->address }}</td>
                                        <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Bienvenido, {{ auth()->user()->name }}!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
