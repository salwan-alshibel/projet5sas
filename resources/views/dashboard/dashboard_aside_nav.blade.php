<aside class="sidebar-container absolute text-outer-space-100 bg-outer-space-500 w-60 h-full ">

    <!-- Sidebar -->
    <div class="sidebar px-2 my-4">
        <div class="sidebar-item border-b border-outer-space-400 py-3 text-center">
            <a href="{{ route('dashboard') }}" class="block">
                <i class="fas fa-arrow-left"></i>
                Mon espace</a>
        </div>

        <!-- SidebarSearch Form -->
        <div class=" flex h-9 my-5">
            <input
                class="text-outer-space-100 bg-04DP rounded border border-text-outer-space-100 border-solid placeholder-white px-3 min-w-0 "
                type="search" placeholder="Rechercher">
            <div class=" w-12 flex justify-center">
                <button class=" w-full ">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="sidebar-nav mt-2">
            <ul class="">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="sidebar-nav-item">
                    <a href="#" id="myProfileBtn" class="drop sidebar-nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Profil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="sidebar-nav-treeview">
                        <li class="sidebar-nav-item">
                            <a href="{{ route('dashboard.modifier-profil') }}" id="modifier-profil" class="sidebar-nav-link">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Nom, adresse...</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('updatePassword') }}" id="changer-mot-de-passe" class="sidebar-nav-link">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Mot de passe</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('myPosts', auth()->user()) }}" id="mes-commentaires" class="sidebar-nav-link">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Commentaires</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-nav-item">
                    <a href="#myorder" class="drop sidebar-nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Commandes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="sidebar-nav-treeview">
                        <li class="sidebar-nav-item">
                            <a href="pages/layout/top-nav.html" class="sidebar-nav-link">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>En cours</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="sidebar-nav-link">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Historique</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Espace administration</li>
                <li class="sidebar-nav-item">
                    <a href="pages/calendar.html" class="sidebar-nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>
                            Ajouter un produit
                        </p>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="pages/calendar.html" class="sidebar-nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>
                            Commandes en cours
                        </p>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="pages/calendar.html" class="sidebar-nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>
                            Commandes envoyées
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
