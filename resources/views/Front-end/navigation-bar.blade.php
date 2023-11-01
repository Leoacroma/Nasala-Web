<div class="container-fuild navbar-responsive fixed-top">
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
        <div class="bg-light p-4">
          <ul>
            <li>
              <a class="nav-font"  data-locale="{{ $locale }}" href="{{ route('front.home') }}">
                {{ __('messages.Home') }} <i class=" {{ Route::currentRouteNamed('front.home') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
              </a>
            </li>
            <li>
              <a class="nav-font"  data-locale="{{ $locale }}" href="{{ route('page.news', ['page' => 0]) }}">
                {{ __('messages.News') }} <i class=" {{ Route::currentRouteNamed('page.news', 'front.subnews') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
              </a>
            </li>
            <li>
              <a class="nav-font"  data-locale="{{ $locale }}" href="#">
                {{ __('messages.Training') }} <i class=" {{  Route::currentRouteNamed('front.work.dp1' , 'front.work.dp2Content' , 'front.work.dp3') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
              </a>
              <ul>
                <li>
                  <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.work.dp1') }}">
                    {{ __('messages.Annual training plan') }} <i class=" {{  Route::currentRouteNamed('front.work.dp1') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                  </a>
                </li>
                <li>
                  <a class="nav-font"  data-locale="{{ $locale }}"  href="#">
                    {{ __('messages.Training documents') }} <i class=" {{  Route::currentRouteNamed('front.work.dp2Content') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                  </a>
                  <ul>
                    @foreach ($cateSub['data'] as $dd)
                      <li>
                        <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.work.dp2Content', $dd['id']) }}">
                          @if (app()->getLocale() === 'kh')
                          {{ $dd['titleKh'] }}
                          @else
                              @if ($dd['title'] !== null)
                                  {{ $dd['title'] }}
                              @else
                                  {{ $dd['titleKh'] }}
                              @endif
                          @endif
                           <i class=" {{  Route::currentRouteNamed('front.work.dp1') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </li>
                <li>
                  <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.enrollMent') }}">
                    {{ __('messages.Enroll') }} <i class=" {{  Route::currentRouteNamed('front.enrollMent') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                  </a>
                </li>
              </ul>
              <li>
                <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('page.lib.all',['page' => 0]) }}">
                  {{ __('messages.Library') }} <i class=" {{  Route::currentRouteNamed('page.lib.all') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                </a>
              </li>
              <li>
                <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.page.scholar', ['page' =>0]) }}">
                  {{ __('messages.Scholarship') }} <i class=" {{  Route::currentRouteNamed('front.page.scholar') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                </a>
              </li>
              <li>
                <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.page.scholar', ['page' =>0]) }}">
                  {{ __('messages.About the school') }} <i class=" {{  Route::currentRouteNamed([
                    'front.aboutschool.dp1',
                    'front.aboutschool.dp2',
                    'front.aboutschool.dp3',
                    'front.aboutschool.dp4',
                    'front.aboutschool.dp5',
                    'front.aboutschool.dp6',
                    'front.aboutschool.dp7',
                    'front.aboutschool.dp8',
                ]) ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                </a>
                <ul>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp1') }}">
                      {{ __('messages.Message from the Principal') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp1') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp2') }}">
                      {{ __('messages.Strategic Plan on Capacity Development') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp2') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp3') }}">
                      {{ __('messages.Partner') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp3') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp4') }}">
                      {{ __('messages.Department of National School of Local Administration') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp4') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp5') }}">
                      {{ __('messages.Leadership composition') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp5') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp6') }}">
                      {{ __('messages.Curriculum') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp6') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                  <li>
                    <a class="nav-font"  data-locale="{{ $locale }}"  href="{{ route('front.aboutschool.dp7') }}">
                      {{ __('messages.Contact') }} <i class=" {{  Route::currentRouteNamed('front.aboutschool.dp7') ? 'fa-solid fa-circle-arrow-left' : '' }}"></i>  
                    </a>
                  </li>
                </ul>
              </li>
            </li>
          </ul>
        </div>
      </div>
      <nav class="navbar navbar-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
          </button>
        </div>
      </nav>
</div>