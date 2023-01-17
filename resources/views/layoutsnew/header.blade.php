	<div id="kt_header"
					 class="kt-header kt-grid__item  kt-header--fixed ">

					<!-- begin:: Header Menu -->
					<button class="kt-header-menu-wrapper-close"
							id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
					<div class="kt-header-menu-wrapper"
						 id="kt_header_menu_wrapper">
						<div id="kt_header_menu"
							 class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
							<ul class="kt-menu__nav ">
								<!-- <li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active"
									
									aria-haspopup="true"><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
									   class="kt-menu__link "><span
											  class="kt-menu__link-text">logout</span><i
										   class="kt-menu__ver-arrow la la-angle-right"></i></a>
										   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
																				
								</li> -->
								

							</ul>
						</div>
					</div>

					<!-- end:: Header Menu -->

					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">

						<!--begin: Search -->


						<!--end: Search -->

						<!--end: Search -->

						<!--begin: Notifications -->


						<!--end: Notifications -->

						<!--end: Quick Actions -->

						<!--begin: My Cart -->


						<!--end: My Cart -->

						<!--begin: Quick panel toggler -->
						{{-- <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel"
							 data-toggle="kt-tooltip"
							 title="Quick panel"
							 data-placement="right">
							<span class="kt-header__topbar-icon"
								  id="kt_quick_panel_toggler_btn">
								<svg xmlns="http://www.w3.org/2000/svg"
									 xmlns:xlink="http://www.w3.org/1999/xlink"
									 width="24px"
									 height="24px"
									 viewBox="0 0 24 24"
									 version="1.1"
									 class="kt-svg-icon">
									<g stroke="none"
									   stroke-width="1"
									   fill="none"
									   fill-rule="evenodd">
										<rect id="bound"
											  x="0"
											  y="0"
											  width="24"
											  height="24" />
										<rect id="Rectangle-7"
											  fill="#000000"
											  x="4"
											  y="4"
											  width="7"
											  height="7"
											  rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
											  id="Combined-Shape"
											  fill="#000000"
											  opacity="0.3" />
									</g>
								</svg> </span>
						</div> --}}

						<!--end: Quick panel toggler -->

						<!--begin: Language bar -->
						{{-- <div c-header__topbar-item kt-header__topbar-item--langs">
							<div class="kt-header__topbar-wrapper"
								 data-toggle="dropdown"
								 data-offset="10px,0px">
								<span class="kt-header__topbar-icon">
									<img class=""
										 src="./assets/media/flags/020-flag.svg"
										 alt="" />
								</span>
							</div>
							<div
								 class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
								<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
									<li class="kt-nav__item kt-nav__item--active">
										<a href="#"
										   class="kt-nav__link">
											<span class="kt-nav__link-icon"><img src="./assets/media/flags/020-flag.svg"
													 alt="" /></span>
											<span class="kt-nav__link-text">English</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#"
										   class="kt-nav__link">
											<span class="kt-nav__link-icon"><img
													 src="./assets/media/flags/016-spain.svg"
													 alt="" /></span>
											<span class="kt-nav__link-text">Spanish</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#"
										   class="kt-nav__link">
											<span class="kt-nav__link-icon"><img
													 src="./assets/media/flags/017-germany.svg"
													 alt="" /></span>
											<span class="kt-nav__link-text">German</span>
										</a>
									</li>
								</ul>
							</div>
						</div> --}}

						<!--end: Language bar -->

						<!--begin: User Bar -->
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper"
								 data-toggle="dropdown"
								 data-offset="0px,0px">
								<div class="kt-header__topbar-user">
								<div class="dropdown">
  								<button class="btn border-0  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Hi:  {{Auth::user()->name}}
  								</button>
  								<div class="dropdown-menu p-0  m-0 text-end" aria-labelledby="dropdownMenuButton">
									<!-- <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> -->
									<li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active"
									aria-haspopup="true"><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
									   class="kt-menu__link ">
									   <span class="kt-menu__link-text">logout</span>
									   <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									  
										   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
																				
								</li>
								
							</div>
							</div>
							
									<!-- <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span> -->
									<!-- <span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->name}}</span> -->
									<img class="kt-hidden"
										 alt="Pic"
										 src="./assets/media/users/300_25.jpg" />
								</div>
							</div>
							
						</div>

						<!--end: User Bar -->
					</div>

					<!-- end:: Header Topbar -->
				</div>
