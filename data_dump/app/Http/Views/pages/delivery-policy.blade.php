@extends('layout.master')

@section('content')
    <div class="termsBx">
        <div class="pageBanner">
            <h1 style="text-align: center">Delivery Policy</h1>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="/">Home</a>
                </li>
                <li class="list-inline-item">
                    /
                </li>
                <li class="list-inline-item active">
                    Delivery Policy
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <p>
                            At {{ config('app.name') }} Report, we understand the importance of timely delivery of vehicle inspection reports to our customers.
                            Our delivery policy outlines our commitment to providing accurate and efficient delivery of inspection reports.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Inspection Report Timeline</h2>
                        <p>
                            Our aim is to deliver inspection reports instantly or within 24-48 hours of payment. The inspection report will be
                            made available to the customer via the website or email. In the event of any unexpected delays, the customer will be
                            notified as soon as possible.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Inspection Report Format</h2>
                        <p>
                            All inspection reports will be delivered in a digital format, easily accessible and readable through any device with
                            an internet connection. The report will include an evaluation of the vehicle gathered from different resources.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Inspection Report Accuracy</h2>
                        <p>
                            We take great care in ensuring the accuracy of our inspection reports, if the customer finds any inaccuracies in the
                            inspection report, they may contact us to request a refund.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Revisions and Feedback</h2>
                        <p>
                            We welcome feedback and suggestions from our customers to help us continuously improve our services. If the customer is
                            not satisfied with the inspection report, they may request revisions until they are completely satisfied with the results.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Acceptance of Deliverables</h2>
                        <p>
                            Upon delivery of the final inspection report, the customer will have a reasonable period of time to review and accept the report.
                            Once the report has been accepted, we will consider the inspection to be complete, and payment for services rendered will be due in
                            accordance with our payment terms.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Contact Us</h2>
                        <p>
                            If you have any questions or concerns about our delivery policy, please contact us at
                            <a href="></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection