<?php

// Use the form class
use framework\presentation\views\components\form;  

// Create a form instance
$form = new form();
?>

<!-- Render the form HTML -->
<section class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8 bg-gray-50">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="text-2xl font-bold text-center text-gray-900">Create a new account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register" method="POST">

      <!-- Email Field -->
      <div>
        <?= $form->label('email') ?>
        <?= $form->input('email', 'email', 'Enter your email') ?>
      </div>

      <!-- Password Field -->
      <div>
        <?= $form->label('password') ?>
        <?= $form->input('password', 'password', 'Enter your password') ?>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-600">
          Register
        </button>
      </div>
    </form>

    <!-- Optional Footer Text -->
    <p class="mt-10 text-sm text-center text-gray-500">
      Already have an account? 
      <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign in</a>
    </p>
  </div>
</section>
