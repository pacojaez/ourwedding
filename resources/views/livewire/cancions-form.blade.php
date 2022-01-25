<div class="flex flex-col items-center w-full min-h-screen antialiased sans-serif">
	<div class="w-full max-w-full px-4 pt-4 pb-8 mx-auto overflow-hidden">
		<div x-data="{ loading: false, showAlertMessage: false, showSuccessMessage: false, title: '', author: '', errors: [] }"
			x-cloak>
			<div class="md:flex md:flex-wrap">
				<div class="md:w-full md:mx-auto">
					<div class="p-6 bg-white border-t-8 border-green-900 rounded shadow opacity-100">
						<h1 class="mb-1 text-2xl font-bold leading-tight text-gray-800">Mandanos tus sugerencias</h1>
						<p class="mb-4 text-lg text-gray-600">Rellena este formulario con las canciones que quieres añadir</p>
                        {{-- <p class="m-2 text-sm font-bold leading-none text-green-900 xl:text-lg font-abhaya-libre">
                            Rellena este formulario con las canciones que quieres añadir
                        </p> --}}
                        <form wire:submit.prevent="saveCancion" >
                            @csrf
                            <div class="mb-4">
								<label for="title" class="block mb-1 font-bold text-gray-700">Título de la canción</label>
								<div class="relative flex flex-col">
                                    <input type="text" wire:model="title">
                                    @error('title') <span class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                                                            x-transition:enter="transition ease-out duration-300"
                                                            x-transition:enter-start="opacity-0 transform scale-90"
                                                            x-transition:enter-end="opacity-100 transform scale-100"
                                                            x-transition:leave="transition ease-in duration-300"
                                                            x-transition:leave-start="opacity-100 transform scale-100"
                                                            x-transition:leave-end="opacity-0 transform scale-90">
                                                        {{ $message }}
                                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
								<label for="author" class="block mb-1 font-bold text-gray-700">Autor o Intérprete</label>
								<div class="relative flex flex-col">
                                    <input type="text" wire:model="author">
                                    @error('author') <span class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                                                            x-transition:enter="transition ease-out duration-300">
                                                        {{ $message }}
                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-green-900 rounded-lg hover:bg-green-700">
                                Guardar Cancion
                            </button>
                        </form>

						{{-- <div x-show="showAlertMessage" x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0 transform scale-90"
							x-transition:enter-end="opacity-100 transform scale-100"
							x-transition:leave="transition ease-in duration-300"
							x-transition:leave-start="opacity-100 transform scale-100"
							x-transition:leave-end="opacity-0 transform scale-90">
							<div class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
								role="alert">
								<p>Uppps! Hay algo que no está bien</p>
							</div>
						</div> --}}

						{{-- <div x-show="showSuccessMessage" x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0 transform scale-90"
							x-transition:enter-end="opacity-100 transform scale-100"
							x-transition:leave="transition ease-in duration-300"
							x-transition:leave-start="opacity-100 transform scale-100"
							x-transition:leave-end="opacity-0 transform scale-90">
							<div class="p-4 my-4 text-green-700 bg-green-100 border-l-4 border-green-500"
								role="success">
								<p>Gracias por las canciones, las pondremos!</p>
							</div>
						</div> --}}

						{{-- <form
                            method="POST"
                            wire:submit.prevent="saveCancion"
                            action="{{ route('saveCancion') }}"
                            >
                        @csrf

							<div class="mb-4">
								<label for="title" class="block mb-1 font-bold text-gray-700">Título</label>
								<div class="relative">
									<input id="title" wire:model='title'
                                        name="title"
										class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
										type="text" placeholder="por ejemplo, SHOW MUST GO ON" />
                                        @error('title') <span class="error">{{ $message }}</span> @enderror
								</div>

							</div>

							<div class="mb-5">
								<label for="email" class="block mb-1 font-bold text-gray-700">Autor</label>
								<div class="relative">
									<input id="author" wire:model='author'
                                        name="author"
										class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
										type="text" placeholder="por ejemplo, QUEEN" />
                                        @error('author') <span class="error">{{ $message }}</span> @enderror
								</div>
							</div>
							<button type="submit"
								class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700"
								x-bind:disabled="loading == true"
                                >
                                <div>
									<div>ENVIAR!</div>
								</div>
							</button>
						</form> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="w-full max-w-full px-4 pt-4 pb-8 mx-auto overflow-hidden">
        @livewire('all-cancions')
    </div>
</div>
