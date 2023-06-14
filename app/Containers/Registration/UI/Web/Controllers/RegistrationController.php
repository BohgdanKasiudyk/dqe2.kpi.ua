<?php
namespace App\Containers\Registration\UI\Web\Controllers;

use App\Containers\Login\Models\User;
use App\Containers\Registration\Models\RegistartionUser;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegistrationController extends PortWebController
{
    public function index()
    {

        return View('registration.index');
    }

    public function edit($id)
    {
        return View('department.edit');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required']);

        $regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m';
        $password = $data['password'];
        if(!preg_match($regex, $password)) {
            return back()->with('error', 'Пароль не відповідає правилам');
        }

        $user = User::all()->where('email', $data['email']);
        if (!is_null($user) ){
            return back()->with('error', 'Такий емейл вже зареєстований');
        }

        #$user = User::create(request(['name', 'email', 'password']));

        RegistartionUser::create($data);

        #auth()->login($user);

        return redirect()->to('/registration');
        //return redirect()->back()->with('success', 'Something went wrong.');
    }
}
