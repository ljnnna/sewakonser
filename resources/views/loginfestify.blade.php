<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F6EEFB] font-sans">

    <div class="flex min-h-screen">
        <!-- Kiri -->
        <div class="flex flex-col justify-center items-center w-2/5 bg-[#E9DFF9] text-[#493862] px-6 py-10 rounded-r-3xl">
            <img src="{{ asset('images/logofestify.png') }}" alt="logo" class="w-1/2 mb-6">
            <h1 class="text-4xl font-semibold -mt-6">WELCOME</h1><br>
            <p class="text-center -mt-4">Sign in to continue</p>
        </div>

        <!-- Kanan -->
        <div class="flex justify-center items-center w-3/5">
            <div class="w-[400px] bg-white p-8 rounded-xl shadow-lg">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">LOGIN</h2>
                </div>
                <form action="{{ route('login.custom') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <input type="text" name="username" placeholder="Masukkan username"
                            class="w-full h-12 px-5 rounded-full border border-gray-300 focus:outline-none focus:border-black" required>
                    </div>
                    <div class="mb-5">
                        <input type="password" name="password" placeholder="Masukkan password"
                            class="w-full h-12 px-5 rounded-full border border-gray-300 focus:outline-none focus:border-black" required>
                    </div>
                    <div class="flex items-center justify-between mb-5 text-sm">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="form-checkbox">
                            <span>Remember me</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full h-12 bg-[#E1AAE1] hover:bg-[#20492F] text-white font-semibold rounded-full transition duration-300">LOGIN</button>
                    <p class="text-center mt-4 text-sm">Don't have account? 
                        <a href="#" class="font-semibold hover:underline text-gray-700">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
