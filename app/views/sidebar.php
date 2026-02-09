</header>

<aside class="admin-sidebar" id="admin-sidebar">
    <div class="sidebar-content">
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage=='dashboard')?'active':'' ?>" href="/">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage=='messages')?'active':'' ?>" href="/messages">
                        <i class="bi bi-chat-dots"></i>
                        <span>Messages</span>
                        <span class="badge bg-danger rounded-pill ms-auto"><?= $unreadMessages ?? 0 ?></span>
                    </a>
                </li>
                <!-- Ajoute les autres liens ici -->
            </ul>
        </nav>
    </div>
</aside>

<button class="hamburger-menu" type="button" data-sidebar-toggle aria-label="Toggle sidebar">
    <i class="bi bi-list"></i>
</button>

<main class="admin-main">
<div class="container-fluid p-4 p-lg-5">
