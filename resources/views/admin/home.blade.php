@extends('admin.common.app')
@section('breadcrumbs')
   <li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
@endsection
@section('content')

<div class="m-content">
	<!--Begin::Main Portlet-->
	<div class="row">
		<div class="col-xl-4">
			<!--begin:: Widgets/Top Products-->
			<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Trends
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
								<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
									All
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 40.5px;"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="m-portlet__body">
					<!--begin::Widget5-->
					<div class="m-widget4">
						<div class="m-widget4__chart m-portlet-fit--sides m--margin-top-10 m--margin-top-20" style="height:260px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
							<canvas id="m_chart_trends_stats" width="734" height="260" class="chartjs-render-monitor" style="display: block; width: 734px; height: 260px;"></canvas>
						</div>
						<div class="m-widget4__item">
							<div class="m-widget4__img m-widget4__img--logo">
								<img src="assets/app/media/img/client-logos/logo3.png" alt="">
							</div>
							<div class="m-widget4__info">
								<span class="m-widget4__title">
									Phyton
								</span>
								<br>
								<span class="m-widget4__sub">
									A Programming Language
								</span>
							</div>
							<span class="m-widget4__ext">
								<span class="m-widget4__number m--font-danger">
									+$17
								</span>
							</span>
						</div>
						<div class="m-widget4__item">
							<div class="m-widget4__img m-widget4__img--logo">
								<img src="assets/app/media/img/client-logos/logo1.png" alt="">
							</div>
							<div class="m-widget4__info">
								<span class="m-widget4__title">
									FlyThemes
								</span>
								<br>
								<span class="m-widget4__sub">
									A Let's Fly Fast Again Language
								</span>
							</div>
							<span class="m-widget4__ext">
								<span class="m-widget4__number m--font-danger">
									+$300
								</span>
							</span>
						</div>
						<div class="m-widget4__item">
							<div class="m-widget4__img m-widget4__img--logo">
								<img src="assets/app/media/img/client-logos/logo2.png" alt="">
							</div>
							<div class="m-widget4__info">
								<span class="m-widget4__title">
									AirApp
								</span>
								<br>
								<span class="m-widget4__sub">
									Awesome App For Project Management
								</span>
							</div>
							<span class="m-widget4__ext">
								<span class="m-widget4__number m--font-danger">
									+$6700
								</span>
							</span>
						</div>
					</div>
					<!--end::Widget 5-->
				</div>
			</div>
			<!--end:: Widgets/Top Products-->
		</div>
		<div class="col-xl-4">
			<!--begin:: Widgets/Activity-->
			<div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text m--font-light">
								Activity
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
								<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
									<i class="fa fa-genderless m--font-light"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Cancel
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-widget17">
						<div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
							<div class="m-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
								<canvas id="m_chart_activities" width="734" height="216" class="chartjs-render-monitor" style="display: block; width: 734px; height: 216px;"></canvas>
							</div>
						</div>
						<div class="m-widget17__stats">
							<div class="m-widget17__items m-widget17__items-col1">
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-truck m--font-brand"></i>
									</span>
									<span class="m-widget17__subtitle">
										Delivered
									</span>
									<span class="m-widget17__desc">
										15 New Paskages
									</span>
								</div>
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-paper-plane m--font-info"></i>
									</span>
									<span class="m-widget17__subtitle">
										Reporeted
									</span>
									<span class="m-widget17__desc">
										72 Support Cases
									</span>
								</div>
							</div>
							<div class="m-widget17__items m-widget17__items-col2">
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-pie-chart m--font-success"></i>
									</span>
									<span class="m-widget17__subtitle">
										Ordered
									</span>
									<span class="m-widget17__desc">
										72 New Items
									</span>
								</div>
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-time m--font-danger"></i>
									</span>
									<span class="m-widget17__subtitle">
										Arrived
									</span>
									<span class="m-widget17__desc">
										34 Upgraded Boxes
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end:: Widgets/Activity-->
		</div>

		<div class="col-xl-4">
			<!--begin:: Widgets/Activity-->
			<div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text m--font-light">
								Activity
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
								<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
									<i class="fa fa-genderless m--font-light"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Cancel
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-widget17">
						<div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
							<div class="m-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
								<canvas id="m_chart_activities" width="734" height="216" class="chartjs-render-monitor" style="display: block; width: 734px; height: 216px;"></canvas>
							</div>
						</div>
						<div class="m-widget17__stats">
							<div class="m-widget17__items m-widget17__items-col1">
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-truck m--font-brand"></i>
									</span>
									<span class="m-widget17__subtitle">
										Delivered
									</span>
									<span class="m-widget17__desc">
										15 New Paskages
									</span>
								</div>
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-paper-plane m--font-info"></i>
									</span>
									<span class="m-widget17__subtitle">
										Reporeted
									</span>
									<span class="m-widget17__desc">
										72 Support Cases
									</span>
								</div>
							</div>
							<div class="m-widget17__items m-widget17__items-col2">
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-pie-chart m--font-success"></i>
									</span>
									<span class="m-widget17__subtitle">
										Ordered
									</span>
									<span class="m-widget17__desc">
										72 New Items
									</span>
								</div>
								<div class="m-widget17__item">
									<span class="m-widget17__icon">
										<i class="flaticon-time m--font-danger"></i>
									</span>
									<span class="m-widget17__subtitle">
										Arrived
									</span>
									<span class="m-widget17__desc">
										34 Upgraded Boxes
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end:: Widgets/Activity-->
		</div>
		
	</div>
	<!--End::Main Portlet-->
<!--Begin::Main Portlet-->
</div>

@endsection