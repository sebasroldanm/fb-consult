<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="relative bg-white overflow-hidden">
                    <div class="max-w-7xl mx-auto">
                        <div
                            class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                                fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                                <polygon points="50,0 100,0 50,100 0,100" />
                            </svg>

                            <div>
                                <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                                    <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start"
                                        aria-label="Global">
                                    </nav>
                                </div>
                            </div>

                            <main
                                class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                                <div class="sm:text-center lg:text-left">
                                    <h1
                                        class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                        <span class="block xl:inline">Datos para enriquecer su</span>
                                        <span class="block text-indigo-600 xl:inline">Negocio Online</span>
                                    </h1>
                                    <p
                                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                        Se paciente, son más de 17 millones de registros. Nuestros sistemas están limitados, pero queremos compartir una parte de nosotros contigo.
                                    </p>
                                    <p
                                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                        Realiza una búsqueda personalizada, recuerda que algunos usuarios de Facebook omiten datos de importancia.
                                    </p>
                                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                        <div class="rounded-md shadow">
                                            <a href="#" id="target"
                                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                                Realizar Búsqueda
                                            </a>
                                        </div>
                                        <div class="mt-3 sm:mt-0 sm:ml-3">
                                            <a href="/colombia"
                                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                                Ir a la Base de Datos
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                            src="/img/fb-search-img-1.jpg"
                            alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="mt-5 md:mt-0 md:col-span-3">
                            <form id="formSearch" action="/colombiaSearch" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                                            <div class="...">
                                                <label for="primer_nombre"
                                                    class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                                                <input type="text" name="primer_nombre" id="primer_nombre"
                                                    autocomplete="given-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="...">
                                                <label for="segundo_nombre"
                                                    class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                                                <input type="text" name="segundo_nombre" id="segundo_nombre"
                                                    autocomplete="family-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="...">
                                                <label for="primer_apellido"
                                                    class="block text-sm font-medium text-gray-700">Primer Apellido</label>
                                                <input type="text" name="primer_apellido" id="primer_apellido"
                                                    autocomplete="given-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="...">
                                                <label for="segundo_apellido"
                                                    class="block text-sm font-medium text-gray-700">Segundo Apellido</label>
                                                <input type="text" name="segundo_apellido" id="segundo_apellido"
                                                    autocomplete="family-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="...">
                                                <label for="genero"
                                                    class="block text-sm font-medium text-gray-700">Género</label>
                                                <select id="genero" name="genero" class="mt-1 relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="">Vacio</option>
                                                    <option value="female">Femenino</option>
                                                    <option value="female (hidden)">Femenino (Oculto)</option>
                                                    <option value="male">Masculino</option>
                                                    <option value="male (hidden)">masculino (Oculto)</option>
                                                </select>
                                            </div>
                                            <div class="...">
                                                <label for="ciudad"
                                                    class="block text-sm font-medium text-gray-700">Ciudad</label>
                                                <input type="text" name="ciudad" id="ciudad"
                                                    autocomplete="family-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="...">
                                                <label for="ubicacion"
                                                    class="block text-sm font-medium text-gray-700">Ubicación</label>
                                                <input type="text" name="ubicacion" id="ubicacion"
                                                    autocomplete="given-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="...">
                                                <label for="civil"
                                                    class="block text-sm font-medium text-gray-700">Estado Civil</label>
                                                    <select id="civil" name="civil" class="mt-1 relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="">Vacio</option>
                                                        <option value="Single">Soltero(a)</option>
                                                        <option value="Married">Casado(a)</option>
                                                        <option value="Separated">Separado(a)</option>
                                                        <option value="Divorced">Divorciado(a)</option>
                                                        <option value="Widowed">Viudo(a)</option>
                                                        <option value="In a relationship">En una relación</option>
                                                        <option value="In an open relationship">En una relación abierta</option>
                                                        <option value="In a civil union">En una unión civil</option>
                                                        <option value="Engaged">Comprometido(a)</option>
                                                        <option value="In a domestic partnership">En pareja de hecho</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>


<script>
    $("#target").click(function () {
        $('html, body').animate({
            scrollTop: $("#formSearch").offset().top
        }, 2000);
    })
    // function initElement() {
    //     var p = document.getElementById("target");
    //     var f = document.getElementById("formSearch");
    // }
</script>