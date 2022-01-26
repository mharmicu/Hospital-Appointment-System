<x-slot name="header">
    <h2> View Users </h2>
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

            @if($isOpen)
            @include('livewire.admin.changeusertype')
            @endif

            @if($isBukas)
            @include('livewire.admin.viewuserinfo')
            @endif

            @if($isAssignHospitalModalOpen)
            @include('livewire.admin.admin-assign-hospital')
            @endif

            <a href="{{ route('pdf.generateUsers') }}" class="float-right bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 px-4 my-3 fas fa-file"> Download Users </a>

            <input type="text" class="bg-white hover:bg-white text-blue-900 float-right py-2 rounded my-3" placeholder=" Search... " wire:model="searchTerm" />

            <div class="table-responsive">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-900">
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">User ID</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Name</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Email</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">User Type</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Assigned Hospital</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Hospital ID</th>
                            <th class="p-3 font-bold uppercase bg-blue-900 text-gray-200 border border-gray-300 hidden lg:table-cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="bg-green-100 lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">User ID</span>{{ $user->id }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Name</span>{{ $user->name }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Email</span>{{ $user->email}}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">User Type</span>{{ $user->usertype }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Assigned Hospital</span>{{ $user->hospital_name }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Hospital ID</span>{{ $user->hospital_id }}</td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"> <span class="lg:hidden absolute top-0 left-0 bg-blue-900 text-white px-2 py-1 text-xs font-bold uppercase">Action</span>
                                <button wire:click="view({{ $user->id }})" class="bg-green-700 hover:bg-green-500 text-white py-2 px-4 rounded">View</button>
                                <button wire:click="edit({{ $user->id }})" class="bg-yellow-400 hover:bg-yellow-300 text-white py-2 px-4 rounded">Change User Type</button>
                                <button wire:click="assignHospital({{ $user->id }})" class="bg-indigo-600 hover:bg-indigo-400 text-white py-2 px-4 rounded">Assign Hospital</button>
                                <button wire:click="delete({{ $user->id }})" class="bg-red-700 hover:bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br>
            {{ $users->links()}}
        </div>
    </div>
</div>