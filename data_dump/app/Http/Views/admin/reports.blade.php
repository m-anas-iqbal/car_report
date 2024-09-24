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
									<th>Report ID</th>
									<th>User</th>
									<th width="250">Date</th>
									<th width="150">Download</th>
									<th width="150">Send via Email</th>
								</tr>
							</thead>
							<tbody>
								@foreach($reports as $report)
									<tr>
										<td>{{$report->report_id}}</td>
										<td>{{$report->user->name}}</td>
										<td>{{$report->created_at->format('d-m-Y')}}</td>
										<td>
													
											<a href="/{{$report->report_url}}" class="btn btn-sm btn-primary">Download</a>
										</td>
										<td class="text-center">
											<button type="button" class="btn-secondary btn m-auto btn-sm">
												<i class="fas fa-envelope"></i>
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="card-footer">
                        <div class="card-tools">
                            {{ $reports->links() }}
                          </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection