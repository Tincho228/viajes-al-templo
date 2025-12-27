<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.trips.index')">
            Viajes
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.trips.update', $trip) }}" method="post" class="space-y-4">
            @csrf
            @method('PUT')  
                <flux:input 
                    type="datetime-local"
                    name="departure"
                    value="{{ old('departure', $trip->departure) }}"
                    label="Fecha de salida"  
                    placeholder="Ingrese la fecha de salida"
                    step="1" 
                />

                <flux:input name="location"
                            value="{{old('location', $trip->location)}}"
                            label="Lugar de llegada"  
                            placeholder="Ingrese el lugar de llegada" />

                <flux:input name="description"
                            value="{{old('description', $trip->description)}}"
                            label="Descripcion" 
                            placeholder="Ingrese una descripcion" />
                <flux:input type="number"
                            name="capacity"
                            value="{{old('capacity', $trip->capacity)}}"
                            label="Capacidad del colectivo" 
                            placeholder="Ingrese una cantidad de asientos" />
                <flux:input type="number"
                            name="cost"
                            value="{{old('cost', $trip->cost)}}"
                            label="Costo" 
                            placeholder="Ingrese el costo" />
                <flux:input name="user_id"
                            :value="old('user_id', $trip->user_id)"
                            hidden
                             />
                <flux:input type="text"
                            :value="old('user_id', $trip->user->name)"
                            readonly
                            label="Organizador" 
                             />
                <flux:select label="Unidad"
                             name="ward_id"
                             placeholder="Elegir Unidad...">
                    @foreach ($wards as $ward)

                        <flux:select.option value="{{$ward->id}}" :selected="$ward->id == old('ward_id', $trip->ward_id)">
                            {{$ward->name}}
                        </flux:select.option>
                    
                    @endforeach
                </flux:select>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
        </form>

    </div>

</x-layouts.app>
