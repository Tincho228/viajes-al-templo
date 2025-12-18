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

    
        <form action="{{ route('admin.wards.update', $ward) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="relative mb-2">

                <img id="imgPreview" class="w-full aspect-video" 

                     {{-- Check and render image path from Storage --}}
                     src="{{$ward->image_path ? Storage::url($ward->image_path) : 'https://i0.wp.com/www.bishoprook.com/wp-content/uploads/2021/05/placeholder-image-gray-16x9-1.png?ssl=1' }} " 
                     alt="No image">

                <div class="absolute top-8 right-8">
                    <label class="bg-white px-4 py-2 rounded-lg cursor-pointer">
                        Cambiar imagen

                        {{-- Listening to changes on the input file to generate preview --}}
                        <input class="hidden" type="file" name="image" accept="image/*" onchange="previewImage(event, '#imgPreview')">
                    </label>
                </div>
            </div>    
            <div class="bg-white px-6 py-8 shadow-lg rounded-lg space-y-4">
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

</x-layouts.app>
