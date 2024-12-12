<?

namespace app\data\models;

use framework\data\model;
use framework\utils\logs\logs;

class user extends model
{
    protected $tabel = 'users';
    protected $fillable = [
        'email',
        'password',
    ];

    // instance created
    public function __construct()
    {
        parent::__construct(); 
        logs::info("New User model instance created");
    }

    // user created
    public function create(array $attributes)
    {
        logs::info('user model - create function called');
        return parent::create($attributes);
        logs::info("Creating new user with email: " . $attributes['email']);
    }

}