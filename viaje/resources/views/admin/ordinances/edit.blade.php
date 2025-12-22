<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.ordinances.index')">
            Ordenanzas
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.ordinances.update', $ordinance) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <flux:input name="name"
                            value="{{old('name', $ordinance->name)}}"
                            label="Nombre"  
                            placeholder="Ingrese el nombre de la ordenanza"/>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
            </div>
        </form>

    </div>

</x-layouts.app>
