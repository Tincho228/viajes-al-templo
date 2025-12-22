<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.ordinances.index')">
            Ordenanzas
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.ordinances.store') }}" method="post">
            @csrf
            <div>
                <flux:input name="name"
                            value="{{old('name')}}"
                            label="Nombre" 
                            description="Estos datos pueden editarse" 
                            placeholder="Ingrese el nombre de la ordenanza"/>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
            </div>
        </form>

    </div>

</x-layouts.app>
