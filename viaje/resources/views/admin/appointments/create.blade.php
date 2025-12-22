<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.appointments.index')">
            Sesiones
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.appointments.store') }}" method="post">
            @csrf
            <div>
                <flux:input type="time"
                            name="time"
                            value="{{old('time')}}"
                            label="Horario" 
                            placeholder="Ingrese la hora"/>

                <flux:input type="number"
                            name="capacity"
                            value="{{old('capacity')}}"
                            label="Capacidad" 
                            placeholder="Ingrese la cantidad de personas" />
                
                <flux:select label="Ordenanza"
                             name="ordinance_id"
                             placeholder="Elegir Ordenanza...">
                    @foreach ($ordinances as $ordinance)
                        
                        <flux:select.option value="{{$ordinance->id}}" :selected="$ordinance->id == old('ordinance_id')">
                            {{$ordinance->name}}
                        </flux:select.option>
                    
                    @endforeach
                </flux:select>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
            </div>
        </form>

    </div>

</x-layouts.app>
