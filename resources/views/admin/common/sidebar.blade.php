<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "data-menu-vertical="true"data-menu-scrollable="false" data-menu-dropdown-timeout="500" >
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
				<a  href="{{route('admin.admin')}}" class="m-menu__link ">
					<i class="m-menu__link-icon fa fa-dashboard"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Dashboard
							</span>
							
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Components
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa 	fa-list-alt"></i>
					<span class="m-menu__link-text">
						Category
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					
					<ul class="m-menu__subnav">
					
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
							<a  href="#" class="m-menu__link ">
								<span class="m-menu__link-text">
									Category
								</span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('admin.category.create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Add Category
								</span>
							</a>
						</li>
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('admin.category.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									All Categories
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('admin.category.trash')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Trashed Categories
								</span>
							</a>
						</li>

					</ul>
				</div>
			</li>
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa 	fa-th-list"></i>
					<span class="m-menu__link-text">
						Products
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('admin.product.create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Add Product
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.product.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									All Products
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.product.trash')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Trashed Products
								</span>
							</a>
						</li>

					</ul>
				</div>
			</li>

			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-chrome"></i>
					<span class="m-menu__link-text">
						Blog
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('admin.blog.create')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Add Post
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.blog.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									All Post
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.blog.trash')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Trashed Post
								</span>
							</a>
						</li>

					</ul>
				</div>
			</li>

			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-shopping-basket"></i>
					<span class="m-menu__link-text">
						Order
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.order.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									All Orders
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.order.trash')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Trashed Order
								</span>
							</a>
						</li>

					</ul>
				</div>
			</li>

			 <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon fa fa-users"></i>
                    <span class="m-menu__link-text">
                        Clients
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
            
                    <ul class="m-menu__subnav">
            
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <span class="m-menu__link-text">
                                    Clients
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{route('admin.client.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Add Clients
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{route('admin.client.index')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Manage Clients
                                </span>
                            </a>
                        </li>
            
                    </ul>
                </div>
            </li>

			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-cog"></i>
					<span class="m-menu__link-text">
						Settigns
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{url('admin/about')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									About
								</span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{url('admin/siteinfo')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Site Information
								</span>
							</a>
						</li>

					</ul>
				</div>
			</li>

			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-database"></i>
					<span class="m-menu__link-text">
						Database Backup
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						

						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{route('admin.backup.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Store
								</span>
							</a>
						</li>


					</ul>
				</div>
			</li>
		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->


