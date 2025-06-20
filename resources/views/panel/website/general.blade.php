@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto pt-6 px-1">

        <div class="max-w-7xl mx-auto">
            {{-- @can(PermissionKey::Socios['permissions']['update']['name']) --}}
            <form action="{{ route('panel.website.update', ['seccion' => request('seccion')]) }}"
                enctype="multipart/form-data" class="form-submit-alert-wait" method="POST">
                @csrf
                @method('PUT')
                {{-- @elsecan
                    <form> --}}
                {{-- @endcan --}}

                {{-- @canany([PermissionKey::Socios['permissions']['edit']['name'], PermissionKey::Socios['permissions']['update']['name']]) --}}
                <div class="flex items-center justify-end pb-4 bg-white dark:bg-gray-900">
                    <button type="submit"
                        class="px-2 py-1 bg-orange-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                        <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                        </svg>
                        Actualizar
                    </button>
                </div>

                <div class="w-full mb-10">
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Información general</h2>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="email_facturacion">Email
                                de facturación</label>
                            <input id="email_facturacion" name="email_facturacion" value="{{ $data->email_facturacion }}"
                                autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="email_bolsa">Email bolsa de trabajo</label>
                            <input id="email_bolsa" name="email_bolsa" value="{{ $data->email_bolsa }}" autocomplete="off"
                                class="mb-1 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <span class="text-xs">Este correo electrónico está relacionado con el formulario de <span
                                    class="font-bold">bolsa de trabajo</span>. Toda la información relacionada será enviada
                                a esta dirección de correo electrónico.</span>
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="email_eventos">Email para eventos</label>
                            <input id="email_eventos" name="email_eventos" value="{{ $data->email_eventos }}"
                                autocomplete="off"
                                class="mb-1 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <span class="text-xs">Este correo electrónico está relacionado con el formulario de <span
                                    class="font-bold">grupos y eventos</span>. Toda la información relacionada será enviada
                                a esta dirección de correo electrónico.</span>
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="emails_cc">Email CC para eventos</label>
                            <input id="emails_cc" name="emails_cc" value="{{ $data->emails_cc }}" autocomplete="off"
                                class="mb-1 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <span class="text-xs block"><span class="font-bold">Ejemplo:</span>
                                correo_1@prueba.mx;correo_2@prueba.mx;correo_3@prueba.mx</span>
                            <span class="text-xs">Estos correos electrónicos estaran relacionados con el formulario de <span
                                    class="font-bold">grupos y eventos</span>.</span>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-10">
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Promociones</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                            <div class="w-full mb-3">
                                <label for="img_promo_movil"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen
                                    movil</label>
                                <input type="file" name="img_promo_movil" class="dropify" data-height="200"
                                    data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png webp"
                                    data-default-file="{{ asset($data->img_promo_movil) }}" />
                                <small>Solo se aceptan .jpg, .jpeg, .webp y .png con un maximo de peso de 1MB.</small>
                            </div>
                            <div class="w-full mb-3">
                                <label for="img_promo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen
                                    escritorio</label>
                                <input type="file" name="img_promo" class="dropify" data-height="200"
                                    data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png webp"
                                    data-default-file="{{ asset($data->img_promo) }}" />
                                <small>Solo se aceptan .jpg, .jpeg, .webp y .png con un maximo de peso de 1MB.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Redes sociales</h2>

                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="url_in">Instagram</label>
                            <input id="url_in" name="url_in" value="{{ $data->url_in }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="url_fb">Facebook</label>
                            <input id="url_fb" name="url_fb" value="{{ $data->url_fb }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="url_sp">Spotify</label>
                            <input id="url_sp" name="url_sp" value="{{ $data->url_sp }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="url_ta">TripAdvisor</label>
                            <input id="url_ta" name="url_ta" value="{{ $data->url_ta }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>


                    </div>
                </div>
                <div class="w-full">
                    <div class=" mb-6">
                        <h2 class="mb-2 font-semibold text-gray-900 text-base">Cover Manager Sucursales</h2>

                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="link_covermanager">Script</label>
                            <p class="text-xs mb-2">
                                <span class="font-semibold">Importante:</span> Solo debes agregar aquí el <span
                                    class="font-semibold">script</span>. El <span class="font-semibold">iframe</span> debe
                                configurarse directamente en la sucursal correspondiente.<br>
                                Para un funcionamiento correcto, asegúrate de ingresar el script de manera adecuada.<br>
                                <span class="block mt-2"><span class="font-semibold">Ejemplo:</span> <code>&lt;script
                                        src="https://covermanager.com/tu-script.js"&gt;&lt;/script&gt;</code></span>
                            </p>
                            <input id="link_covermanager" name="link_covermanager"
                                value="{{ $data->link_covermanager }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>


                    </div>
                </div>
                {{-- @endcanany
			
					@can(PermissionKey::Socios['permissions']['update']['name']) --}}
                <div class="text-center pt-6 mt-16">
                    <button type="submit"
                        class="px-2 py-1 mx-auto bg-orange-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                        <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                        </svg>
                        Actualizar
                    </button>
                </div>
                {{-- @endcan --}}
            </form>
        </div>
    </div>
@endsection
