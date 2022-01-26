<x-slot name="header">
    <h2> List of Available Hospital </h2>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <style>
        h2 {
            color: #FFFFFF;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 23px;


        }





        header {
            background-color: #8ED6EA;
        }

        input[type=search] {
            background-color: #8CD1E6;
            border-color: #C9EAF3;
            font-family: Serief;
        }
    </style>

</x-slot>
<div class="bg-blue-200 py-12">
    <div class="bg-blue-200 max-w-9xl mx-auto sm:px-6 lg:px-10">
        <div class="bg-blue-100 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message-appointment'))
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message-appointment') }}</p>
                    </div>
                </div>
            </div>
            @endif

            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif


            <a href="{{ route('maps') }}" :active="request()->routeIs('maps')" class="bg-blue-500 hover:bg-teal-500 text-white font-bold py-3 px-6 my-3 fa fa-map-marker"> Google Map </a>
            <a href="{{ route('pdf.generateHospitals') }}" class="float-right bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 px-4 my-3 fa fa-download"> Generate PDF </a>
            <input type="text" class="bg-blue-50 hover:bg-white text-blue-900 float-right py-2 rounded my-3" placeholder=" Search... " wire:model="searchTerm" />

            @if($isOpen)
            @include('livewire.hospitalcreate')
            @endif


            <div class="table-responsive">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-900">
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Hospital ID</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Hospital Name</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Address</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Contact No.</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Available Beds</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hospitals as $hospital)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Hospital ID</span>{{ $hospital->id }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Hospital Name</span>{{ $hospital->name }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Address</span>{{ $hospital->address}}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Contact No.</span>{{ $hospital->contactnumber }}</td>


                            @if($hospital->beds < 10)
                            <td class="bg-red-400 font-extrabold w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Available Beds</span>{{ $hospital->beds}}</td>
                            @elseif($hospital->beds > 10)
                            <td class="bg-green-300 font-extrabold w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Available Beds</span>{{ $hospital->beds}}</td>
                            @elseif($hospital->beds = 10)
                            <td class="bg-red-400 font-extrabold w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Available Beds</span>{{ $hospital->beds}}</td>
                            @endif

                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Action</span>
                                <button onclick="confirm('Are you sure you want to apply an appointment?') || event.stopImmediatePropagation()" wire:click="addAppointment({{ $hospital->id }})" class="bg-blue-900 hover:bg-blue-500 text-white py-2 px-4 rounded fa fa-plus"> Apply Appointment</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br>
            {{ $hospitals->links()}}

        </div>
    </div>
</div>