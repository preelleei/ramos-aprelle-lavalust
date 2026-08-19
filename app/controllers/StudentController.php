<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function student_data()
    {
        $session = load_class('session', 'libraries');

        $defaults = [
            'student_id'        => 'MCC2024-00262',
            'name'              => 'APRELLE JOY RAMOS',
            'course'            => 'BS Information Technology',
            'year'              => 'III',
            'section'           => 'F6',
            'email'             => 'aprellejoyramos@gmail.com',
            'address'           => 'Parang, Calapan City',
            'contact'           => '09705958089',
            'skills'            => 'Web Development, Database, UI/UX Design',
            'hobbies'           => 'Music, Watching Movies, Art',
            'description'       => 'An Information Technology 3rd Year student in Mindoro State University - Calapan Campus',
            'instagram'         => 'https://www.instagram.com/preelleei/',
            'facebook'          => 'https://www.facebook.com/prelllleee/',
            'tiktok'            => 'https://www.tiktok.com/@st.rawb.ellie'
        ];

        $saved = $session->userdata('student_profile');

        if (is_array($saved)) {
            return array_merge($defaults, $saved);
        }

        return $defaults;
    }

    public function index()
    {
        $session = load_class('session', 'libraries');
        $session->set_userdata('student_access', true);

        $this->call->view('student/home', [
            'student' => $this->student_data()
        ]);
    }

    public function profile()
    {
        $session = load_class('session', 'libraries');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profile = [
                'address'     => trim($_POST['address'] ?? ''),
                'contact'     => trim($_POST['contact'] ?? ''),
                'skills'      => trim($_POST['skills'] ?? ''),
                'hobbies'     => trim($_POST['hobbies'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'instagram'   => trim($_POST['instagram'] ?? ''),
                'facebook'    => trim($_POST['facebook'] ?? ''),
                'tiktok'      => trim($_POST['tiktok'] ?? '')
            ];

            $session->set_userdata('student_profile', $profile);
            $session->set_flashdata('profile_saved', 'Profile saved successfully.');

            redirect('student/profile');
            return;
        }

        $this->call->view('student/profile', [
            'student' => $this->student_data(),
            'saved_message' => $session->flashdata('profile_saved')
        ]);
    }
}
