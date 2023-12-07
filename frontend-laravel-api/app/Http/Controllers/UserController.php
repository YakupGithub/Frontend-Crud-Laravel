<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $apiUrl = env('API_URL');
    
        $token = session('token');
        if ($token) {
            $response = Http::withToken($token)->get($apiUrl . 'form');
            $forms = $response->json();
            
            if ($response->successful()) {
                return view('user.index', ['forms' => $forms]);
            } else {
                $errorMessage = $response->json()['error'] ?? 'HATA!';
                return redirect()->route('user.login')->with('error', $errorMessage);
            }
        } else {
            return redirect()->route('user.login');
        }
    }

    public function create() {
        $token=session('token');
        if($token){
            return view('user.create');
        }
        else{
            return redirect()->route('user.login');
        }
    }

    public function store(Request $request) {
        $apiUrl = env('API_URL');
    
        $token = session('token');
        if ($token) {
            $response = Http::withToken($token)->post($apiUrl . 'form/create/', [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
            ]);
    
            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', $response->json('message'));
            } else {
                $errorMessage = $response->json()['error'] ?? 'HATA!';
                return redirect()->route('user.index')->with('error', $errorMessage);
            }
        } else {
            return redirect()->route('user.login');
        }
    }

    public function edit($form) {
        $apiUrl = env('API_URL');

        $token=session('token');
        if($token){
            $response = Http::withToken(session('token'))->get
            ($apiUrl . 'form/edit/' . $form);
            $user = $response->json();
            return view('user.edit', ['user' => $user]);
        }
        else {
            return redirect()->route('user.login');
        }
    }
    
    public function update($form, Request $request) {
        $apiUrl = env('API_URL');
    
        $token = session('token');
        if ($token) {
            $response = Http::withToken($token)->put($apiUrl . 'form/update/' . $form, [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
            ]);
    
            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', $response->json('message'));
            } else {
                $errorMessage = $response->json()['error'] ?? 'HATA!';
                return redirect()->route('user.index')->with('error', $errorMessage);
            }
        } else {
            return redirect()->route('user.login');
        }
    }
    
    
    public function destroy($id) {
        $apiUrl = env('API_URL');
    
        $token = session('token');
    
        if ($token) {
            $response = Http::withToken($token)->delete($apiUrl . 'form/delete/' . $id);
    
            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', $response->json('message'));
            } else {
                $errorMessage = $response->json()['error'] ?? 'HATA!';
                return redirect()->route('user.index')->with('error', $errorMessage);
            }
        } else {
            return redirect()->route('user.login');
        }
    }
    
    public function signup() {
        return view('user.register');
    }
    public function register(Request $request) {
        $apiUrl = env('API_URL');
    
        $response = Http::post($apiUrl . 'register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
    
        $responseData = $response->json();
    
        if ($responseData['status'] == 0) {
            return redirect()->route('user.register')->with('error', $responseData['error']);
        } else {
            return redirect()->route('user.login')->with('success', $responseData['message']);
        }
    }
    
    public function loginpage() {
        return view('user.login');
    }

    public function login(Request $request) {
        $apiUrl = env('API_URL');
    
        $response = Http::post($apiUrl . 'login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        $jsonData = $response->json();
    
        if ($jsonData['status'] == 1) {
            session(['token' => $jsonData['token']]);
            return redirect()->route('user.index')->with('success', $jsonData['message']);
        } else {
            return redirect('login')->with(['status' => $jsonData['status'], 'error' => $jsonData['message']]);
        }
    }
    
    public function logout(Request $request) {
        $apiUrl = env('API_URL');
    
        $response = Http::withToken(session('token'))->post($apiUrl . 'logout');
    
        session(['token' => '']);
    
        if ($response->successful()) {
            $successMessage = $response->json('message');
            return redirect()->route('user.login')->with('success', $successMessage);
        } else {
            $errorMessage = $response->json('message');
            return redirect()->route('user.login')->with('error', $errorMessage);
        }
    }
    
}
