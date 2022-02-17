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
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Olives farcides amb embolcall de seitó</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Guacamole amb bastonets de pa</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Pernil tallat a la vista</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bufet d’assortit d’embotits</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bufet d’assortit de formatges</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Canapé de salmó cruixent</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Canapé de mousse d´ànec</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Crestes de tonyina</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Llagostí arrebossat amb patates xips</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Canapé de poma caramelitzada amb foie</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Patates braves</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Verdures amb tempura</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Calamars a l´andalusa</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Croquetes</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bunyols de bacallà</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Pop a la brasa amb all i julivert</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Bufet d’arrossos- risotto o fideua, paella i arròs negre-</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Vermut, refrescos, aigua i cava</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Vi Blanc Pescador - D.O.Empordà</li>
                <li class="p-2 m-2 text-gray-800 bg-green-300 rounded-lg shadow-2xl shadow-gray-500">Vi Negre Els Nanos - D.O. Conca de Barberà</li>
            </ul>

        </div>

    </div>
{{-- </x-slot> --}}
</x-app-layout>
