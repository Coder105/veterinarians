<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Owner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					@if ($errors->any())
						<div class="py-6 alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				   <form action="{{ route('owner.create') }}" method="POST" class="w-full max-w-lg">
					  @csrf
					  <div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
							First Name
						  </label>
						  <input name="first_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="Jane">
						</div>
						<div class="w-full md:w-1/2 px-3">
						  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
							Last Name
						  </label>
						  <input name="last_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
						</div>
					  </div>
					  <div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
						  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
							Phone Number
						  </label>
						  <input name="phone_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-phone" type="text" placeholder="###-###-####">
						</div>
					  </div>
					  <div class="flex flex-wrap -mx-3 mb-6">
					    <div class="w-full px-3">
						 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
						  Add
					     </button>
						 <a href="{{ route('owners') }}">
						  <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
						   Cancel
					      </button>
						 </a>
						</div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>