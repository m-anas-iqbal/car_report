<div class="usersidemenu">
	<h3>Welcome <span>{{auth()->user()->name}}</span> </h3>
	<h4>You have <span class="user_credits">{{auth()->user()->credits}}</span> credits right now.</h4>
	<div class="list-group">
		<a 
			href="{{route('user.dashboard')}}" 
			class="list-group-item list-group-item-action
				@if(request()->route()->getName() == 'user.dashboard')
					active
				@endif
			" aria-current="true">
			Dashboard
		</a>
		<a 
			href="{{route('user.mygeneratedreports')}}" 
			class="list-group-item list-group-item-action
				@if(request()->route()->getName() == 'user.mygeneratedreports')
					active
				@endif
			">My Generated Reports</a>
		<a 
			href="{{route('user.myreceipts')}}" 
			class="list-group-item list-group-item-action
				@if(request()->route()->getName() == 'user.myreceipts')
					active
				@endif
			">My Receipts</a>
		<a 
			href="{{route('user.generatenewreport')}}" 
			class="list-group-item list-group-item-action
				@if(request()->route()->getName() == 'user.generatenewreport')
					active
				@endif
			">Generate a new VIN Report</a>
		<a 
			href="{{route('user.myprofilesettings')}}" 
			class="list-group-item list-group-item-action
				@if(request()->route()->getName() == 'user.myprofilesettings')
					active
				@endif
			">My Profile Settings</a>
		<a 
			href="{{route('user.changepassword')}}" 
			class="list-group-item list-group-item-action
				@if(request()->route()->getName() == 'user.changepassword')
					active
				@endif
			">

			Change Password
		</a>
		<a href="{{route('user.logout')}}" class="list-group-item list-group-item-action">Logout</a>
	</div>
</div>