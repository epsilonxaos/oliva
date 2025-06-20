@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto pt-6 px-1">

        <div class="max-w-7xl mx-auto">

            {{-- @can(PermissionKey::Socios['permissions']['create']['name']) --}}
            <form action="{{ route('panel.sucursal.store') }}" method="POST" enctype="multipart/form-data"
                class="form-submit-alert-wait">
                @csrf

                <div class="flex items-center justify-end pb-4 bg-white dark:bg-gray-900">

                    <button type="submit"
                        class="px-2 py-1 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                        <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                        </svg>
                        Guardar
                    </button>
                </div>

                <div class="w-full mb-10">
                    <h2 class="mb-2 font-semibold uppercase text-gray-900 text-base">Información general</h2>
                    <div class="mb-3">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                class="text-red-800">*</span> Nombre de la sucursal</label>
                        <input id="title" name="title" value="{{ old('title') }}" required
                            placeholder="Ejemplo: Centro" autocomplete="off"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="flex flex-wrap">
                        <div class="mb-3 w-full md:pr-3">
                            <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="text-red-800">*</span> Imagen de
                                portada</label>
                            <input type="file" required name="cover" class="dropify" data-height="200"
                                data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png webp" />
                            <small>Las medidas recomendadas son 700 x 900 px, solo se aceptan .jpg, .jpeg, .webp y .png
                                con un maximo de peso de 1MB.</small>
                        </div>
                        <div class="mb-3 w-full md:w-1/2 md:pl-3">
                            <label for="icon_movil"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icono
                                de sucursal (Movil)</label>
                            <input type="file" name="icon_movil" class="dropify" data-height="200"
                                data-max-file-size="1M" data-allowed-file-extensions="png svg" />
                            <small>Las medidas recomendadas son 700 x 900 px, solo se aceptan .png y .svg
                                con un maximo de peso de 1MB.</small>
                        </div>
                        <div class="mb-3 w-full md:w-1/2 md:pl-3">
                            <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icono
                                de sucursal (Escritorio)</label>
                            <input type="file" name="icon" class="dropify" data-height="200" data-max-file-size="1M"
                                data-allowed-file-extensions="png svg" />
                            <small>Las medidas recomendadas son 700 x 900 px, solo se aceptan .png y .svg
                                con un maximo de peso de 1MB.</small>
                        </div>
                        <div class="mb-3 w-full md:w-1/2 md:pr-3">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección
                                de la sucursal</label>
                            <input id="address" name="address" value="{{ old('address') }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3 w-full md:w-1/2 md:pl-3">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                            <input id="phone" name="phone" value="{{ old('phone') }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3 w-full">
                            <label for="menu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menú
                                de sucursal</label>
                            <input type="file" name="menu" class="dropify" data-height="200" data-max-file-size="1M"
                                data-allowed-file-extensions="pdf" />
                            <small>Solo se aceptan .pdf con un maximo de peso de 1MB.</small>
                        </div>
                        <div class="mb-3 w-full">
                            <small class="pb-2 block">
                                Recomendamos siempre que al copiar y pegar información desde algún sitio o
                                archivo eliminar el formato de los textos para un óptimo funcionamiento, esto se
                                puede realizar desde el mismo editor de texto presionando el siguiente botón
                                <img src="{{ asset('img/panel/clear-format.png') }}" class="inline" alt="Clear format">
                            </small>


                            <div class="mb-3">
                                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="desc"
                                        data-tabs-toggle="#descContent" role="tablist">
                                        <li class="mr-2" role="presentation">
                                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="ess-tab"
                                                data-tabs-target="#ess" type="button" role="tab"
                                                aria-controls="ess" aria-selected="false">Español</button>
                                        </li>
                                        <li class="mr-2" role="presentation">
                                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="enn-tab"
                                                data-tabs-target="#enn" type="button" role="tab"
                                                aria-controls="enn" aria-selected="false">Inglés</button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="descContent">
                                    <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="ess" role="tabpanel"
                                        aria-labelledby="ess-tab">
                                        <div class="mb-3">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="descEs">Contenido</label>
                                            <small class="pb-2 block">Recomendamos siempre que al copiar y pegar
                                                información desde algún sitio o archivo eliminar el formato de los textos
                                                para un óptimo funcionamiento, esto se puede realizar desde el mismo editor
                                                de texto presionando el siguiente botón <img
                                                    src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                                    alt="Clear format"></small>
                                            <textarea name="descEs" class="trumbowyg-panel" cols="30" rows="10">{{ old('descEs') }}</textarea>
                                        </div>

                                    </div>
                                    <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="enn" role="tabpanel"
                                        aria-labelledby="enn-tab">
                                        <div class="mb-3">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                for="descEn">Contenido</label>
                                            <small class="pb-2 block">Recomendamos siempre que al copiar y pegar
                                                información desde algún sitio o archivo eliminar el formato de los textos
                                                para un óptimo funcionamiento, esto se puede realizar desde el mismo editor
                                                de texto presionando el siguiente botón <img
                                                    src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                                    alt="Clear format"></small>
                                            <textarea name="descEn" class="trumbowyg-panel" cols="30" rows="10">{{ old('descEn') }}</textarea>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="w-full mb-10">
                    <h2 class="mb-2 font-semibold uppercase text-gray-900 text-base">Ligas web y menú</h2>

                    <div class="mb-3 w-full">
                        <label for="urlDelivery" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                            Delivery</label>
                        <input id="urlDelivery" name="urlDelivery" value="{{ old('urlDelivery') }}" autocomplete="off"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-3 w-full">
                        <label for="urlReservation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                            Reservaciones</label>
                        <input id="urlReservation" name="urlReservation" value="{{ old('urlReservation') }}"
                            autocomplete="off"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-3 w-full">
                        <label for="urlLocation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url
                            Google Maps</label>
                        <input id="urlLocation" name="urlLocation" value="{{ old('urlLocation') }}" autocomplete="off"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="flex flex-wrap">
                        <div class="mb-3 w-full md:w-1/2 md:pr-3">
                            <label for="urlIn"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                            <input id="urlIn" name="urlIn" value="{{ old('urlIn') }}" autocomplete="off"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-3 w-full md:w-1/2 md:pl-3">
                            <label for="titleIn"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram nick</label>
                            <input id="titleIn" name="titleIn" value="{{ old('titleIn') }}" autocomplete="off"
                                placeholder="Ejemplo: @PizzeriaMid"
                                class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mb-3 w-full">
                        <label for="urlFb"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                        <input id="urlFb" name="urlFb" value="{{ old('urlFb') }}" autocomplete="off"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-3 w-full">
                        <label for="urlfacturacion"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url facturación</label>
                        <input id="urlfacturacion" name="urlfacturacion" value="{{ old('urlfacturacion') }}"
                            autocomplete="off"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-3 w-full">
                        <label for="script_covermanager"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover Manager</label>
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            Importante: Solo ingresa el código <code>&lt;iframe&gt;</code> aquí. Si necesitas agregar el
                            script de Cover Manager de forma global en el sitio, configúralo desde el módulo "Generales".
                        </p>
                        <textarea id="script_covermanager" name="script_covermanager" autocomplete="off" cols="30" rows="10"
                            class="mb-4 disabled:opacity-50 disabled:pointer-events-none bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('script_covermanager') }}</textarea>
                    </div>
                </div>
                <div class="w-full mb-10">
                    <h2 class="mb-2 font-semibold uppercase text-gray-900 text-base">Horarios y Croquis</h2>

                    <div class=" mb-6">
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                                data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="es-tab"
                                        data-tabs-target="#es" type="button" role="tab" aria-controls="es"
                                        aria-selected="false">Español</button>
                                </li>
                                <li class="mr-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="en-tab"
                                        data-tabs-target="#en" type="button" role="tab" aria-controls="en"
                                        aria-selected="false">Inglés</button>
                                </li>
                            </ul>
                        </div>
                        <div id="myTabContent">
                            <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="es" role="tabpanel"
                                aria-labelledby="es-tab">
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="horarioEs">Horarios</label>
                                    <small class="pb-2 block">Recomendamos siempre que al copiar y pegar
                                        información desde algún sitio o archivo eliminar el formato de los textos
                                        para un óptimo funcionamiento, esto se puede realizar desde el mismo editor
                                        de texto presionando el siguiente botón <img
                                            src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                            alt="Clear format"></small>
                                    <textarea name="horarioEs" class="trumbowyg-panel" cols="30" rows="10"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="croquisEs"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Croquis</label>
                                    <input type="file" name="croquisEs" class="dropify" data-height="200"
                                        data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" />
                                    <small>Las medidas recomendadas son 700 x 900 px, solo se aceptan .jpg, .jpeg y .png
                                        con un maximo de peso de 1MB.</small>
                                </div>
                            </div>
                            <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="en" role="tabpanel"
                                aria-labelledby="en-tab">
                                <div class="mb-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="horarioEn">Horarios</label>
                                    <small class="pb-2 block">Recomendamos siempre que al copiar y pegar
                                        información desde algún sitio o archivo eliminar el formato de los textos
                                        para un óptimo funcionamiento, esto se puede realizar desde el mismo editor
                                        de texto presionando el siguiente botón <img
                                            src="{{ asset('img/panel/clear-format.png') }}" class="inline"
                                            alt="Clear format"></small>
                                    <textarea name="horarioEn" class="trumbowyg-panel" cols="30" rows="10"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="croquisEn"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Croquis</label>
                                    <input type="file" name="croquisEn" class="dropify" data-height="200"
                                        data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" />
                                    <small>Las medidas recomendadas son 700 x 900 px, solo se aceptan .jpg, .jpeg y .png
                                        con un maximo de peso de 1MB.</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="text-center pt-6 mt-16">
                    <button type="submit"
                        class="px-2 py-1 mx-auto bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wide transition ease-in-out duration-150 flex items-center">
                        <svg class="w-5 inline-block mr-1" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                        </svg>
                        Guardar
                    </button>
                </div>
            </form>
            {{-- @endcan --}}
        </div>
    </div>
@endsection
