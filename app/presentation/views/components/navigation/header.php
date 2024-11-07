<header class='flex flex-col items-center w-full bg-gray-100 border border-b border-black'>
    <nav class='flex items-center justify-between w-full h-15'>

        <!-- Logo -->
        <div class='flex items-center justify-center w-1/6 h-10 p-2'> 
            <img src='/app/storage/images/square-logo.png' alt='Logo' class='h-full' />
        </div>

        <!-- Menu Items for Desktop -->
        <div class='items-center justify-center hidden w-4/6 lg:flex'>
            <div class='flex items-center justify-center w-10 h-10 p-5'>
                <a href='/' class='border-b border-gray-800'>Home</a>
            </div>
            <div class='flex items-center justify-center w-10 h-10 p-5'>
                <a href='/about' class='border-b border-gray-800'>About</a>
            </div>
            <div class='flex items-center justify-center w-10 h-10 p-5'>
                <a href='/contact' class='border-b border-gray-800'>Contact</a>
            </div>
        </div>

        <!-- Register Button -->
        <div class='flex items-center justify-center hidden w-1/6 h-10 p-2 lg:flex'> 
            <a href='/register' class='border-b border-gray-800'>Register</a>
        </div>

        <!-- mobile icons -->
        <div class='flex items-center justify-center w-1/6 h-10 p-2 lg:hidden'> 
            <button id='hamburger' class='focus:outline-none'>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <button id='close-menu' class='hidden p-5 text-right focus:outline-none'>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id='mobile-menu' class='flex flex-col items-center hidden w-full bg-gray-100 lg:hidden'>
        <a href='/' class='w-full p-3 text-center'>Home</a>
        <a href='/about' class='w-full p-3 text-center'>About</a>
        <a href='/contact' class='w-full p-3 text-center'>Contact</a>
        <a href='/register' class='w-full p-3 text-center border-b border-gray-800'>Register</a>
    </div>
</header>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');

    hamburger.addEventListener('click', function() {
        mobileMenu.classList.remove('hidden');
        hamburger.classList.add('hidden');
        closeMenu.classList.remove('hidden');
    });

    closeMenu.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
        closeMenu.classList.add('hidden');
        hamburger.classList.remove('hidden');
    });
</script>
