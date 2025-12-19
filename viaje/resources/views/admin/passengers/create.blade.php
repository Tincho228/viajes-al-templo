<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.passengers.index')">
            Pasajeros
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.passengers.store') }}" method="post" class=" space-y-4">
            @csrf
                <flux:input name="firstname"
                            value="{{old('firstname')}}"
                            label="Nombre" 
                            placeholder="Ejemplo: Maria"/>

                <flux:input name="lastname"
                            value="{{old('lastname')}}"
                            label="Apellido" 
                            placeholder="Ejemplo: Perez" />
                
                <flux:radio.group label="Es miembro" name="is_member">
                            <flux:radio value="1" label="Si" checked />
                            <flux:radio value="0" label="No" />
                </flux:radio.group>

                <flux:radio.group label="Genero" name="gender">
                            <flux:radio value="Hombre" label="Hombre" checked />
                            <flux:radio value="Mujer" label="Mujer" />
                </flux:radio.group>

                <flux:input type="date" 
                            max="2999-12-31" 
                            label="Fecha de nacimiento" 
                            name="birthdate" 
                            value="{{old('birthdate')}}" />
                
                <flux:select label="Unidad"
                             name="ward_id"
                             placeholder="Elegir Unidad...">
                    @foreach ($wards as $ward)

                        <flux:select.option value="{{$ward->id}}" :selected="$ward->id == old('ward_id')">
                            {{$ward->name}}
                        </flux:select.option>
                    
                    @endforeach
                </flux:select>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
        </form>

    </div>

    

</x-layouts.app>
