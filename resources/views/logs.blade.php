@extends('layouts.app')

@section('content')
<div class="rounded-2xl bg-white p-8 shadow-xl">
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">System Logs</h1>
            <p class="mt-1 text-slate-500">All important system events are stored in the database</p>
        </div>

        <a href="/dashboard" class="w-fit rounded-lg bg-slate-700 px-5 py-2.5 font-medium text-white transition hover:bg-slate-800">
            Back to Dashboard
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full overflow-hidden rounded-lg border border-slate-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Student</th>
                    <th class="px-4 py-3 text-left">Username</th>
                    <th class="px-4 py-3 text-left">Event</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($logs as $log)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $log->id }}</td>
                        <td class="px-4 py-3">
                            {{ $log->first_name ? $log->first_name . ' ' . $log->last_name : 'Guest/User' }}
                        </td>
                        <td class="px-4 py-3">{{ $log->username ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $log->event }}</td>
                        <td class="px-4 py-3">{{ $log->description }}</td>
                        <td class="px-4 py-3">{{ $log->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">No logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection