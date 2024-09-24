@extends('admin.layout.master')

@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body p-0">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Credits</th>
									<th width="250">Signup Date</th>
									<th width="250">Last Generated Report</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{$user->id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->phone_number}}</td>
										<td>{{$user->credits}}</td>
										<td>{{$user->created_at->format('d-m-Y')}}</td>
										<td>
											@if($user->reports()->count())
												{{$user->reports()->latest()->first()->vin}}
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="card-footer">
                        <div class="card-tools">
                            {{ $users->links() }}
                          </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection