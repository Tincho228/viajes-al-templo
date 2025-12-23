<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Viajes
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <a href="{{ route('admin.trips.create') }}" class="text-white bg-blue-700 text-xs p-2">
        Nuevo
    </a>

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Horario de salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lugar de llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Capacidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Costo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Organizador
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Barrio
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trips as $trip)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $trip->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $trip->departure }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trip->location }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trip->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trip->capacity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trip->cost }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trip->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trip->ward->name }}
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.trips.edit', $trip) }}" class="text-white bg-blue-700 text-xs p-2">
                                Editar
                                </a>
                                <form class="delete-form" action="{{route('admin.trips.destroy', $trip)}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="text-white bg-red-700 text-xs p-2">
                                        Eliminar
                                    </button>
                                </form>
                            </div>  
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @push('js')
        <script>
            forms = document.querySelectorAll('.delete-form');
            forms.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: "Estas seguro?",
                        text: "No podras revertir los cambios!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar!",
                        cancelButtonText: "No, cancelar"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                    });
                })
                
            });
        </script>
    @endpush

</x-layouts.app>
