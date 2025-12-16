<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.stakes.index')">
            Estacas
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.stakes.update', $stake) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <flux:input name="name"
                            value="{{old('name', $stake->name)}}"
                            label="Nombre" 
                            description="Estos datos pueden editarse" 
                            placeholder="Ingrese el nombre de la estaca"/>

                <flux:input name="address"
                            value="{{old('address', $stake->address)}}"
                            label="Direccion" 
                            description="Estos datos pueden editarse" 
                            placeholder="Ingrese la direccion de la estaca" />

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
            </div>
        </form>

    </div>

</x-layouts.app>
