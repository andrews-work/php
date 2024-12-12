<?

namespace app\app\validation;

class register
{
    public function validate(array $data)
    {
        $errors = [];

        // Simple validation for email and password
        if (empty($data['email'])) {
            $errors[] = 'Email is required.';
        }

        if (empty($data['password'])) {
            $errors[] = 'Password is required.';
        }

        if (strlen($data['password']) < 6) {
            $errors[] = 'Password must be at least 6 characters long.';
        }

        // Return validation errors (if any)
        return $errors;
    }
}
