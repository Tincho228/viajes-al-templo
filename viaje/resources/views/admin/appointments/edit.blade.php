<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.appointments.index')">
            Barrios
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    
        <form action="{{ route('admin.appointments.update', $appointment) }}" method="post">
            @csrf
            @method('PUT')
                
            <div class="bg-white px-6 py-8 shadow-lg rounded-lg space-y-4">

                <flux:input type="time"
                            name="time"
                            value="{{old('time', $appointment->time)}}"
                            label="Horario" 
                            placeholder="Ingrese el nombre de la unidad"/>

                <flux:input type="number"
                            name="capacity"
                            value="{{old('capacity', $appointment->capacity)}}"
                            label="Capacidad" 
                            placeholder="Ingrese la cantidad de personas" />
                
                <flux:select label="Ordenanza"
                             name="ordinance_id"
                             placeholder="Elegir Estaca...">
                    @foreach ($ordinances as $ordinance)
                        
                        <flux:select.option value="{{$ordinance->id}}" :selected="$ordinance->id == old('ordinance_id', $appointment->ordinance->id)">
                            {{$ordinance->name}}
                        </flux:select.option>
                    
                    @endforeach
                </flux:select>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
            </div>
        </form>

</x-layouts.app>
