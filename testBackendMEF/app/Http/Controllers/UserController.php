<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Excel;
use File;
use DB;

class UserController extends Controller{
  //Retorna vista de crear usuarios
  public function create(){
    return view('user');
  }

  //Crea el usuario mediante metodo POST
  public function created(Request $request){
    try{
      $user = new User();
      $user->createUser($request);
      return redirect('/list')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }
    catch(Exeption $e){
      return "Fatal error".$e->getMessage();
    }
  }

  //Retorna vista de actualizar usuario de acuerdo al id enviado
  public function update($id){
    $user = User::where('id_user', $id)
                  ->first();
        return view('update',compact('user'));
  }

  //Actualiza el usuario mediante metodo POST
  public function updateUser(Request $request){
    try{
      $user = new User();
      $user->updateUser($request);
      return redirect('/list')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
      //return $request;
    }
    catch(Exeption $e){
      return "Fatal error".$e->getMessage();
    }
  }

  //Lista todos los usuarios activos
  public function list(){
    $data = User::all()
                  ->where('state', 1);
    return view('list',compact('data'));
  }

  //Inactiva un usuario
  public function delete($id){
    $user = new User();
    $user->deleteUser($id);
    return redirect('/list')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
  }

  //Retorna vista del login
  public function login(){
    return view('login');
  }

  //Valida el usuario del login
  public function loginUser(Request $request){
    $data = User::all()
                  ->where('email', $request['email'])
                  ->first();
    if (password_verify($request['password'], $data['password'])) {
        return redirect('/list');
    } else {
        return redirect('/');
    }
  }

  //valida la información del perfil
  public function profile($id){
    $user = User::where('id_user', $id)
                  ->first();
        return view('profile',compact('user'));
  }

  public function import(Request $request){
    //validate the xls file
    $this->validate($request, array(
        'file'      => 'required'
    ));

    if($request->hasFile('file')){
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

            $path = $request->file->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
                    $insert[] = [
                    'name' => $value->name,
                    'email' => $value->email,
                    'phone' => $value->phone,
                    'role' => $value->role,
                    'password' => 2018,
                    'state' => 1,
                    ];
                }

                if(!empty($insert)){

                    $insertData = DB::table('users')->insert($insert);
                    if ($insertData) {
                        Session::flash('success', 'Your Data has successfully imported');
                    }else {
                        Session::flash('error', 'Error inserting the data..');
                        return back();
                    }
                }
            }

            return back();

        }else {
            Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
            return back();
        }
    }
}

    public function export(){
      $items = Item::all();
      Excel::create('items', function($excel) use($items) {
          $excel->sheet('ExportFile', function($sheet) use($items) {
              $sheet->fromArray($items);
          });
      })->export('xls');

    }

}
