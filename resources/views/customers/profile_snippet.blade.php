<div class="customer-snippet">
	<div class="customer-photo-container">
    	<img src="/img/default-avatar.png" alt="" class="customer-photo">
    </div>
    <div class="customer-data">
		<a href="{{ route('customers.update', ['id' => $customer->id]) }}" class="customer-name">{{ $customer->getFullName() }}</a>
		{{-- todo: display full customer info --}}
		<ul class="customer-contacts customer-section">
			@foreach ($customer->emails as $email)
	            <li class="customer-email"><a href="#" title="{{ __('Email customer') }}" class="@if ($loop->index == 0) contact-main @endif">{{ $email->email }}</a></li>
	        @endforeach
			@foreach ($customer->getPhones() as $phone)
	            <li class="customer-phone"><a href="#" title="{{ __('Call customer') }}">{{ $phone->value }}</a></li>
	        @endforeach
		</ul>
		<div class="customer-extra">
			@if ($customer->getSocialProfiles() || $customer->getWebsites())
				<div class="customer-social-profiles">
					@if ($customer->getWebsites())
						@foreach ($customer->getWebsites() as $website)
				            <a href="{{ $website }}" target="_blank" title="{{ parse_url($website, PHP_URL_HOST) }}" class="glyphicon glyphicon-globe"></a>
				        @endforeach
					@endif
				</div>
			@endif
			@php
				$location = array_filter([$customer->city, $customer->state,  $customer->country]);
			@endphp
			@if ($customer->company || $customer->job_title || $location)
				<div class="customer-section">
					@if ($customer->company)<div>{{ $customer->company }}</div>@endif
					@if ($customer->job_title)<div>{{ $customer->job_title }}</div>@endif
					@if ($location)<div>{{ implode(', ', $location) }}</div>@endif
				</div>
			@endif
			@if ($customer->background)
				<div class="customer-section">
					{{ $customer->background }}
				</div>
			@endif
		</div>
	</div>
</div>