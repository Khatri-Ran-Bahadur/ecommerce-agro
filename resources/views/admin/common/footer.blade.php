<!-- begin::Footer -->
<footer class="m-grid__item		m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					<script>document.write(new Date().getFullYear());</script> &copy; Agro
					
				</span>
			</div>
			
		</div>
	</div>
</footer>
<!-- end::Footer -->
</div>
<!-- end:: Page 	-->
<!-- begin::Quick Sidebar -->

<!-- end::Quick Sidebar -->		    
<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->
<ul class="m-nav-sticky" style="margin-top: 30px;">

	
	<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
		<a href="http://sathisoft.com/" target="_blank">
			<i class="la la-life-ring"></i>
		</a>
	</li>
</ul>
<!-- begin::Quick Nav -->	

<!--begin::Base Scripts -->
<script src="{{ asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->   
<!--begin::Page Vendors -->
<script src="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->  
<!--begin::Page Snippets -->
<script src="{{ asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/components/forms/widgets/summernote.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/components/forms/widgets/summernote.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
@yield('scripts')
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
