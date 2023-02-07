<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{



    

    //
    public function register(Request $request){
        // echo"<pre>";
        // print_r($request->all());
        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => ['min:8','confirmed'],
         
        ]);
        $user = User::create($validateData);
        // echo "<pre>";
        // print_r($user);
        $token = $user->createToken('auth_token')->accessToken;
        
        return response()->json(
            [
                'token' => $token,
                'user' => $user,
                'message' =>"User created successfully",
                'status' => 1
            ]
            );
          
           
    }
//     public function login(Request $request){
//         $validateData = $request->validate([
//             'email'=>['required','email'],
//             'password'=>['required']
//         ]);
//         $user = User::where(['email' => $validateData['email'], 'password' => $validateData['password']])->first();
//             if (!$user) {
//             return response()->json(['message' => 'Email not found', 'status' => 0]);
// }
//         $token = $user->createToken('auth_token')->accessToken;
     
//         return response()->json([
//            'token' => $token,
//              'user' => $user,
//                 'message' => "login",
//                  'status' => 1
// ]);
//         echo '<pre>';
//         print_r($user);
//     }
public function login(Request $request)
{
    $validateData = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    $user = User::where(['email' => $validateData['email'], 'password' => $validateData['password']])->first();
    if (!$user) {
        return response()->json(['message' => 'Email not found', 'status' => 0]);
    }

    $token = $user->createToken('auth_token')->accessToken;

    // Create a post after successful login
    $post = $user->posts()->create([
        'title' => $request->title,
        'body' => $request->body
    ]);

    //comments 

    return response()->json([
        'token' => $token,
        'user' => $user,
        'post' => $post,
        'message' => "Login successful and post created",
        'status' => 1
    ]);
}




    public function getUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(
                [
                  
                    'user' => null,
                    'message' =>"User Not found",
                    'status' => 0
                ]
                );
        }else{
            return response()->json(
                [
                  
                    'user' => $user,
                    'message' =>"User found",
                    'status' => 1
                ]
                );
        }
    }
}
