<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.seats.index')">
            Estacas
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.seats.update', $seat) }}" method="post" class="space-y-4">
            @csrf
            @method('PUT')
            <flux:input name="number"
                            type="number"
                            value="{{old('name', $seat->number)}}"
                            label="Numero de asiento" 
                            placeholder="Ingrese el numero de asiento"/>

            <flux:select label="Viaje"
                            name="trip_id"
                            placeholder="Elegir Viaje...">
                @foreach ($trips as $trip)
                    <flux:select.option value="{{$trip->id}}" :selected="$trip->id == old('trip_id', $trip->id)">
                        {{$trip->location}}
                    </flux:select.option>
                @endforeach
            </flux:select>

            <flux:input type="text"
                        name="user_id"
                        :value="old('user_id',$user->id)" 
                        hidden />

            <flux:input type="text"
                        :value="$user->name"
                        label="Organizador" 
                        readonly />
            

            <flux:input type="text"
                        :value="$user->stake->name"
                        label="Estaca" 
                        readonly />
            <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
        </form>

    </div>

</x-layouts.app>
