<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inter-Media Informatique</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
        
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    
</head>
<body>


	<div class="container-contact100">
		<div class="contact100-map" > <img src="/images/b4.jpg" style="width: 100%;height: 100%"></div>

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('order.create') }}" method="POST">
                @csrf
				<span class="contact100-form-title">
					Nouvelle Commande
				</span>
				<table style="width: 100%">
				<tbody>
				<tr>
				<td>
				<label style="font-family: SourceSansPro-Bold;padding: 5%">Panne :</label>
				</td>
				<td><div class="wrap-input100 validate-input" data-validate="champ requis">

					<input class="input100" type="text" name="title" placeholder="">
					<span class="focus-input100"></span>
				</div>
			</td></tr>
				</tbody>
				</table>

				<table style="width: 100%">
				<tbody>
				<tr>
					<td>
				<label style="font-family: SourceSansPro-Bold;padding: 1%">Marque :</label>
				</td>
				<td>
				<div class="wrap-input100 validate-input" data-validate = "champ requis">
					<input class="input100" type="text" name="device_brand" placeholder="">
					<span class="focus-input100"></span>
				</div>
					</td></tr>
				</tbody>
				</table>
				<table style="width: 100%">
				<tbody>
				<tr>
				<td>
				<label style="font-family: SourceSansPro-Bold;padding: 5%">model :</label>
				</td>
				<td><div class="wrap-input100 validate-input" data-validate="champ requis">

					<input class="input100" type="text" name="device_model" placeholder="">
					<span class="focus-input100"></span>
				</div>
			</td></tr>
				</tbody>
				</table>
				
				<table style="width:100%;position: relative;margin-bottom: 10%">
					<tbody >
					<tr style="margin-bottom: 50px">
					<td style="width: 15%;">
						
					
				
				<label style="font-family: SourceSansPro-Bold;position: relatives;padding-top: 50%">Couleur :</label>
				</td>
				<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#ededc0">
				<span class="checkmark" style=" background-color: #ededc0;
				"></span>

				</label>
			</td>	
					<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#000000">
				<span class="checkmark" style=" background-color: #000000;
				"></span>

				</label>
			</td>
					<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#0000FF">
				<span class="checkmark" style=" background-color: #0000FF;
				"></span>

				</label>
			</td>
				<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#A52A2A">
				<span class="checkmark" style=" background-color: #A52A2A;
				"></span>

				</label>
			</td>
				<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#FFD700">
				<span class="checkmark" style=" background-color: #FFD700;
				"></span>

				</label>
			</td>
				<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#008000">
				<span class="checkmark" style=" background-color: #008000;
				"></span>

				</label>
			</td>
				<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#DAA520">
				<span class="checkmark" style=" background-color: #DAA520;
				"></span>

				</label>
			</td
			
			
			</tr>

			<tr>
					<td style="width: 15%;">
						
					
				
				<label style="font-family: SourceSansPro-Bold;position: relatives;">&nbsp;</label>
				</td>
				<td >
				
				<label class="container">
				<input type="radio" name="device_color" value="#FFC0CB">
				<span class="checkmark" style=" background-color: #FFC0CB;
				"></span>
				</label>
			</td>
			
			<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#800080">
				<span class="checkmark" style=" background-color: #800080;
				"></span>

				</label>
			</td>
			<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#FF0000">
				<span class="checkmark" style=" background-color: #FF0000;
				"></span>

				</label>
			</td>
			<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#FFA500">
				<span class="checkmark" style=" background-color: #FFA500;
				"></span>

				</label>
			</td>
			<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#C0C0C0">
				<span class="checkmark" style=" background-color: #C0C0C0;
				"></span>

				</label>
			</td>
			<td >
			
				<label class="container">
				<input type="radio" name="device_color" value="#FFFFFF">
				<span class="checkmark " style=" background-color: #FFFFFF;border: 0.5px solid black;border-radius: 50%
				"></span>

				</label>
			</td>
		
</tr>
		</tbody>
		</table>
				<table style="width: 100%;">
				<tbody>
				<tr>
				<td style="width: 20%">
				<label style="font-family: SourceSansPro-Bold;">Accessoire :</label>
				</td>
				<td><div class="wrap-input100 validate-input" data-validate="">

					<input type="text" name="device_accessories" value="chargeur" class="input100" data-role="tagsinput" >
					<span class="focus-input100"></span>
				</div>
			</td></tr>
				</tbody>
				</table>

				<div style="display:inline;">
				<div class="container-contact100-form-btn">
					<input type="submit" value="valider" class=" contact100-form-btn" style="background: #5BC0DE" />
					</div>	
				
				<div class="container-contact100-form-btn">
					<input type="reset" value="reset"  class="contact100-form-btn" style="background:#c00c0d" />
						
				</div>
		</div>
				
			
			</form>

			
		</div>
	</div>

    <script src="/js/jquery.min.js"></script> 
    <script src="/js/bootstrap-tagsinput.min.js"></script>
	<script src="/js/main.js"></script>


</body>
</html>
