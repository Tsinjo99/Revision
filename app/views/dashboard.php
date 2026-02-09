<?php
// Définir des variables pour la page
$base_url = '/public';       // chemin vers les assets CSS/JS/images
$title = 'Dashboard';
$activePage = 'dashboard';
$unreadMessages = 3;         // exemple dynamique

// Inclure le header et le sidebar
include 'header.php';
include 'sidebar.php';
?>

<main class="admin-main">
    <div class="container-fluid p-4 p-lg-4">

        <!-- Titre & boutons d'action -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0"><?= htmlspecialchars($title) ?></h1>
                <p class="text-muted mb-0">Welcome back! Here's what's happening.</p>
            </div>
            <div class="d-flex gap-2">

                <!-- Boutons d'action -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newItemModal">
                    <i class="bi bi-plus-lg me-2"></i> New Item
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Refresh data">
                    <i class="bi bi-arrow-clockwise icon-hover"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Export data">
                    <i class="bi bi-download icon-hover"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Settings">
                    <i class="bi bi-gear icon-hover"></i>
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">

            <!-- Total Users -->
            <div class="col-xl-3 col-lg-6">
                <div class="card stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon bg-primary bg-opacity-10 text-primary me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Total Users</h6>
                            <h3 class="mb-0">12,426</h3>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> +12.5%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="col-xl-3 col-lg-6">
                <div class="card stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon bg-success bg-opacity-10 text-success me-3">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Revenue</h6>
                            <h3 class="mb-0">$54,320</h3>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> +8.2%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders -->
            <div class="col-xl-3 col-lg-6">
                <div class="card stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon bg-warning bg-opacity-10 text-warning me-3">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Orders</h6>
                            <h3 class="mb-0">1,852</h3>
                            <small class="text-danger"><i class="bi bi-arrow-down"></i> -2.1%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Avg. Response -->
            <div class="col-xl-3 col-lg-6">
                <div class="card stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon bg-info bg-opacity-10 text-info me-3">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Avg. Response</h6>
                            <h3 class="mb-0">2.3s</h3>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> +5.4%</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Charts & autres sections -->
        <!-- TODO: ajouter ici tes graphiques, tableaux, etc. -->

    </div> <!-- /.container-fluid -->
</main>

<?php include 'footer.php'; ?>
