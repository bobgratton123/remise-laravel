<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use App\Models\Etudiant;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:191',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ]);

        $user = new User;
        $user->fill($request->all()); // insert into user (username, password) Values ('m@g.co', 123456)
        $user->password = Hash::make($request->password); //insert into user (username, password) Values ('m@g.co', alkjhklAJRH;AKR'KHKHKHLKW'LKJJL'KY'K)
        $user->save();

        $etudiant = New Etudiant;
        $etudiant->users_id = $user->id;
        $etudiant->etudiant_nom = $user->name;
        $etudiant->adresse = $request->adresse;
        $etudiant->phone = $request->phone;
        $etudiant->email = $request->email;
        $etudiant->date_de_naissance = $request->date_de_naissance;
        $etudiant->villes_idvilles = 1;

        $etudiant->save();

        return redirect(route('login'))->withSuccess('Felicitation !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                ->withErrors(trans('auth.failed'));
        endif;        

        // select count(*) from user where username = ?
        // 0 errors  (== 1  bon) >1 errors
        // mot de passe = hash.saisit == mot passe enregistre
        // SESSION 

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect(route('login'));
    }

    public function dashboard(){
        $name = "Guest";
        if(Auth::check()){
            $name = Auth::user()->name;
        }
        return view('blog.dashboard', ['name' => $name]);
    }
}
