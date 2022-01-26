<x-slot name="header">
    <h2> Manage Appointments </h2>

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
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            @if($isBukas)
            @include('livewire.viewappointment')
            @endif

            

            <a href="{{ route('pdf.generateHospStaffAppointment') }}" class="float-right bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 px-4 my-3 fa fa-download"> Download Appointments </a>
            <input type="text" class="bg-white hover:bg-white text-blue-900 float-right py-2 rounded my-3" placeholder=" Search... " wire:model="searchTerm" />
            @if($isOpen)
            @include('livewire.adminappointmentcreate')
            @endif

            <div class="table-responsive">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-900">
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell w-8">Appointment ID</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Patient Name</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Email</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Hospital</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell w-8">Hospital ID</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell w-8">Appointment Date</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell w-8">Appointment Time</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Status</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Appointment ID</span>{{ $appointment->id }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Patient Name</span>{{ $appointment->name }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Email</span>{{ $appointment->email}}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Hospital</span>{{ $appointment->hospital_name }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Hospital ID</span>{{ $appointment->hospital_id }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Appointment Date</span>{{ $appointment->appoint_date}}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Appointment Time</span>{{ $appointment->appoint_time}}</td>


                            @if($appointment->status === 'Pending')
                            <td class="bg-yellow-200 font-extrabold w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Status</span>{{ $appointment->status }}</td>
                            @elseif($appointment->status === 'Approved')
                            <td class="bg-green-400 font-extrabold w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Status</span>{{ $appointment->status }}</td>
                            @elseif($appointment->status === 'Rejected')
                            <td class="bg-red-400 font-extrabold w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Status</span>{{ $appointment->status }}</td>
                            @endif



                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"><span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Action</span>


                                <button wire:click="edit({{ $appointment->id }})" class="bg-blue-800 hover:bg-blue-500 text-white py-2 px-4 rounded fa fa-pencil-square-o"> Manage</button>
                                <button wire:click="view({{ $appointment->id }})" class="bg-yellow-400 hover:bg-yellow-200 text-black hover:text-black py-2 px-4 rounded fa fa-eye"> View </button>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br>
            {{ $appointments->links()}}
        </div>
    </div>
</div>