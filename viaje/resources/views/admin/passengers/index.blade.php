<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Pasajeros
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    

    <a href="{{ route('admin.trips.passengers.create', 11) }}" class="text-white bg-blue-700 text-xs p-2">
        Nuevo
    </a>

    @livewire('admin.show-passengers')

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
