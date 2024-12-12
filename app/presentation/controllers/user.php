<?

namespace app\presentation\controllers;

use framework\utils\logs\logs;

class user
{
    public function updateEmail()
    {
        logs::info('register');
    }

    public function updatePassword()
    {
        logs::info('password update');
    }

    public function deleteAccount()
    {
        logs::info('delete');
    }
}
