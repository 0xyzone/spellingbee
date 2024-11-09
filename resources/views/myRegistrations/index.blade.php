<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($registrations->count() == 0)
                    <p>No Registrations recorded!</p>
                    @else
                    <table class="w-full text-center">
                        <thead class="bg-honey text-neutral-900 rounded-t-lg">
                            <th class="rounded-tl-lg">Reg. No.</th>
                            <th>Event Name</th>
                            <th>Registration Status</th>
                            <th class="rounded-tr-lg">Payment Status</th>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $reg)
                            <tr class="even:bg-slate-500 odd:bg-slate-600">
                                <td class="py-2">{{ $reg->id }}</td>
                                <td>{{ $reg->event->name }}</td>
                                <td class="capitalize">{{ $reg->status }}</td>
                                {{-- <td>{{ $reg->payments->where('registration_id', $reg->id)->status ?? "N/a" }}</td> --}}
                                <td class="capitalize">{{ $reg->payments->where('registration_id', $reg->id)->first()->status ?? "Pending" }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $registrations->links() }}
    </div>
</x-app-layout>
