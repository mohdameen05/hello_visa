 <!-- partial -->
      
      <div class="container-fluid page-body-wrapper">
 
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category"> Main </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin_dashboard')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title"> Dashboard </span>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="{{url('countries')}}">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title"> Country List </span>
              </a>
            </li>
             
            <li class="nav-item">
             <a class="nav-link" href="{{url('categories')}}">
               <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
               <span class="menu-title"> Category List </span>
             </a>
            </li>
 
            <li class="nav-item">
             <a class="nav-link" href="{{url('sub-category')}}">
               <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
               <span class="menu-title"> Sub Category </span>
             </a>
            </li>

            <li class="nav-item">
             <a class="nav-link" href="{{route('content-management.index')}}">
               <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
               <span class="menu-title"> Content Management </span>
             </a>
            </li>

            <li class="nav-item">
             <a class="nav-link" href="{{route('agent-management.index')}}">
               <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
               <span class="menu-title"> Agent Management </span>
             </a>
            </li>
            
          </ul>
        </nav>
      
  <div class="main-panel">