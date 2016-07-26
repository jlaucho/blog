<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Laracasts\Flash\Flash;

use App\Http\Requests\UserRequest;

use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $user = User::orderBy('name', 'ASC')->paginate(6);
       return view('admin.user.index')->with('user', $user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       
       $user = new User($request->all());
       $user->password = bcrypt($user->password);
       $user->save();
       
       Flash::success("Se registro correctamente");     
       return redirect()->route('admin.user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->save();

        Flash::info('Se Actualizo correctamente');

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error('Se ha eliminado el usuario: '.$user->name);
        return redirect()->route('admin.user.index');
    }


    public function envioEmail(Request $request)
    {
        Mail::send('mails.registros', $data, function ($message) {
            //$message->from('john@johndoe.com', 'John Doe');
            //$message->sender('john@johndoe.com', 'John Doe');
        
            $message->to('jlaucho@gmail.com', 'Jesus Laucho');
        
            //$message->cc('john@johndoe.com', 'John Doe');
            //$message->bcc('john@johndoe.com', 'John Doe');
        
            //$message->replyTo('john@johndoe.com', 'John Doe');
        
            $message->subject('Prueba de Correo');
        
            //$message->priority(3);
        
            //$message->attach('pathToFile');
        });
    }
}
