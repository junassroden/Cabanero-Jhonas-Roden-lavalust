<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        session_start();

        $_SESSION['student_access'] = true;

        $student = [
            'student_id' => '2026-0001',
            'name' => 'Jhonas Cabanero',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'A',
            'email' => 'jhonas@example.com'
        ];

        $this->call->view('student/index', ['student' => $student]);
    }

    public function profile()
    {
        session_start();

        $student = [
            'student_id' => '2026-0001',
            'name' => 'Jhonas Cabanero',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'A',
            'email' => 'jhonas@example.com'
        ];

        $this->call->view('student/profile', ['student' => $student]);
    }
}