<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>{{ $title }}</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{ url('resources/assets/admin/vendors/images/apple-touch-icon.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ url('resources/assets/admin/vendors/images/favicon-32x32.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ url('resources/assets/admin/vendors/images/favicon-16x16.png') }}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ url('resources/assets/admin/vendors/styles/core.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ url('resources/assets/admin/vendors/styles/icon-font.min.css') }}"
		/>
		<link rel="stylesheet" type="text/css" href="{{ url('resources/assets/admin/vendors/styles/style.css') }}" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body class="login-page">
		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="{{ url('/login') }}">
						<img src="{{ url('resources/assets/admin/vendors/images/deskapp-logo.svg') }}" alt="" />
					</a>
				</div>
				{{-- <div class="login-menu">
					<ul>
						<li><a href="{{ url('/register') }}">Register</a></li>
					</ul>
				</div> --}}
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="{{ url('resources/assets/admin/vendors/images/login-page-img.png') }}" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Admin Login</h2>
							</div>
							<form action="{{ route('admin.login_handler') }}" method="POST">
                                @csrf
                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                        <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Username"
                                        name="login_id"
                                        value="{{old('login_id')}}"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>

                                @error('login_id')
                                    <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px">
                                        {{ $message }}
                                    </div>
                                @enderror
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
                                        name="password"
                                        value="{{old('password')}}"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
                                @error('password')
                                <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px">
                                    {{ $message }}
                                </div>
                                @enderror
								{{-- <div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"
												class="custom-control-input"
												id="customCheck1"
											/>
											<label class="custom-control-label" for="customCheck1"
												>Remember</label
											>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password">
											<a href="forgot-password.html">Forgot Password</a>
										</div>
									</div>
								</div> --}}
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

{{--											<a--}}
{{--												class="btn btn-primary btn-lg btn-block"--}}
{{--												href="{{ url('/admin/home') }}"--}}
{{--												>Sign In</a--}}
{{--											>--}}
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
										</div>
										{{-- <div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href="register.html"
												>Register To Create Account</a
											>
										</div> --}}
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ url('resources/assets/admin/vendors/scripts/core.js') }}"></script>
		<script src="{{ url('resources/assets/admin/vendors/scripts/script.min.js') }}"></script>
		<script src="{{ url('resources/assets/admin/vendors/scripts/process.js') }}"></script>
		<script src="{{ url('resources/assets/admin/vendors/scripts/layout-settings.js') }}"></script>

	</body>
</html>
