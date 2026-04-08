@extends('layouts.app')

@section('content')
<div class="mx-auto mt-10 max-w-md rounded-2xl bg-white p-8 shadow-xl">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-slate-800">Student Login</h1>
        <p class="mt-2 text-slate-500">Access your enrollment portal</p>
    </div>

    <form action="/login" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('username') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Password</label>
            <input type="password" name="password" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="flex-1 rounded-xl bg-blue-600 px-6 py-3 font-medium text-white hover:bg-blue-700">
                Login
            </button>
            <a href="/register" class="flex-1 rounded-xl bg-slate-600 px-6 py-3 text-center font-medium text-white hover:bg-slate-700">
                Register
            </a>
        </div>
    </form>
</div>
@endsection