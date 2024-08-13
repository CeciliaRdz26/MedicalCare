<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">Editar Vendedor</h2>
                    <form method="POST" action="{{ route('medicos.update', $vendedor->id) }}" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="pb-4">
                            <img id="preview-image" src="{{ asset($producto->imagen) }}" class="mt-2 w-full h-auto max-w-md mx-auto object-cover rounded-lg aspect-square border border-gray-300">
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen</label>
                            <input accept="image/jpeg, image/jpg, image/png" type="file" name="imagen" id="imagen" value="{{ old('imagen', $producto->imagen) }}" class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out" onchange="previewImage(event)">
                            @error('imagen')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-4">
                            <x-label for="nombre" :value="__('Nombre')" />
                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $vendedor->user->name)"  autofocus />
                            <x-individual-input-error  :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                    
                        <div class="mb-4">
                            <x-label for="correo" :value="__('Correo')" />
                            <x-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo', $vendedor->user->email)" />
                            <x-individual-input-error  :messages="$errors->get('correo')" class="mt-2" />
                        </div>
                    
                        <div class="mb-4">
                            <x-label for="telefono" :value="__('Teléfono')" />
                            <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono', $vendedor->telefono)" />
                            <x-individual-input-error  :messages="$errors->get('telefono')" class="mt-2" />
                        </div>
                    
                        <div class="mb-4">
                            <x-label for="password" :value="__('Contraseña')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" />
                            <x-individual-input-error  :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    
                        <div class="flex justify-end">
                            <x-button>
                                {{ __('Actualizar vendedor') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview-image');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    
</x-app-layout>