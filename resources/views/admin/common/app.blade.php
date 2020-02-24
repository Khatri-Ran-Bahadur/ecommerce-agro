
		<!-- ============================================================
				start header
	=============================================================== -->
							
					@include('admin.common.header')
	<!-- ============================================================
				start header
	=============================================================== -->


		<!-- ============================================================
				start navbar
	=============================================================== -->
							
					@include('admin.common.navbar')
	<!-- ============================================================
				start navbar
	=============================================================== -->

<!-- END: Header -->		
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
		<i class="la la-close"></i>
	</button>
	


<!-- ========================================================
							start sidebar
=====================================================================-->

		@include('admin.common.sidebar')

<!-- ========================================================
							end sidebar
=====================================================================-->


		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			<!-- BEGIN: Subheader -->
			<div class="m-subheader ">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<section class="content-header">    
					      <nav aria-label="breadcrumb">
					        <ol class="breadcrumb">
					          @yield('breadcrumbs')
					        </ol>
					      </nav>
					    </section>
					</div>
					<div>
						<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
							<span class="m-subheader__daterange-label">
								<span class="m-subheader__daterange-title"></span>
								<span class="m-subheader__daterange-date m--font-brand"></span>
							</span>
							<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
								<i class="la la-angle-down"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<!-- ===================================================
									main contenr
			======================================================= -->
			<div class="m-content">
				@yield('content')
			</div>

			<!-- ===================================================
									main contenr
			======================================================= -->
		</div>
	</div>
							
			
<!-- ==================================================================================
	footer
=============================================================== -->

@include('admin.common.footer')

<!-- ==================================================================================
	footer
=============================================================== -->