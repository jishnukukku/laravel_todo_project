<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User_model;
use App\Models\todo_model;

use App\Mail\CreatePassword;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
  public function homePage(){

   return view('welcome');

  }

  public function signup(){

    return view('signup');
    
  }

  public function login(){
    return view('login');
  }

  public function save_user(Request $request)
  {
    try {
      $user = User_model::create([
          'name' => $request->input('username'),
          'email' => $request->input('email'),
          'password' => Hash::make($request->input('password'))
      ]);

      return redirect()->route('login')->with('success', 'User registered successfully.');
  } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == 1062) { 
        return redirect()->back()->withErrors(['error' => 'User with this email already exists.']);
      } else {
        return redirect()->back()->withErrors(['error' => 'An error occurred while registering the user.']);
      }
  }
  }

  public function login_user(Request $request)
  {
      $email = $request->input('email');
      $password = $request->input('password');

      $user = User_model::where('email', $email)->first();
  
      
      if ($user && Hash::check($password, $user->password)) {

        Session::put('user_id', $user->id);
         
        return redirect()->route('welcome-user');


      }
  
     
      return response()->json(['error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);

  }

  public function todo_creation()
  {

 
    return view('to_do_creation');
    
  }

  public function add_task(Request $request)
  {

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      
      
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
  }

  $task = todo_model::create([
      'user_id' => session::get('user_id'),
      'heading' => $request->input('heading'),
      'description' => $request->input('description'),
      'start_date' => $request->input('start_date'),
      'end_date' => $request->input('end_date'),
      'image' => $imageName ?? null
  ]);
    if ($task) {
      return response()->json(['message' => 'Todo item created successfully'], Response::HTTP_OK);
  } else {
      return response()->json(['error' => 'Failed to create todo item'], Response::HTTP_INTERNAL_SERVER_ERROR);
  }
    
  }

  public function todo_view()
  {

    $user_id = Session::get('user_id');

    $user_data = todo_model::where('user_id',$user_id)
    ->where('completed_status',0)
    ->where('delete_status',0)
    ->get();
    return view('todo_view',['user_data'=>$user_data]);
  }

  public function welcome_user()
  {
    $user_id = session::get('user_id');


    $user = User_model::find($user_id);

    if ($user) {
        return view('welcome_user', ['userName' => $user->name]);
    } else {
        return redirect()->route('login');
    }
  }


  public function update_status($id)
  {

    $todo = todo_model::find($id);

        if (!$todo) {
            return response()->json(['error' => 'Todo item not found'], 404);
        }

        $todo->completed_status = TRUE; 
        $todo->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
 
  }


  public function completed_todo()
  {

    $user_id = session::get('user_id');
    $completed_todo = todo_model::where('user_id',$user_id)
    ->where('completed_status',1)
    ->where('delete_status',0)
    ->get();

    return view('todo_completed_view',['completed_todo'=>$completed_todo]);
  }

  public function delete_status($id)
  {
    $todo = todo_model::find($id);

    if(!$todo)
    {
      return response()->json(['error'=>'Todo item notb found !'],404);
    }

    $todo->delete_status = 1;
    $todo->save();
    return response()->json(['error'=>'deleted successfully'],200);
  }


  public function edit_todo($id)
  {

    $todo = todo_model::findOrFail($id);

    return view('todo_edit',['todo_items'=>$todo]);
  }
  
  public function update_task(Request $request,$id)
  {

    $user=todo_model::find($id);
    if($user)
    {
       $user->update([
          'heading' => $request->input('heading'),
          'description' => $request->input('description'),
          'start_date' => $request->input('start_date'),
          'end_date' => $request->input('end_date')
       ]);

       Session::flash('success', 'Task updated .');
      } else {
          Session::flash('error', 'Task not found.');
      }
  
      return redirect()->back();

  }

  public function sendWelcomeMail()
  {
    $user_id = session::get('user_id');

    $get_user_details = User_model::find($user_id);
 
    $to = $get_user_details->email;
    $msg = "welcome";
    $subject = "welcome Email";

    Mail::to($to)->send(new CreatePassword($msg,$subject));
  }

  

}
