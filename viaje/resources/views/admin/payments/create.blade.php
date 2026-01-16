<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.trips.index')">
            Pagos
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Nuevo
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.trips.store') }}" method="post" class="space-y-4">
            @csrf
                
                <flux:input type="number"
                            name="amount"
                            value="{{old('amount')}}"
                            label="Monto a pagar" 
                            placeholder="Ingrese un monto a pagar" />

                
                <flux:select label="Viaje"
                             name="trip_id"
                             placeholder="Elegir Viaje...">
                    @foreach ($trips as $trip)
                        <flux:select.option value="{{$trip->id}}" :selected="$trip->id == old('trip_id')">
                            {{$trip->location}}
                        </flux:select.option>
                    @endforeach
                </flux:select>

                <flux:select label="Asiento"
                             name="seat_id"
                             placeholder="Elegir Asiento...">
                    @foreach ($seats as $seat)
                        <flux:select.option value="{{$seat->id}}" :selected="$seat->id == old('seat_id')">
                            {{$seat->number}}
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

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
        </form>

    </div>

</x-layouts.app>
