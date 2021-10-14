<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Colombia') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex bg-white px-4 py-3 sm:px-6">
                                <input wire:model="searchName" class="form-input rounded-md shadow-sm mt1 block ml-2 mr-2"
                                    type="text" placeholder="Nombre">
                                <input wire:model="searchLast" class="form-input rounded-md shadow-sm mt1 block ml-2 mr-2"
                                    type="text" placeholder="Apellido">
                                <input wire:model="searchLocation" class="form-input rounded-md shadow-sm mt1 block ml-2 mr-2"
                                    type="text" placeholder="Ubicación">
                                <input wire:model="searchCity" class="form-input rounded-md shadow-sm mt1 block ml-2 mr-2"
                                    type="text" placeholder="Ciudad">
                                <div class="form-input rounded-md shadow-sm mt1 ml-6 block">
                                    <select wire:model="perPage" class="outline-none text-gray-500 text-sm">
                                        <option value="5">5 por página</option>
                                        <option value="10">10 por página</option>
                                        <option value="15">15 por página</option>
                                        <option value="25">25 por página</option>
                                        <option value="50">50 por página</option>
                                        <option value="100">100 por página</option>
                                        <option value="150">150 por página</option>
                                        <option value="300">300 por página</option>
                                    </select>
                                </div>
                                @if ($searchName !== '' || $searchLast !== '' || $searchLocation !== '' || $searchCity !== '')
                                    <button wire:click="clear" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">X</button>
                                @endif
                            </div>
                            @if ($data->count())
                                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombres y Apellidos
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Ubicación y Ciudad
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Genero y Estado Civil
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Celular
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Facebook
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($data as $item)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="40"
                                                                height="40" viewBox="0 0 24 24" style="fill: #0A80EC">
                                                                <path
                                                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                @if ($isMongo)
                                                                    {{ $item['nombre'] }}
                                                                @else
                                                                    {{ $item->nombre }}
                                                                @endif
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                @if ($isMongo)
                                                                    {{ $item['apellido'] }}
                                                                @else
                                                                    {{ $item->apellido }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if ($isMongo)
                                                        <div class="text-sm text-gray-900">{{ $item['ubicacion'] }}</div>
                                                        <div class="text-sm text-gray-500">{{ $item['ciudad'] }}</div>
                                                    @else
                                                        <div class="text-sm text-gray-900">{{ $item->ubicacion }}</div>
                                                        <div class="text-sm text-gray-500">{{ $item->ciudad }}</div>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        @php
                                                            $gen = ($isMongo) ? $item['genero'] : $item->genero ;
                                                        @endphp
                                                        @switch($gen)
                                                            @case('female')
                                                                Femenino
                                                                @break
                                                            @case('female (hidden)')
                                                                Femenino (Oculto)
                                                                @break
                                                            @case('male')
                                                                Masculino
                                                                @break
                                                            @case('male (hidden)')
                                                                Masculino (Oculto)
                                                                @break
                                                            @default
                                                                No Registra
                                                        @endswitch
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        @php
                                                            $civ = ($isMongo) ? $item['civil'] : $item->civil ;
                                                        @endphp
                                                        @switch($civ)
                                                            @case('Single')
                                                                Soltero(a)
                                                                @break
                                                            @case('Married')
                                                                Casado(a)
                                                                @break
                                                            @case('Separated')
                                                                Separado(a)
                                                                @break
                                                            @case('Widowed')
                                                                Viudo(a)
                                                                @break
                                                            @case('In a relationship')
                                                                En una relación
                                                                @break
                                                            @case('In a civil union')
                                                                En una unión civil
                                                                @break
                                                            @case('Engaged')
                                                                Comprometido(a)
                                                                @break
                                                            @case('In a domestic partnership')
                                                                En pareja de hecho
                                                                @break
                                                            @case('Divorced')
                                                                Divorciado(a)
                                                                @break
                                                            @case('In an open relationship')
                                                                En una relación abierta
                                                                @break
                                                            @default
                                                                No registra
                                                        @endswitch
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        @if ($isMongo)
                                                            +{{ $item['celular'] }}
                                                        @else
                                                            +{{ $item->celular }}
                                                        @endif
                                                    </span>
                                                    <div class="px-2 inline-flex" style="vertical-align: top">
                                                        <a href="https://api.whatsapp.com/send?phone=@if ($isMongo) {{ $item['celular'] }} @else {{ $item->celular }} @endif">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #01e675;">
                                                                <path d="M12.036 5.339c-3.635 0-6.591 2.956-6.593 6.589-.001 1.483.434 2.594 1.164 3.756l-.666 2.432 2.494-.654c1.117.663 2.184 1.061 3.595 1.061 3.632 0 6.591-2.956 6.592-6.59.003-3.641-2.942-6.593-6.586-6.594zm3.876 9.423c-.165.463-.957.885-1.337.942-.341.051-.773.072-1.248-.078-.288-.091-.657-.213-1.129-.417-1.987-.858-3.285-2.859-3.384-2.991-.099-.132-.809-1.074-.809-2.049 0-.975.512-1.454.693-1.653.182-.2.396-.25.528-.25l.38.007c.122.006.285-.046.446.34.165.397.561 1.372.611 1.471.049.099.083.215.016.347-.066.132-.099.215-.198.33l-.297.347c-.099.099-.202.206-.087.404.116.198.513.847 1.102 1.372.757.675 1.395.884 1.593.983.198.099.314.083.429-.05.116-.132.495-.578.627-.777s.264-.165.446-.099 1.156.545 1.354.645c.198.099.33.149.38.231.049.085.049.482-.116.945zm3.088-14.762h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-6.967 19.862c-1.327 0-2.634-.333-3.792-.965l-4.203 1.103 1.125-4.108c-.694-1.202-1.059-2.566-1.058-3.964.002-4.372 3.558-7.928 7.928-7.928 2.121.001 4.112.827 5.609 2.325s2.321 3.491 2.32 5.609c-.002 4.372-3.559 7.928-7.929 7.928z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                                                        @php
                                                            $fb = ($isMongo) ? $item['fbid'] : $item->fbid ;
                                                        @endphp
                                                        <a href="https://www.facebook.com/profile.php?id={{ $fb }}" target="_blank"><span class="font-semibold mr-2 text-left flex-auto">Ir al Perfil</span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                        {{-- {{ $data->links() }} --}}
                                        Mostrando {{ $perPage }} de 17.025.429 resultados
                                    </div>
                                </div>
                            @else
                                <div class="bg-white px-4 py-3 border-t border-gray-500 sm:px-6">
                                    No hay resultados para la búsqueda
                                    @if($searchName) Nombre: {{$searchName}},@endif
                                    @if($searchLast) Apellido: {{$searchLast}},@endif
                                    @if($searchLocation) Ubicación: {{$searchLocation}},@endif
                                    @if($searchCity) Ciudad: {{$searchCity}},@endif
                                     en la página {{ $page }} al mostrar {{ $perPage }} por página
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
