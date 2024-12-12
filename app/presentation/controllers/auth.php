<?

namespace app\presentation\controllers;

use framework\utils\logs\logs;
use framework\presentation\views\view;
use app\data\models\user;

class auth
{
    // register
    public function register() {

        logs::info('User attempting to register');

        $data = [
            'email' => $_POST['email'] ?? '',  // Default to empty string if no data is sent
            'password' => $_POST['password'] ?? '',  // Same for password
        ];

        logs::info('Registration form data: ' . json_encode($data));  

        // Create a new User instance
        $user = new user();

        // Attempt to create the user in the database
        if ($user->create($data)) {
            // Log success
            logs::info('User successfully registered with email: ' . $data['email']);

            // Redirect to login page or show success message (You could use headers or views)
            new view('pages/login');  // Show the login view after successful registration
            logs::info('Redirected to login page');

        } else {
            // Log failure
            logs::error('Failed to register user with email: ' . $data['email']);

            // Show a registration failure view or message
            new view('pages/register_failed');  // Example: Show a failure page
            logs::info('Redirected to registration failure page');
        }

        return;
    }

}
