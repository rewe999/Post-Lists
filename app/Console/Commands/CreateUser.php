<?php

namespace App\Console\Commands;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    protected $signature = 'createUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new User';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $name = $this->ask('Enter name:');
        $email = $this->ask('Enter email:');
        $pass = $this->ask('Enter password:');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $pass,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            $this->info('Staff User not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($pass),
            ]);

            $this->info('User '.$name.' was created');
    }



}
