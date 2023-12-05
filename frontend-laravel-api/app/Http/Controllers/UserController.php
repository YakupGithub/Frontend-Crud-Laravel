<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $token=session('token');
        if($token){
            $response = Http::withToken(
                session('token')
            )->get('http://host.docker.internal/api/form');
        $forms = $response->json();
        return view('user.index', ['forms' => $forms]);
        }
        else{
            return redirect()->route('user.login')
            ->with('error','Unauthenticated');
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
        $token=session('token');
        if($token){
            $response = Http::withToken(
                session('token')
            )->post('http://host.docker.internal/api/form/create',[
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email]
            );
        return redirect()->route('user.index')->with('success', 'Ürün başarıyla eklendi.');;

        }
        else {
            return redirect()->route('user.login');
        }
    }

    public function edit($form) {
        $token=session('token');
        if($token){
            $response = Http::withToken(session('token'))->get
            ('http://host.docker.internal/api/form/edit/' . $form);
            $user = $response->json();
            return view('user.edit', ['user' => $user]);
        }
        else {
            return redirect()->route('user.login');
        }
    }
    
    public function update($form, Request $request) {
        $token=session('token');
        if($token){
            $response = Http::withToken(session('token'))->put
            ('http://host.docker.internal/api/form/update/' . $form, [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);
        return redirect()->route('user.index')->with('success', 'Güncelleme başarıyla gerçekleştirildi.');
    }
    else{
        return redirect()->route('user.login');
    }
    }
    
    public function destroy($id) {
        $token=session('token');
        if($token){
            $response = Http::withToken(session('token'))->delete
            ('http://host.docker.internal/api/form/delete/' . $id);
            return redirect()->route('user.index')->with('success', 'Kullanıcı başarıyla silindi.');
        }
        else {
            return redirect()->route('user.login');
        }
    }
    public function signup() {
        return view('user.register');
    }
    public function register(Request $request) {
        $response = Http::post('http://host.docker.internal/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
    
        $responseData = $response->json();
    
        if (isset($responseData['error'])) {
            return redirect()->route('user.register')->with('error', 'Şifre kısımları hatalıdır!');
        }
    }
    
    public function loginpage() {
        return view('user.login');
    }

    public function login(Request $request) {
        $response = Http::post('http://host.docker.internal/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        $jsonData = $response->json();
    
        if ($jsonData['status'] == 1) {
            session(['token' => $jsonData['token']]);
            return redirect()->route('user.index')->with('success', 'Giriş Başarılı Hoşgeldiniz!');
        } else {
            return redirect('login')->with(['status' => $jsonData['status'],
            'error' => 'Giriş başarısız! Lütfen bilgilerinizi kontrol edin.']);
        }
    }
    
    public function logout(Request $request) {
        $response = Http::withToken(
            session('token')
        )->post(    
            'http://host.docker.internal/api/logout',
           
        )->json();
        session(['token'=>'']);  
        return redirect()->route('user.login')
        ->with('success','Çıkış yapıldı! Ürünleri görmek için giriş yapın.');
            return redirect('login');
    }    
}
