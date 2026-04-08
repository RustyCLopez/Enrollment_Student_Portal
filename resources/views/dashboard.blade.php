@extends('layouts.app')

@section('content')
<div class="rounded-2xl bg-white p-8 shadow-xl">
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
            <p class="mt-1 text-slate-500">Welcome, {{ $student->first_name }} {{ $student->last_name }}</p>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="/edit-profile" class="rounded-xl bg-blue-600 px-5 py-3 font-medium text-white hover:bg-blue-700">Edit Profile</a>
            <a href="/logs" class="rounded-xl bg-slate-700 px-5 py-3 font-medium text-white hover:bg-slate-800">View Logs</a>
            <a href="/logout" class="rounded-xl bg-red-600 px-5 py-3 font-medium text-white hover:bg-red-700">Logout</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full overflow-hidden rounded-xl border border-slate-200">
            <tbody class="divide-y divide-slate-200">
                <tr><td class="w-1/3 bg-slate-50 px-4 py-3 font-semibold">Student No</td><td class="px-4 py-3">{{ $student->student_no }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">First Name</td><td class="px-4 py-3">{{ $student->first_name }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Middle Name</td><td class="px-4 py-3">{{ $student->middle_name }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Last Name</td><td class="px-4 py-3">{{ $student->last_name }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Birthdate</td><td class="px-4 py-3">{{ $student->birthdate }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Gender</td><td class="px-4 py-3">{{ $student->gender }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Email</td><td class="px-4 py-3">{{ $student->email }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Phone</td><td class="px-4 py-3">{{ $student->phone }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Address</td><td class="px-4 py-3">{{ $student->address }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Course</td><td class="px-4 py-3">{{ $student->course }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Year Level</td><td class="px-4 py-3">{{ $student->year_level }}</td></tr>
                <tr><td class="bg-slate-50 px-4 py-3 font-semibold">Username</td><td class="px-4 py-3">{{ $student->username }}</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection