<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Reported Issues
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-700">Track Your Reports</h3>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">IP Address</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Issue Description</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Network Team Note</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tickets as $ticket)
                            <tr>
                                <td class="px-6 py-4 text-sm font-mono text-gray-900 font-semibold">
                                    {{ $ticket->ip_address }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $ticket->description }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-bold rounded-full 
                                        {{ $ticket->status == 'Open' ? 'bg-red-100 text-red-800' : '' }}
                                        {{ $ticket->status == 'In Progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $ticket->status == 'Resolved' ? 'bg-green-100 text-green-700' : '' }}">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm italic text-blue-700">
                                    {{ $ticket->admin_note ?? 'No feedback yet' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($tickets->isEmpty())
                    <p class="mt-4 text-center text-gray-500 text-sm italic">Aap ne abhi tak koi issue report nahi kiya.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>