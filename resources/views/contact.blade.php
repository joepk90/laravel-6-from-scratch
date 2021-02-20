<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.0/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-full" style="height: 100vh;">

                <form class="bg-white p-6 rounded shadow-md" style="width: 300px">
                        @csrf
                        <div class="mb-5">
                                <label 
                                        for="email"
                                        class="block text-xs uppercase font-semibold mb-1"
                                >E-Mail Address</label>
        
                        
                                <input  id="email"
                                        type="email"
                                        class="border mb-2 px-2 py-2 text-sm w-full" 
                                        name="email"
                                        required autocomplete="email"
                                        autofocus />
                    
                        <button type="submit"
                                class="bg-blue-500 py-2 text-white rounded-full text-sm w-full">
                                Email me
                        </button>
                       
                </form>

</body>
</html>