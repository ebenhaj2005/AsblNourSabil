<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
 @yield('css')
</head>
<body>
    <div class="admin-container">
  
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li><a href="{{ route('admin.users.create') }}">Create User</a></li>
                    <li><a href="{{ route('admin.newsitems.index') }}">News Items</a></li>
                    <li><a href="{{ route('faqs.index') }}">All FAQ's</a></li>
                <li><a href="{{ route('faqs.create') }}">New FAQ</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('categories.create') }}">New Category</a></li>
                    
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </nav>
        </aside>

        
        <main class="main-content">
          @yield('content')
            
        </main>
    </div>
</body>
</html> 


<header>
            