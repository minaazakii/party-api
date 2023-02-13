<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserReferToUser;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request, $referalSign = null)
    {

        $rules =
            [
                'email' => 'required|unique:users,email'
            ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($referalSign) {
            $referalUser = User::where('token', $referalSign)->first();
            if (!$referalUser) {
                return response()->json(
                    [
                        'error' => 'Unknown Referal Code'
                    ],
                    400
                );
            }
            $referalUser->referCounter++;
            $referalUser->update();
            $user = new User();
            $user->email = $request->email;
            $user->referCounter = 0;
            $user->token = Str::random(16);
            $user->save();
            $userReferTo = new UserReferToUser();
            $userReferTo->user_id = $referalUser->id;
            $userReferTo->referTo_id = $user->id;
            $userReferTo->save();
            return response()->json($user);
        }
        $user = new User();
        $user->email = $request->email;
        $user->referCounter = 0;
        $user->token = Str::random(16);
        $user->save();
        return response()->json($user);
    }
}
