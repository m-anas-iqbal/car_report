@extends('layout.master')
@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<style>
    .carHistoryBx_button {
    font-size: 16px;
    margin-top:10px;
    margin-bottom:10px;
    border: none;
    padding: 10px 28px;
    font-weight: 600;
    background: var(--primary);
    color: #FFFFFF;
}
.carHistoryBx_button:hover {
    background: var(--secondary);
}
/* Basic style for the select input */
.custom-select {
    font-family: Arial, sans-serif;
    font-size: 16px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    color: #333;
    width: 76%;
    box-sizing: border-box;
}

/* Style for the select input on hover */
.custom-select:hover {
    border-color: #888;
}

/* Style for the select input when focused */
.custom-select:focus {
    outline: none;
    border-color: #5b9dd9;
    box-shadow: 0 0 5px rgba(81, 167, 232, 0.5);
}

/* Style for the options inside the select input */
.custom-select option {
    padding: 10px;
    background-color: #fff;
    color: #333;
}

/* Style for disabled state */
.custom-select:disabled {
    background-color: #eee;
    color: #666;
    border-color: #ddd;
}

/* Custom dropdown arrow */
.custom-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23333" d="M2 0L0 2h4z"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 10px;
}

</style>
@endpush

@section('content')
<section id="topBanner">
    <div class="topBaannerNew py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 my-auto">
                    <div class="">
                        <div class="title">
                            <h3 class="mb-2">
                                Find your Invoice Report For Free  
                            </h3>
                            <h4 class="mb-4">
                                Enter a VIN or Email to Find your invoice Report
                            </h4>
                        </div>
                        <div class="newsBox">
                            <form action="{{ route('find_invoice_post') }}" method="POST">
    @csrf
    <h5 class="mb-2">Select Search By</h5>
    <div class="inputBx">
        <select id="searchType" name="searchType" class="custom-select" required onchange="toggleInputFields()">
            <option value="">Select an option</option>
            <option value="email">E-Mail</option>
            <option value="vin">VIN Number</option>
        </select>
    </div>
    <div id="emailField" class="inputBx" style="display: none;">
        <h5 class="mb-2">E-Mail</h5>
        <input type="email" placeholder="Enter your email"  name="email">
    </div>
    <div id="vinField" class="inputBx" style="display: none;">
        <h5 class="mb-2">Vin Number</h5>
        <input type="text" placeholder="Enter VIN Number"  name="vin">
    </div>
    <button type="submit" class="carHistoryBx_button">Find</button>
</form>

                            <script>
    function toggleInputFields() {
        var searchType = document.getElementById('searchType').value;
        var emailField = document.getElementById('emailField');
        var vinField = document.getElementById('vinField');

        if (searchType === 'email') {
            emailField.style.display = 'block';
            emailField.setAttribute('required', true);
            vinField.style.display = 'none';
            vinField.removeAttribute('required');
        } else if (searchType === 'vin') {
            emailField.style.display = 'none';
            emailField.removeAttribute('required');
            vinField.style.display = 'block';
            vinField.setAttribute('required', true);
        } else {
            emailField.style.display = 'none';
            vinField.style.display = 'none';
            vinField.removeAttribute('required');
            emailField.removeAttribute('required');
        }
    }
</script>
                            @if (\Session::has('error'))
                                <div class="alert alert-danger alert-link find-vin pb-0">
                                    <p class="text-danger">{!! \Session::get('error') !!}</p>
                                </div>
                                   @php
                                \Session::forget('error')
                                @endphp
                            @endif
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	$(document).ready(function(){
		/*
		var homePriceModal = document.getElementById('homePriceModal');
		homePriceModal.addEventListener('show.bs.modal', function(event){
			var button = event.relatedTarget;
			
			var packageName = button.getAttribute('data-package');
			var packageDetails = button.getAttribute('data-package-details');
			
			console.log(packageName);
			console.log(packageDetails);
			
			var modalTitle = homePriceModal.querySelector('#homePriceModalTitle');
			var modalTitleDetails = homePriceModal.querySelector('#homePriceModalDetails');
			modalTitle.textContent = packageName;
			modalTitleDetails.textContent = packageDetails;
			
			$("#modal_package_name").val(packageName);
			
			
		});*/
    $('#check-slider').slick({
        infinite: true,
        autoplay: true,
        speed: 350,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        focusOnSelect: true,
        autoplaySpeed: 4500,
        responsive: [
            {
                breakpoint: 520,
                settings: 
				{
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 991,
                     settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 5000,
                  settings: 'unslick',
            },
        ],
        asNavFor: '#rep-slider',
    });

    $("#rep-slider").slick({
      infinite: true,
                autoplay: true,
                speed: 350,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                asNavFor: '#check-slider',
                autoplaySpeed: 4500,
    });
    var timer;
            $('#rep-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                $('.checks').removeClass('active');
                $('.checks').eq(nextSlide).addClass('active');
            });

            $('#rep-slider').on('afterChange', function () {
               if(window.bLazy){
                   window.bLazy.revalidate();
               }
            });

            $(document).on('click', '.checks', function () {
                if ($(window).width() > 991) {
                    const idx = $(this).data('idx');
                    $('#rep-slider').slick('slickGoTo', idx);
                }
                clearTimeout(timer);
                $('#rep-slider').slick('slickPause');
                timer = setTimeout(function () {
                    $('#rep-slider').slick('slickPlay');
                }, 4000);
            });

            $('#check-slider').on('beforeChange', function () {
                if ($(window).width() < 992) {
                    $('.checks').removeClass('active');
                }
            });
             $('#customer-slider').slick({
                infinite: true,
                autoplay: true,
                speed: 350,
                arrows: false,
                dots: false,
                responsive: [
                    {
                        breakpoint: 9999,
                        settings: "unslick"
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    }
                ]
            });
	});
</script>
@endpush