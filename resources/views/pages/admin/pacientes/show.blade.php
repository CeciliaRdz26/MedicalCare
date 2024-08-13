<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">
                        Ver paciente
                    </h2>
                    <div class="mb-4">
                        <x-label for="nombre" :value="__('Nombre')" />
                        <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="$paciente->nombre" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="correo" :value="__('Correo')" />
                        <x-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="$paciente->correo" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="telefono" :value="__('Teléfono')" />
                        <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="$paciente->telefono" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="direccion" :value="__('Dirección')" />
                        <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="$paciente->direccion" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="rfc" :value="__('RFC')" />
                        <x-input id="rfc" class="block mt-1 w-full" type="text" name="rfc" :value="$paciente->rfc" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="razon_social" :value="__('Razón Social')" />
                        <x-input id="razon_social" class="block mt-1 w-full" type="text" name="razon_social" :value="$paciente->razon_social" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="cp" :value="__('Código Postal')" />
                        <x-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="$paciente->cp" disabled />
                    </div>

                    <div class="mb-4">
                        <x-label for="regimen_fiscal" :value="__('Régimen Fiscal')" />
                        <x-input id="regimen_fiscal" class="block mt-1 w-full" type="text" name="regimen_fiscal" :value="$paciente->regimen_fiscal" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>