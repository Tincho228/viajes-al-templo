<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.passengers.index')">
            Pasajeros
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.passengers.update', $passenger) }}" method="post" class=" space-y-4">
            @csrf
            @method('PUT')
                <h1>Informacion Basica</h1>
                <flux:input name="firstname"
                            value="{{old('firstname', $passenger->firstname)}}"
                            label="Nombre" 
                            placeholder="Ejemplo: Maria"/>

                <flux:input name="middlename"
                            value="{{old('middlename', $passenger->middlename)}}"
                            label="Segundo nombre" 
                            placeholder="Ejemplo: Maria"/>

                <flux:input name="lastname"
                            value="{{old('lastname', $passenger->lastname)}}"
                            label="Apellido" 
                            placeholder="Ejemplo: Perez" />

                <h1>Identificacion</h1>

                <flux:input name="dni"
                            description="Informacion importante para el transportista"
                            value="{{old('dni', $passenger->dni)}}"
                            label="DNI" 
                            placeholder="12.326.363" />

                <h1>Informacion de la iglesia</h1>
                
                <flux:radio.group label="Es miembro" name="is_member">
                            <flux:radio value="1" label="Si" @checked(old('is_member', $passenger->is_member) == 1) />
                            <flux:radio value="0" label="No" @checked(old('is_member', $passenger->is_member) == 0) />
                </flux:radio.group>

                <flux:input name="membership"
                            description="Informacion para el templo"
                            value="{{old('membership', $passenger->membership)}}"
                            label="Cedula de miembro" 
                            placeholder="12.326.363" />
                
                <flux:radio.group label="Es investido" name="is_endowed">
                            <flux:radio value="1" label="Si" :checked="(old('is_endowed', $passenger->is_endowed) == '1')"/>
                            <flux:radio value="0" label="No" :checked="(old('is_endowed', $passenger->is_endowed) == '0')"/>
                </flux:radio.group>

                <h1>Perfil y edad</h1>

                <flux:radio.group label="Genero" name="gender">
                            <flux:radio value="Hombre" label="Hombre" :checked="(old('gender', $passenger->gender) === 'Hombre')"/>
                            <flux:radio value="Mujer" label="Mujer" :checked="(old('gender', $passenger->gender) === 'Mujer')"/>
                </flux:radio.group>

                <flux:input type="date" 
                            max="2999-12-31" 
                            label="Fecha de nacimiento" 
                            name="birthdate" 
                            value="{{old('birthdate', $passenger->birthdate)}}"/>

                <h1>Informacion importante para padres y obispos</h1>
                
                <flux:radio.group label="Esta autorizado" name="is_authorized">
                            <flux:radio value="1" label="Si" :checked="(old('is_authorized', $passenger->is_authorized) == '1')"/>
                            <flux:radio value="0" label="No" :checked="(old('is_authorized', $passenger->is_authorized) == '0')"/>
                </flux:radio.group>
                
                <flux:select label="Unidad"
                             name="ward_id"
                             placeholder="Elegir Unidad...">
                    @foreach ($wards as $ward)

                        <flux:select.option value="{{$ward->id}}" :selected="$ward->id == old('ward_id', $passenger->ward->id)">
                            {{$ward->name}}
                        </flux:select.option>
                    
                    @endforeach
                </flux:select>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
        </form>
    </div>
</x-layouts.app>
