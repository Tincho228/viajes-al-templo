<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">
            Panel de control
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.wards.index')">
            Barrios
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Editar
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="bg-white px-6 py-8 shadow-lg rounded-lg">
        <form action="{{ route('admin.wards.update', $ward) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <flux:input name="name"
                            value="{{old('name', $ward->name)}}"
                            label="Nombre" 
                            placeholder="Ingrese el nombre de la unidad"/>

                <flux:input name="address"
                            value="{{old('address', $ward->address)}}"
                            label="Direccion" 
                            placeholder="Ingrese la direccion de la unidad" />
                
                <flux:select wire:model="industry" 
                             label="Estaca"
                             name="stake_id"
                             placeholder="Elegir Estaca...">
                    @foreach ($stakes as $stake)
                        
                        <flux:select.option value="{{$stake->id}}" :selected="$stake->id == old('stake_id', $ward->stake_id)">
                            {{$stake->name}}
                        </flux:select.option>
                    
                    @endforeach
                </flux:select>

                <flux:button class="mt-4" variant="primary" type="submit">Enviar</flux:button>
            </div>
        </form>

    </div>

</x-layouts.app>
