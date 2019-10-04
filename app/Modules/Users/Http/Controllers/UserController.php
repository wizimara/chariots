<?php

namespace App\Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\User;
use Mail;
//use App\Modules\Users\Models\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Modules\Membership\Models\Individual;
use App\Modules\Membership\Models\Institution;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Mail\UserApprovalEmail;

class UserController extends Controller
{

use VerifiesEmails;
  public function __construct()
  {
    //  $this->middleware('auth');

  // Fetch the Site Settings object

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('id', 'desc')->get();
      return View::make('users::users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::orderBy('id', 'desc')->get();
      return View::make('users::users.create',compact('roles') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = Input::all();

   $validation = Validator::make($input,  array(
        'name' => 'required|max:255|unique:users',
   'email' => 'required|email|max:255|unique:users',
     'password' => 'required|min:7|confirmed',
'password_confirmation' => 'required|same:password'
   ));
   if ($validation->passes())
   {
     $user = new User;
     $user->name =$input['name'];
     $user->email =$input['email'];
     $user->password =bcrypt($input['password']);
     $user->role_id =$input['role'];
     $user->user_status =$input['user_status'];
     $user->save();
     $user->assignRole($input['role']);
// \LogActivity::addToLog('Created user '.$input['name'].'');
flash('User '.$input['name'].' Successfully Added.')->success()->important();
//if ($input['role']==2) {
//return Redirect('admin/users/activeclients');
//}elseif ($input['role']==3) {
//return Redirect('admin/users/systemusers');
//}
 return Redirect::route('users.index');
   }
flash($validation->errors())->error()->important();
   return Redirect::route('users.create')
       ->withInput()
       ->withErrors($validation)
       ->with('message', 'There were validation errors.');
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
$roles = Role::orderBy('id', 'desc')->get();
          if (is_null($user))
          {

              return Redirect::route('users.index');
          }
          return View::make('users::users/edit', compact('user','roles'));
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
      $input = Input::all();
if (empty($input['password'])){
$validation = Validator::make($input, array(
  'name' => 'required|max:255',
'email' => 'required|email|max:255',
));
if ($validation->passes())
{
  $user = User::find($id);
  $user->name =$input['name'];
  $user->email =$input['email'];
  $user->role_id =$input['role_id'];
  $user->user_status =$input['user_status'];
  $user->save();
  \DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('role_id'));
//$user->roles()->sync($request->input('role'));
//$user->syncPermissions('1');
//$user->permissions()->sync('1');
flash('Successfully  Updated')->success()->important();
//\LogActivity::addToLog('Updated user '.$input['name'].'');
  return Redirect::route('users.edit',$id);
}
flash($validation->errors())->error()->important();
return Redirect::route('users.edit', $id)
          ->withInput()
          ->withErrors($validation)
          ->with('message', 'There were validation errors.');

}else{
      $validation = Validator::make($input, array(
          'name' => 'required|max:255',
        'password' => 'required|min:7|confirmed',
'password_confirmation' => 'required|same:password'
      ));
      if ($validation->passes())
      {
          $user = User::find($id);
          $user->name =$input['name'];
          $user->email =$input['email'];
          $user->password =bcrypt($input['password']);
          $user->role_id =$input['role_id'];
          $user->user_status =$input['user_status'];
          $user->save();
          \DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role_id'));
flash('Password Successfully Changed')->success()->important();
// \LogActivity::addToLog('Updated user '.$input['name'].' & Password changed');
          return Redirect::route('users.edit',$id);
      }
flash($validation->errors())->error()->important();
return Redirect::route('users.edit', $id)
          ->withInput()
          ->withErrors($validation)
          ->with('message', 'There were validation errors.');

    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
    $name =$user->name;
      $user->delete();
      flash($name.' Deleted ')->warning()->important();
      return Redirect::route('users.index');

    }
}
