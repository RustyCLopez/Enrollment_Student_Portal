@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto rounded-2xl bg-white p-8 shadow-xl">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-slate-800">Student Registration</h1>
        <p class="mt-2 text-slate-500">Create your enrollment portal account</p>
    </div>

    <form action="/register" method="POST" class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @csrf

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Student No</label>
            <input type="text" name="student_no" value="{{ old('student_no') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('student_no') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('first_name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Middle Name</label>
            <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('middle_name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('last_name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Birthdate</label>
            <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('birthdate') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Gender</label>
            <select name="gender" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-1 block text-sm font-semibold text-slate-700">Address</label>
            <textarea name="address" rows="3" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">{{ old('address') }}</textarea>
            @error('address') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Course</label>
            <input type="text" name="course" value="{{ old('course') }}" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
            @error('course') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="mb-1 block text-sm font-semibold text-slate-700">Year Level</label>
            <select name="year_level" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
                <option value="">Select Year Level</option>
                <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
            </select>
            @error('year_level') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
        </div>

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

        <div class="md:col-span-2">
            <label class="mb-1 block text-sm font-semibold text-slate-700">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-blue-500 focus:outline-none">
        </div>

        <div class="flex gap-3 pt-2 md:col-span-2">
            <button type="submit" class="rounded-xl bg-blue-600 px-6 py-3 font-medium text-white hover:bg-blue-700">
                Register
            </button>
            <a href="/login" class="rounded-xl bg-slate-600 px-6 py-3 font-medium text-white hover:bg-slate-700">
                Login
            </a>
        </div>
    </form>
</div>
@endsection