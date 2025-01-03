<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
 @yield('css')
</head>
<body>
    <div class="admin-container">
  
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <ul>
                    <li><a href="../admin/dashboard">Dashboard</a></li>
                    <li><a href="../admin/users">Users</a></li>
                    <li><a href="../admin/createuser">Create User</a></li>
                    <li><a href="../admin/newsitems">News Items</a></li>
                    <li><a href="#">Logout</a></li>
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
            