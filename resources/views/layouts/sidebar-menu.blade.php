<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <router-link to="/dashboard" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt blue"></i>
          <p>
            <b>Tableau de bord</b>
          </p>
        </router-link>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Citoyen
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
        <a href="{{route('citoyens.create')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Ajouter un citoyen 
        </a>
          </li> 
           <li class="nav-item">
        <a href="{{route('citoyens.index')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Liste des citoyens 
        </a>
          </li> 
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Naissance
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
        <a href="{{route('naissances.create')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Ajouter une naissance
        </a>
          </li> 
           <li class="nav-item">
        <a href="{{route('naissances.index')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Liste des naissances 
        </a>
          </li> 
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Jugement
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
        <a href="{{route('naissances.create')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Ajouter une naissance
        </a>
          </li> 
           <li class="nav-item">
        <a href="{{route('jugements.index')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Liste des naissances 
        </a>
          </li> 
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Mariage
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
        <a href="{{route('jugements.create')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Ajouter une naissance
        </a>
          </li> 
           <li class="nav-item">
        <a href="{{route('divorces.index')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Liste des naissances 
        </a>
          </li> 
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Divorce
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
        <a href="{{route('divorces.create')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Ajouter une naissance
        </a>
          </li> 
           <li class="nav-item">
        <a href="{{route('deces.index')}}" class="nav-link">
          
          <i class="nav-icon fas fa-cog green"></i>Liste des naissances 
        </a>
          </li> 
        </ul>
      </li>
 
      @can('isAdmin')
        <li class="nav-item">
          <router-link to="/users" class="nav-link">
            <i class="fa fa-users nav-icon blue"></i>
            <p>Utilisateurs</p>
          </router-link>
        </li>
      @endcan


      @can('isAdmin')
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Parametres
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <router-link to="/citoyens" class="nav-link">
              <i class="nav-icon fas fa-list orange"></i>
              <p>
                Citoyen
              </p>
            </router-link>
          </li> 
           <li class="nav-item">
            <router-link to="/citoyens" class="nav-link">
              <i class="nav-icon fas fa-list orange"></i>
              <p>
                Citoyen
              </p>
            </router-link>
          </li> 
        </ul>
      </li>

      @endcan
      
      

      <li class="nav-item">
        <a href="#" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-power-off red"></i>
          <p>
            {{ __('Logout') }}
          </p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>