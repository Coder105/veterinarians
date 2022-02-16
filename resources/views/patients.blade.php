<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients') }}
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
					@if (count($patients) > 0)
					<div class="py-2">
						<span class="lg:px-8">Current Patients</span>
						<a href="{{ route('patient.add') }}" class="btn btn-default">
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
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Species</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Color</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Date of Birth</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Owner</th>
										<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($patients as $patient)
									<tr class="border-b">
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $patient->name }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $patient->species }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $patient->color }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ date('m/d/Y', strtotime($patient->dob)) }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											{{ $patient->first_name }} {{ $patient->last_name }}
										</td>
										<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
											<a style="color:black" href="{{ route('patient.edit', ['id' => $patient->patient_id]) }}">
												<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
												  Edit
												</button>
											</a>
											<a style="color:black" href="{{ route('patient.delete', ['id' => $patient->patient_id]) }}">
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
				@else
				<div class="py-2">
					There Are No Patients Currently
				</div>
				@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>