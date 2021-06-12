<aside class="lessDarkable static sm:fixed sidebar-container text-outer-space-100 w-full sm:w-60 pt-8 h-full ">

    <!-- Sidebar -->
    <div class="sidebar px-2 my-4">
        <div class="text-center text-xl">{{ auth()->user()->name }}</div>
        <div class="sidebar-item border-b border-outer-space-400 py-3 text-center">
            <a href="{{ route('dashboard') }}" class="block">
                @if ($_SERVER['REQUEST_URI'] !== '/mon-profil')
                <i class="fas fa-arrow-left"></i>
                Accueil mon profil
                @else
                <i class="fas fa-arrow-down"></i>
                Mon espace
                <i class="fas fa-arrow-down"></i>     
                @endif</a>
        </div>

        <!-- Sidebar Menu -->
        <nav class="sidebar-nav mt-2">
            <ul class="">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="sidebar-nav-item parentlist">
                    <a href="#" id="myProfileBtn" class="bg-yellow-600 text-black drop sidebar-nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Profil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="sidebar-nav-treeview">
                        <li class="sidebar-nav-item">
                            <a href="{{ route('dashboard.modifier-profil') }}" id="modifier-profil" class="bg-yellow-500 text-black sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Infos personnel</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('dashboard.updatePassword') }}" id="changer-mot-de-passe" class="bg-yellow-500 text-black sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Mot de passe</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('dashboard.myPosts', auth()->user()) }}" id="mes-commentaires" class="bg-yellow-500 text-black sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Commentaires</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-nav-item parentlist">
                    <a href="#myorder" class="bg-green-700 drop sidebar-nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Commandes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="sidebar-nav-treeview">
                        <li class="sidebar-nav-item">
                            <a href="{{ route('dashboard.myActualOrders') }}" id="commandes-en-cours" class="bg-green-500 sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>En cours</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('dashboard.myOldOrders') }}" id="historique-commandes" class="bg-green-500  sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Historique</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->admin === 1)


                <li class="sidebar-nav-item parentlist">
                    <a href="#" id="myAdminDropMenuBtn"  class="bg-red-700 drop sidebar-nav-link">
                        <i class="fas fa-store nav-icon"></i>
                        <p>
                            Espace administration
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="sidebar-nav-treeview">
                        <li class="sidebar-nav-item">
                            <a href="{{ route('addProduct')}}" id="ajouter-un-produit" class="bg-red-500 sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Ajouter un produit</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('newOrders')}}" id="nouvelles-commandes" class="bg-red-500 sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Commandes en cours</p>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="{{ route('oldOrders')}}" id="anciennes-commandes" class="bg-red-500 sidebar-nav-link transform hover:scale-110">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Commandes envoyées</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
