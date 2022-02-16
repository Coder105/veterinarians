<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					@if(Session::has('success'))
						<div class="alert alert-success">
							{{ Session::get('success') }}
							@php
								Session::forget('success');
							@endphp
						</div>
					@endif
					@if (count($owners) > 0)
					<div class="py-2">
						<span class="lg:px-8">Current Owners</span>
						<a href="{{ route('owner.add') }}" class="btn btn-default">
						 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
						   Add New
					     </button>
						</a>
					</div>
		 
					<div class="flex flex-col">
					  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="py-2 inline-block min-w-full">
						  <div class="overflow-hidden">
							<table class="min-w-full">
								<thead class="border-b">
									<tr>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
										First
										</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
										Last
										</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
										Phone Number
										</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($owners as $owner)
									<tr class="border-b">
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $owner->first_name }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $owner->last_name }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $owner->phone_number }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											<a style="color:black" href="{{ route('owner.edit', ['id' => $owner->owner_id]) }}">
												<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
												  Edit
												</button>
											</a>
											<a style="color:black" href="{{ route('owner.delete', ['id' => $owner->owner_id]) }}">
												<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
												  Delete
												</button>
											</a>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					  </div>
					 </div>
					</div>
				@else
				<div class="py-2">
					<span class="lg:px-8">There Are No Owners Currently</span>
					<a href="{{ route('owner.add') }}">
					 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
					   Add New
					 </button>
					</a>
				</div>
				@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>