<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Team Settings') }}
        </h2>
    </x-slot>
    {{-- <x-slot name="content"> --}}
    <div class="flex flex-col items-center py-4 sm:w-1/2 xl:w-full sm:py-6">
        <h2 class="m-2 p-2 text-lg font-bold leading-none text-green-900 shadow-lg xl:text-xl font-abhaya-libre">
            Este es el menú, esperamos que os guste:
        </h2>
        {{-- <h4 class="m-2 text-lg font-bold leading-none text-green-900 shadow-lg xl:text-xl font-abhaya-libre">
            Intolerancias, alergias u otras cuestiones relativas a la comida
        </h4>
        <h4 class="m-2 text-lg font-bold leading-none text-green-900 shadow-lg xl:text-xl font-abhaya-libre">
           Estamos a tiempo de recibir tus sugerencias
        </h4> --}}
        <div class="">
            <ul class="flex flex-row flex-wrap shadow">
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Cóctel de cava</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Xips de verdures</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Olives</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Daus de meló amb tonyina fumada</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Pernil tallat a la vista</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bufet d’assortit d’embotits</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bufet d’assortit de formatges</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Ous farcits de tonyina</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Tartaleta de pasta de full amb enciam i ou de guatlla</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Sàndvitx de sobrassada amb mel</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Truita d’espàrrecs verds amb gambes</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Canapè de poma caramelitzada amb foie</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Dàtils amb bacó</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Calamars a la romana</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Croquetes</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Pop a la brasa amb all i julivert</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Brotxeta de rap amb verdures</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Caneló d’ànec trufat</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bufet d’arrossos- risotto, paella i arròsnegre-</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Vermut, refrescos, aigua i cava</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Vi Blanc Els Secrets del Mar - D.O.TerraAlta</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Vi Negre Els Nanos - D.O. Conca de Barberà</li>
            </ul>

        </div>

    </div>
{{-- </x-slot> --}}
</x-app-layout>
