<!DOCTYPE html>
<html lang="en" class="w-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf" content="{{ @csrf_token() }}">
    <title>KBS Todo List</title>
    @vite('resources/css/app.css')

    @yield("head")
</head>
<body class="w-full bg-gray-100 flex flex-col">
    <header class="flex-shrink-0">
        <section class="w-[500px] mx-auto p-5">
            <h1 class="text-4xl text-center">KBS To Do List</h1>
        </section>
    </header>
    <main class="flex-1 flex flex-col overflow-auto">
        @yield("main")
    </main>
</body>
</html>