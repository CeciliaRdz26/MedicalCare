<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold leading-tight mb-4">Editar paciente</h2>
                    <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <x-label for="nombre" :value="__('Nombre')" />
                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $paciente->nombre)" />
                            <x-individual-input-error  :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="correo" :value="__('Correo')" />
                            <x-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo', $paciente->correo)" />
                            <x-individual-input-error  :messages="$errors->get('correo')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="telefono" :value="__('Teléfono')" />
                            <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono', $paciente->telefono)" />
                            <x-individual-input-error  :messages="$errors->get('telefono')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="direccion" :value="__('Dirección')" />
                            <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion', $paciente->direccion)" />
                            <x-individual-input-error  :messages="$errors->get('direccion')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="rfc" :value="__('RFC')" />
                            <x-input id="rfc" class="block mt-1 w-full" type="text" name="rfc" :value="old('rfc', $paciente->rfc)" />
                            <x-individual-input-error  :messages="$errors->get('rfc')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="razon_social" :value="__('Razón Social')" />
                            <x-input id="razon_social" class="block mt-1 w-full" type="text" name="razon_social" :value="old('razon_social', $paciente->razon_social)" />
                            <x-individual-input-error  :messages="$errors->get('razon_social')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="cp" :value="__('Código Postal')" />
                            <x-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="old('cp', $paciente->cp)" />
                            <x-individual-input-error  :messages="$errors->get('cp')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="regimen_fiscal" :value="__('Régimen Fiscal')" />
                            <x-input id="regimen_fiscal" class="block mt-1 w-full" type="text" name="regimen_fiscal" :value="old('regimen_fiscal', $paciente->regimen_fiscal)" />
                            <x-individual-input-error  :messages="$errors->get('regimen_fiscal')" class="mt-2" />
                        </div>
                        
                        <div class="flex justify-end">
                            <x-button>
                                {{ __('Editar paciente') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>