<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.users.index')">
            Usuarios
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.users.store') }}" method="post" class="space-y-4">
            @csrf
                <flux:input name="name"
                            value="{{old('name')}}"
                            label="Nombre" 
                            description="Estos datos pueden editarse" 
                            placeholder="Ingrese el nombre de la estaca"/>

                <flux:input name="email"
                            value="{{old('email')}}"
                            label="Email" 
                            description="Estos datos pueden editarse" 
                            placeholder="Ingrese el email del usuario" />
                <flux:input name="password"
                            value="{{old('password')}}"
                            label="Password" 
                            description="Estos datos pueden editarse" 
                            placeholder="Ingrese el password del usuario" />

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
        </form>

    </div>

</x-layouts.app>
