<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    private function logEvent($event, $description, $studentId = null)
    {
        DB::table('system_logs')->insert([
            'student_id'  => $studentId,
            'event'       => $event,
            'description' => $description,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }

    public function showRegister()
    {
        $this->logEvent('View Register Page', 'User opened the registration page.');
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'student_no'   => 'required|unique:students,student_no',
            'first_name'   => 'required',
            'middle_name'  => 'nullable',
            'last_name'    => 'required',
            'birthdate'    => 'required|date',
            'gender'       => 'required',
            'email'        => 'required|email|unique:students,email',
            'phone'        => 'required',
            'address'      => 'required',
            'course'       => 'required',
            'year_level'   => 'required',
            'username'     => 'required|unique:students,username',
            'password'     => 'required|min:6|confirmed',
        ]);

        $studentId = DB::table('students')->insertGetId([
            'student_no'   => $request->student_no,
            'first_name'   => $request->first_name,
            'middle_name'  => $request->middle_name,
            'last_name'    => $request->last_name,
            'birthdate'    => $request->birthdate,
            'gender'       => $request->gender,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'course'       => $request->course,
            'year_level'   => $request->year_level,
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $this->logEvent('Registration', 'Student registered successfully.', $studentId);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function showLogin()
    {
        $this->logEvent('View Login Page', 'User opened the login page.');
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $student = DB::table('students')
            ->where('username', $request->username)
            ->first();

        if ($student && Hash::check($request->password, $student->password)) {
            Session::put('student_id', $student->id);
            Session::put('student_name', $student->first_name . ' ' . $student->last_name);

            $this->logEvent('Login Success', 'Student logged in successfully.', $student->id);

            return redirect('/dashboard');
        }

        $this->logEvent('Login Failed', 'Failed login attempt for username: ' . $request->username);

        return back()->with('error', 'Invalid username or password.');
    }

    public function dashboard()
    {
        if (!Session::has('student_id')) {
            $this->logEvent('Unauthorized Dashboard Access', 'Guest tried to access dashboard.');
            return redirect('/login')->with('error', 'Please login first.');
        }

        $student = DB::table('students')
            ->where('id', Session::get('student_id'))
            ->first();

        $this->logEvent('View Dashboard', 'Student viewed dashboard.', $student->id);

        return view('dashboard', compact('student'));
    }

    public function showEditProfile()
    {
        if (!Session::has('student_id')) {
            $this->logEvent('Unauthorized Edit Profile Access', 'Guest tried to access edit profile.');
            return redirect('/login')->with('error', 'Please login first.');
        }

        $student = DB::table('students')
            ->where('id', Session::get('student_id'))
            ->first();

        $this->logEvent('View Edit Profile', 'Student opened edit profile page.', $student->id);

        return view('edit-profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        if (!Session::has('student_id')) {
            $this->logEvent('Unauthorized Profile Update', 'Guest tried to update profile.');
            return redirect('/login')->with('error', 'Please login first.');
        }

        $studentId = Session::get('student_id');

        $request->validate([
            'student_no'   => 'required|unique:students,student_no,' . $studentId,
            'first_name'   => 'required',
            'middle_name'  => 'nullable',
            'last_name'    => 'required',
            'birthdate'    => 'required|date',
            'gender'       => 'required',
            'email'        => 'required|email|unique:students,email,' . $studentId,
            'phone'        => 'required',
            'address'      => 'required',
            'course'       => 'required',
            'year_level'   => 'required',
            'username'     => 'required|unique:students,username,' . $studentId,
        ]);

        DB::table('students')
            ->where('id', $studentId)
            ->update([
                'student_no'   => $request->student_no,
                'first_name'   => $request->first_name,
                'middle_name'  => $request->middle_name,
                'last_name'    => $request->last_name,
                'birthdate'    => $request->birthdate,
                'gender'       => $request->gender,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'address'      => $request->address,
                'course'       => $request->course,
                'year_level'   => $request->year_level,
                'username'     => $request->username,
                'updated_at'   => now(),
            ]);

        $this->logEvent('Profile Update', 'Student updated profile.', $studentId);

        return redirect('/dashboard')->with('success', 'Profile updated successfully.');
    }

    public function logs()
    {
        if (!Session::has('student_id')) {
            $this->logEvent('Unauthorized Logs Access', 'Guest tried to access logs page.');
            return redirect('/login')->with('error', 'Please login first.');
        }

        $this->logEvent('View Logs', 'Student viewed logs page.', Session::get('student_id'));

        $logs = DB::table('system_logs')
            ->leftJoin('students', 'system_logs.student_id', '=', 'students.id')
            ->select(
                'system_logs.*',
                'students.first_name',
                'students.last_name',
                'students.username'
            )
            ->orderBy('system_logs.id', 'desc')
            ->get();

        return view('logs', compact('logs'));
    }

    public function logout()
    {
        if (Session::has('student_id')) {
            $this->logEvent('Logout', 'Student logged out.', Session::get('student_id'));
        }

        Session::flush();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}