@extends('layouts.public')
@section('content')
<div class="container-contact100">
	<div class="contact100-map" ></div>
		<div class="wrap-contact100" style="padding: 2%">
			
			<form action="{{ route('user.update', ['id'=>$user->id]) }}" method="POST" class="contact100-form validate-form" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="_method" value="PATCH">
				<span class="contact100-form-title">
					Profile
				</span>
				<div>
				<div class="form-group">
					<table>
					<tbody>
					<tr>
					<td>
						<img src="/storage/uploads/users/{{ $user->image }}" style="width: 100px;height: 100px;border-radius: 50%">
						</td>
					<td >
					<input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" style="margin-left: 3%">
				</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
				<table style="width: 100%">
					<tbody>
					<tr>
						<td>
							<label style="font-family: SourceSansPro-Bold;padding: 5%">Nom :</label>
						</td>
						<td>
							<div class="wrap-input100 validate-input" data-validate="champ est requis">
								<input class="input100" type="text" name="last_name" value="{{ $user->last_name }}">
								<span class="focus-input100"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label style="font-family: SourceSansPro-Bold;padding: 5%">Prénom :</label>
						</td>
						<td>
							<div class="wrap-input100 validate-input" data-validate="champ est requis">
								<input class="input100" type="text" name="first_name" value="{{ $user->first_name }}">
								<span class="focus-input100"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label style="font-family: SourceSansPro-Bold;padding: 5%">Email :</label>
						</td>
						<td>
							<div class="wrap-input100 validate-input" data-validate="champ est requis">
								<input class="input100" type="text" name="email" value="{{ $user->email }}">
								<span class="focus-input100"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label style="font-family: SourceSansPro-Bold;padding: 5%">Adresse :</label>
						</td>
						<td>
							<div class="wrap-input100 validate-input" data-validate="champ est requis">
								<input class="input100" type="text" name="address" value="{{ $user->address }}">
								<span class="focus-input100"></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label style="font-family: SourceSansPro-Bold;padding: 5%">Tel :</label>
						</td>
						<td>
							<div class="wrap-input100 validate-input" data-validate="champ est requis">
								<input class="input100" type="text" name="phone" value="{{ $user->phone }}">
								<span class="focus-input100"></span>
							</div>
						</td>
					</tr>
					@if(!is_null($user->technician))
						<tr>
							<td>
								<label style="font-family: SourceSansPro-Bold;padding: 5%">CIN :</label>
							</td>
							<td>
								<div class="wrap-input100 validate-input" data-validate="champ est requis">
									<input class="input100" type="text" name="cin" value="{{ $user->technician->cin }}">
									<span class="focus-input100"></span>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<label style="font-family: SourceSansPro-Bold;padding: 5%">Post :</label>
							</td>
							<td>
								<div class="wrap-input100 validate-input" data-validate="svp decrivez le post">
									<select id="inputState" class="form-control " style="border-radius: 20px;background:white;border-color: white;box-shadow: 5px 5px 5px 5px #f7f7f7;">
										@foreach([ 'Technicien Hardware', 'Technicien Software', 'Technicien Informatique', 'Ingenieur Informatique'] as $post)
											@if($post === $user->technician->post)
												<option selected value="{{ $post }}">{{ $post }}</option>
											@else
												<option value="{{ $post }}">{{ $post }}</option>
											@endif
										@endforeach
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<label style="font-family: SourceSansPro-Bold;padding: 5%">Bio :</label>
							</td>
							<td>
								<div class="wrap-input100 validate-input" data-validate="champ est requis">
									<textarea class="input100" type="text" name="bio" value="">{{ $user->technician->bio }}
									</textarea>
									<span class="focus-input100"></span>
								</div>
							</td>
						</tr>
						@endif						
				</tbody>
			</table>
			<div style="display:inline;">
				<div class="container-contact100-form-btn">
					<input type="submit" value="valider" class=" contact100-form-btn" style="background: #5BC0DE" />
				</div>
				<div class="container-contact100-form-btn">
					<input type="reset" value="Annuler"  class="contact100-form-btn" style="background:#c00c0d" />						
				</div>
			</div>
			</form>
		@if(Auth::user()->technician and Auth::user()->technician->admin)
			@if(!is_null($user->technician) and !$user->technician->admin)
				<form action="{{ route('admin.makeAdmin', ['id'=>$user->id]) }}" method="post">
					@csrf
					<input type="hidden" name="_method" value="PATCH">
					<div class="container-contact100-form-btn">
						<input type="submit" value="definir comme admin" class=" contact100-form-btn" style="background: limegreen" />
					</div>
				</form>
			@elseif (!is_null($user->technician))
				<form action="{{ route('admin.unmakeAdmin', ['id'=>$user->id]) }}" method="post">
					@csrf
					<input type="hidden" name="_method" value="PATCH">
					<div class="container-contact100-form-btn">
						<input type="submit" value="retirer du admins" class=" contact100-form-btn" style="background: lightcoral" />
					</div>
				</form>
			@endif
		@endif
		
</div>
@endsection