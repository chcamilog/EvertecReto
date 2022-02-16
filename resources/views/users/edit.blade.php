@extends('layouts.main', ['activePage'=>'users','titlePage'=>'Edit user'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class=col-md-12>
				<form action="{{route('users.update', $user->id)}}" method="post" class="form-horisontal">
					@csrf
					@method("PUT")
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">User</h4>
							<p class="card-category">Edit data</p>
						</div>
						<div class="card-body">
							<div class="row">
								<label for="name" class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
									@if ($errors->has('name'))
										<span class="error text-danger" for="input-name">{{$errors->first('name')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="username" class="col-sm-2 col-form-label">User Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
									@if ($errors->has('username'))
										<span class="error text-danger" for="input-username">{{$errors->first('username')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-7">
									<input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
									@if ($errors->has('email'))
										<span class="error text-danger" for="input-email">{{$errors->first('email')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="password" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="password" placeholder="Enter a new password">
									@if ($errors->has('password'))
										<span class="error text-danger" for="input-password">{{$errors->first('password')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="name" class="col-sm-2 col-form-label">Roles</label>
								<div class="col-sm-7">
									<div class="form-group">
										<div class="tab-content">
											<div class="tab-pane active" id="profile">
												<table class="table">
													<tbody>
														@foreach ($roles as $id => $role)
														<tr>
															<td>
																<div class="form-check">
																	<label class="form-check-label">
																		<input class="form-check-input" type="checkbox" name="roles[]"
																			value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : ''}}>
																		<span class="form-check-sign">
																			<span class="check" value=""></span>
																		</span>
																	</label>
																</div>
															</td>
															<td>
																{{ $role }}
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="card-footer ml-auto mr-auto">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection