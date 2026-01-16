<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Asientos
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <a href="{{ route('admin.seats.create') }}" class="text-white bg-blue-700 text-xs p-2">
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
                        Numero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pasajero/Nullable
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Viaje
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seats as $seat)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $seat->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $seat->number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $seat->is_available ? 'Disponible' : $seat->passenger->firstname. ' ' .$seat->passenger->lastname}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $seat->trip->ward->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $seat->trip->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.seats.edit', $seat) }}" class="text-white bg-blue-700 text-xs p-2">
                                Editar
                                </a>
                                <form class="delete-form" action="{{route('admin.seats.destroy', $seat)}}" method="POST">
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
                <!-- Esto genera los botones de la paginación -->
                
            </tbody>
        </table>
        <div class="mt-4">
            {{ $seats->links() }}
        </div>
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
