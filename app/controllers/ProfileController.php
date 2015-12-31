<?php

class ProfileController extends BaseController {
    public function user($username) {
        $user = User::where('username', '=', $username);
        
        if($user->count()) {    
            //pass in user data here
            $user = $user->first();
            return View::make('profile.user')
                    ->with('user', $user);
        }
        return App::abort(404);
    }
}