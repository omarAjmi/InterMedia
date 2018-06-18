<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Responsive & Flat - Un kit pour newsletters gratuit et libre</title>
    <link rel="stylesheet" href="/css/font-awesome.css">
	<style type="text/css" media="screen">

		.ExternalClass * {line-height: 100%}

		/* Début style responsive (via media queries) */

		@media only screen and (max-width: 480px) {
            *[id=email-penrose-conteneur] {width: 100% !important;}
            table[class=resp-full-table] {width: 100%!important; clear: both;}
            td[class=resp-full-td] {width: 100%!important; clear: both;}
            img[class="email-penrose-img-header"] {width:100% !important; max-width: 340px !important;}
        }

        /* Fin style responsive */

	</style>

</head>
<body style="background-color:#ecf0f1">
<div align="center" style="background-color:#ecf0f1;">

		<!-- Début en-tête -->

	<table id="email-penrose-conteneur" width="660" align="center" style="padding:20px 0px;" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="660" class="resp-full-table" align="center" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50%" style="text-align:left;">
							<a href="{{ route('welcome') }}"><img src="/images/log2.png" alt="Logo" border="0" style="width: 50px;height: 50px;"></a>
						</td>
						<td width="50%" style="text-align:right;">
							<table align="right" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td><a href="#"><img src="/images/facebook.png" alt="Facebook" border="0"></a></td>
									<td style="padding-left:10px;"><a href="#"><img src="/images/instagram.png" alt="Instagram" border="0"></a></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

		<!-- Fin en-tête -->

	<table id="email-penrose-conteneur" width="660" align="center" style="border-right:1px solid #e2e8ea; border-bottom:1px solid #e2e8ea; border-left:1px solid #e2e8ea; background-color:#ffffff;" border="0" cellspacing="0" cellpadding="0">

		<!-- Début bloc "mise en avant" -->

		<tr>
			<td style="background-color:#C00C0D">
				<table width="660" class="resp-full-table" align="center" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="resp-full-td" valign="top" style="padding:20px; text-align:center;">
							<span style="font-size:70px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; font-weight:100; color:#ffffff"><a href="{{ route('welcome') }}" style="color:#000000; outline:none; text-decoration:none;">Inter Media</a></span>
                        </td>
                        <tr>
                            <td width="100%" class="resp-full-td" valign="top" style="padding: 0px 20px 20px 20px;">
                                <table align="center" border="0" cellspacing="0" cellpadding="0" style="margin:auto; padding:auto;">
                                    <tr>
                                        <td style="border-radius:3px; padding: 10px 40px;">
                                            <span style="font-size:16px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color: #ffffff">votre portail vers les nouvelles technologies numerique. Vent et Maintenance Materiel Informatique . <br> GSM : (+216) 27 400
                                            850/ (+216) 27 400 852 tél: (+216) 73 448 601.</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
					</tr>
					<tr>
						<td width="100%" valign="top">
							<table align="center" border="0" cellspacing="0" cellpadding="0" style="margin:auto; padding:auto;">
								<tr>
									<td style="text-align:center; padding:0px 20px;">
										<a style="color:#000000;" href="{{ route('welcome') }}#contact">Contacter Nous</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<!-- Fin bloc "mise en avant" -->
		<!-- Début article 1 -->

		<tr>
			<td style="border-bottom: 1px solid #e2e8ea">
				<table width="660" class="resp-full-table" align="center" border="0" cellspacing="0" cellpadding="0" style="padding:20px;">
					<tr>
						<td width="100%">
							<table width="120" align="left" class="resp-full-table" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="100%" class="resp-full-td" style="text-align: center;"><a href=""><img src="/images/chat.png" width="120px" style="border-radius:3px;" alt="Logo" border="0"></a>
									</td>
								</tr>
							</table>
							<table width="1" align="left" class="resp-full-table" border="0" cellpadding="0" cellspacing="0" >
								<tr>
									<td width="100%" height="20"></td>
								</tr>
							</table>
							<table width="480" align="right" class="resp-full-table" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="100%" class="resp-full-td" valign="top" style="text-align : justify;">
										<a href="#" style="outline:none; text-decoration:none"><span style="font-size:25px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;">Bienvenue.</span></a><br />
										<hr align="left" style="width:100px; margin-left:0px; text-align:left; background-color:#C00C0D; color:#C00C0D; height: 2px; border: 0 none;" />
										<span style="line-height: 30px; font-size:16px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131">
                                            Vous avez demandé à profiter de nos services en ligne et à devenir l'un de nos clients.
											<form action="{{ route('user.confirm') }}" method="GET">
												@csrf
												<input type="hidden" name="confirm_hash" value="{{ $user->confirm_hash }}" value="Cliquez ici">
												<input type="submit" style="background-color:#43CD63; border-radius:3px; padding: 6px 24px;"
												 value="Cliquez ici">
											</form>
                                            pour confirmer votre adresse email s'il vous plaît.
                                        </span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<!-- Fin article 1 -->
		
	<!-- Début footer -->

	<table id="email-penrose-conteneur" width="600" align="center" style="padding:20px 0px;" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="600" class="resp-full-table" align="center" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="100%" class="resp-full-td" style="text-align: center;"><span style="font-size:12px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#aeb2b3">Cet email a été envoyé par <a href="{{ route('welcome') }}">Inter Media</a>.</span>
						<hr align="left" style="margin-left:0px; text-align:left; background-color:#aeb2b3; color:#aeb2b3; height: 1px; border: 0 none;" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<!-- Fin footer -->

</div>
</body>
</html>