<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $response = Http::get('http://host.docker.internal/api/form');
        $forms = $response->json();
        return view('user.index', ['forms' => $forms]);
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $response = Http::post('http://host.docker.internal/api/form/create',[
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email
        ]
    );
        return redirect()->route('user.index');
    }

    public function edit($form) {
        $response = Http::get('http://host.docker.internal/api/form/edit/' . $form);
        $user = $response->json();
        return view('user.edit', ['user' => $user]);
    }
    
    
    public function update($form, Request $request) {
        $response = Http::put('http://host.docker.internal/api/form/update/' . $form, [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);
        if ($response->successful()) {
            return redirect()->route('user.index')->with('success', 'Güncelleme başarıyla gerçekleştirildi.');
        } else {
            return redirect()->back()->with('error', 'Güncelleme başarısız!');
        }             
    }
    
    
    
    public function destroy($id)
    {
        $response = Http::delete('http://host.docker.internal/api/form/delete/' . $id);
        return redirect()->route('user.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
    
}
