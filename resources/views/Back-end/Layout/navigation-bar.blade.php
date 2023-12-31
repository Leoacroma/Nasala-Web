<?php
    $_COOKIE = Cookie::get('user_Role');

?>
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-around">
            <ul class="navbar-nav navbar-nav-left">
            <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                {{-- <form action="{{ route('admin.logout') }}" id="delete-form{{ $item['id'] }}" method="POST">
                    <a href="" class="nav-link horizontal-nav-left-menu " style="color: rgb(248, 78, 78)"><i class="fa-solid fa-right-from-bracket" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))"></i></a>
                </form> --}}
                <a href="{{ route('admin.logout') }}" class="nav-link horizontal-nav-left-menu " style="color: rgb(248, 78, 78)"><i class="fa-solid fa-right-from-bracket" ></i></a>
            </li>
            <li class="nav-item nav-search">
                {{-- <div class="input-group">
                    <input type="text" class="form-control " placeholder="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary" style="height: 35px" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                  </div> --}}
            </li>	
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ Route('admin.dash') }}"><img src="{{ asset('images/front/photo_2022-10-19_09-17-50-removebg-preview.png') }}"  alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <div class="row">
                        <div class="col-12">
                            <span class="nav-profile-name kantumruy"> {{ $firstName }} {{ $lastName }}</span>
                        </div>
                         
                    </div>
                </a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
            <li class="nav-item  {{ Route::currentRouteNamed('admin.dash', 'admin.newsSortCate') ? 'active' : '' }}">
                <a class="nav-link" href="{{ Route('admin.dash') }}">
                    <i class="fa-solid fa-gauge-high mb-3 font-size-20"></i>
                    <span class="menu-title kantumruy">ទំព័រដើម</span>
                </a>
            </li>
            {{-- <li class="nav-item {{ Route::currentRouteNamed('admin.pagemake') ? 'active' : '' }}">
                <a href="{{ route('admin.pagemake') }}" class="nav-link">
                    <i class="fa-solid fa-pager mb-3 font-size-20"></i>
                    <span class="menu-title" >Menue / Page</span>
                    <i class="menu-arrow"></i>
                </a>
            </li> --}}
            <li class="nav-item {{ Route::currentRouteNamed('admin.post', 'admin.create', 'admin.postcate', 'admin.edit', 'admin.editcate', ) ? 'active' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-cloud mb-3 font-size-20"></i>
                    <span class="menu-title kantumruy" >គ្រប់គ្រងព័ត៌មាន</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        <li class="nav-item {{ Route::currentRouteNamed('admin.postcate', 'admin.editcate', ) ? 'active' : '' }}"><a class="nav-link kantumruy" href="{{ route('admin.postcate') }}">ប្រភេទព័ត៌មាន</a></li>
                        <li class="nav-item {{ Route::currentRouteNamed('admin.post', 'admin.create', 'admin.edit' ) ? 'active' : '' }}"><a class="nav-link kantumruy" href="{{ route('admin.post') }}">ការបង្ហោះព័ត៌មាន</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed( 'admin.train.cate', 'admin.reg.index', 'admin.train.post', 'admin.trian.cate.edit') ? 'active' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-layer-group mb-3 font-size-20"></i>
                    <span class="menu-title kantumruy" >ការបណ្តុះបណ្តាល</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        <li class="nav-item {{ Route::currentRouteNamed( 'admin.train.cate', 'admin.trian.cate.edit') ? 'active' : '' }}"><a class="nav-link kantumruy" href="{{ route('admin.train.cate') }}">ប្រភេទការបណ្តុះបណ្តាល</a></li>
                        <li class="nav-item {{ Route::currentRouteNamed('admin.train.post') ? 'active' : '' }}"><a class="nav-link kantumruy" href="{{ route('admin.train.post') }}">វគ្គបណ្តុះបណ្តាល</a></li>
                        <li class="nav-item {{ Route::currentRouteNamed( 'admin.reg.index') ? 'active' : '' }}"><a class="nav-link kantumruy" href="{{ route('admin.reg.index') }}">ការចុះឈ្មោះចូលរៀន</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('admin.library', 'admin.lib.cate.edit') ? 'active' : '' }}">
                <a href="{{ route('admin.library') }}" class="nav-link">
                    <i class="fa-solid fa-book mb-3 font-size-20"></i>
                    <span class="menu-title kantumruy" >បណ្ណាល័យ</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('admin.pub.index') ? 'active' : '' }}">
                <a href="{{ route('admin.pub.index') }}" class="nav-link">
                    <i class="fa-solid fa-book mb-3 font-size-20"></i>
                    <span class="menu-title kantumruy" >អាហាររូបករណ៍</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteNamed('admin.ab.video') ? 'active' : '' }}">
                <a href="{{ route('admin.ab.video') }}" class="nav-link">
                    <i class="fa-solid fa-school mb-3 font-size-20"></i>
                    <span class="menu-title kantumruy" >អំពីសាលា</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            @if( $_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
                <li class="nav-item {{ Route::currentRouteNamed('admin.user') ? 'active' : '' }}">
                    <a href="{{  route('admin.user')}}" class="nav-link">
                        <i class="fa-solid fa-cloud mb-3 font-size-20"></i>
                        <span class="menu-title kantumruy" >គ្រប់គ្រងគណនីប្រើប្រាស់</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
            @endif
            </ul>
        </div>
    </nav>
{{-- <script>
    function confirmDelete(event, form) {
    event.preventDefault();
    Swal.fire({
        title: 'តើអ្នកចង់ចេញពីប្រព័ន្ធ',
        icon: 'warning',
        html: '<img src="path/to/image.jpg" class="custom-icon-img">',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'យល់ព្រម',
        cancelButtonText: 'មិនយល់ព្រម'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script> --}}