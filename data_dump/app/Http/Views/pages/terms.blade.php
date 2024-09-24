@extends('layout.master')

@section('content')
    <div class="termsBx">
        <div class="pageBanner">
            <h1 style="text-align: center">Terms & Conditions</h1>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="/">Home</a>
                </li>
                <li class="list-inline-item">
                    /
                </li>
                <li class="list-inline-item active">
                    Terms & Conditions
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <p>
                            Welcome to {{ config('app.name') }}, which {{ config('app.name') }} (“we,” “us,” “our”) owns. To
                            remain on this site and access its features, we ask that you agree to comply with our Terms of
                            Service. Along with the NMVTIS Disclaimer and Privacy Policy , our Terms of Service define your
                            interactions with this website.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>1. AGREEMENT TO BE BOUND - CHANGES TO TERMS</h2>
                        <p>
                            This document is a legal agreement between you and {{ config('app.name') }} that outlines the
                            rules dictating how you may use our products and services, (“Services,”) which are made
                            available through our Website, <a href="#">http://www.{{ config('app.name') }}</a>. Any use of the Website,
                            products, or services constitutes an acceptance by you to be bound by these Terms.
                        </p>
                        <p>
                            We may update these Terms at our discretion and from time to time, which may include future
                            terms, licenses, and other policies or procedures. In such an event we will notify you through
                            email and by prominently posting a notice to the Website. Do not use our Services if you do not
                            agree to such changes. If you continue to use {{ config('app.name') }} after any posted changes
                            your use will indicate your agreement to the modified Terms.
                        </p>
                        <p>
                            We reserve the right to refuse access to any Service for any reason or no reason, including
                            non-compliance with these Terms.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>2. DESCRIPTION OF {{ config('app.name') }} SERVICE</h2>
                        <p>
                            We provide critical, real-time data through Vehicle History Reports and Auto Auction Records
                            Reports to automotive dealers and consumers who are interested in purchasing used vehicles.
                            Additionally, we offer Vehicle Inspection Reports and complementary services that include a VIN
                            Decoder and Vehicle Recalls Check. Our Vehicle History Reports contain data that the National
                            Motor Vehicle Title Information System (NMVTIS) provides and both lien and theft information
                            that NMVTIS does not provide. Our Vehicle History Reports may contain information from the auto
                            auction database if the vehicle has ever been sold via auction. This includes photos and details
                            that the public has access to on the auto auction website when the vehicle was available for
                            sale. We also offer this information in {{ config('app.name') }} Auto Auction Records
                            Reports. {{ config('app.name') }} Vehicle Inspection Reports are made up of data from our
                            representatives that perform the vehicle inspections
                        </p>
                        <p>
                            We do not warrant that the information we provide in these reports is always accurate, timely,
                            or complete. It is provided for informational purposes only and should not be relied upon as the
                            sole source of information when purchasing a used vehicle. Any reliance is at the user’s own
                            risk. We cannot be held liable for any purchases you make in reliance on our reports.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>3. AGE REQUIREMENTS FOR USE OF SERVICE</h2>
                        <p>
                            {{ config('app.name') }}'s services are accessible to those who are age 13 and older, but those
                            who are under the age of 18 must obtain and hereby warrant that they so they have obtained
                            parental or guardian consent where the parent or guardian agrees to be also bound by these same
                            Terms.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>4. SOFTWARE AND HARDWARE REQUIREMENTS</h2>
                        <p>
                            To use {{ config('app.name') }}'s services, you do need Internet access and certain software
                            that you may be responsible to pay for. Additionally, upgrades and updates are likely to be
                            needed occasionally. We recommend high speed Internet to access our site because performance may
                            be hindered otherwise. We do not warrant that your computer or device will be compatible with
                            the Services. We shall not be responsible for your failure to access the site or our Services,
                            and no refunds shall be granted in such an event.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>5. WHAT YOU SHOULD AND SHOULD NOT EXPECT FROM {{ config('app.name') }}</h2>
                        <p>
                            QUALITY AND DELIVERY While we endeavor to provide uninterrupted service, we cannot guarantee
                            that you will never experience disruptions, omissions, inaccuracies, or delays. As you may be
                            accessing {{ config('app.name') }}'s services on a cellular system, Internet lines, or a public
                            switched telephone network, power outages or other interruptions may occur that are out of our
                            control
                        </p>
                        <p>
                            TECHNICAL IMPROVEMENT AND MAINTENANCE We may, at any time, change our Service offerings to
                            ensure regulation compliance and to make certain our offerings are up-to-date. Repairs or
                            updates to our system may necessitate that we limit or even suspend services.
                        </p>
                        <p>
                            CONTENT OF COMMUNICATIONS We do not have the ability to control any content that is
                            disseminated by the use of our Services. Content is the sole responsibility of the entity that
                            originates it. Because of this, there is the possibility that content you encounter may be
                            offensive, illegal, or otherwise questionable or it may be inaccurate, untimely, or
                            erroneous.
                        </p>
                        <p>
                            GENERAL PRACTICES REGARDING USE AND STORAGE We do not accept liability for any content that we
                            maintain. Additionally, we do not accept responsibility for information that is deleted or
                            transmitted from the system. We have the right to limit use of our Services at any time.
                        </p>
                        <p>
                            CONTENT OF THE SERVICE We may, at any time, delete or refuse to disseminate any content that
                            appears via our Services. This may result in errors and inaccuracies in reports or the
                            untimeliness of the same. {{ config('app.name') }} is not responsible for any third-party
                            content and may access and/or disclose information it believes needed to:
                        </p>
                        <p>
                            meet any legal requirements
                        </p>
                        <p>
                            enforce these terms of service
                        </p>
                        <p>
                            protect from cyber threats and technical problems
                        </p>
                        <p>
                            answer user concerns
                        </p>
                        <p>
                            secure the integrity of {{ config('app.name') }}, its users, and the public
                        </p>
                        <p>
                            TERMINATION In addition to altering these Terms at any time, {{ config('app.name') }} also may
                            terminate its Services at any time and/or your use thereof, with or without cause.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>6. WHAT {{ config('app.name') }} EXPECTS FROM YOU</h2>
                        <p>
                            You are required to have an {{ config('app.name') }} account to use our Services. We generally
                            limit registrations to unique individuals, and account transfers are typically not granted.
                        </p>
                        <p>
                            Account information must be the same as information an individual uses for his or her
                            identification method. Single individuals or legal entities may use an account. Should you
                            create an additional account, you may have to pay additional fees. You must also obtain our
                            written permission to transfer your account to any third party. It is not our policy to withhold
                            consent to the transfer of an account in good standing.
                        </p>
                        <p>
                            We may suspend or terminate your account at any time for any reason without notification.
                            Should we do so, you will not receive a refund or be compensated in any way for remaining
                            subscription time or anything else
                        </p>
                        <p>
                            Remedial actions may be taken against delinquent accounts
                        </p>
                        <p>
                            If you breach the Terms of Service or are late on a payment, resulting in your account being
                            suspended or terminated, {{ config('app.name') }} reserves the right to suspend or terminate any
                            account that you or anyone associated with your organization have.
                        </p>
                        <p>
                            To retain access and maintain your electronic records, you may need to have specific hardware
                            and software. By submitting data to {{ config('app.name') }}, you acknowledge your agreement to
                            abide by our terms of service and pay for transactions you agree to take part in on our website.
                            This includes notices of cancellation, contacts, applications, and policies.
                        </p>
                        <p>
                            You will not rely on an {{ config('app.name') }} report as the sole basis for a vehicle
                            purchasing decision
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>7. PAID SERVICES/AGREEMENT TO PAY</h2>
                        <p>
                            We reserve that right to change prices and the availability of our Services at any time.
                        </p>
                        <p>
                            We require you to have an account to use our Services, which requires payment of a fee. Visit
                            the Services section of our website for information about fees
                        </p>
                        <p>
                            We may change our billing methods or fees at any time. Clients with a monthly subscription
                            for {{ config('app.name') }} services will be given 30 days’ notice via our Terms of Service
                            posted on {{ config('app.name') }}.
                        </p>
                        <p>
                            Should you elect to cancel your subscription, you may do so at any time. Any fees that are on
                            your account will not be refunded or prorated. Additionally, we may charge you for any
                            applicable sales tax
                        </p>
                        <p>
                            Account holders are solely responsible for any incurred charges. This includes all purchases
                            and applicable taxes, even purchases that are made unlawfully, fraudulently, and without your
                            authorization. If you believe your account has been compromised you should immediately contact
                            us.
                        </p>
                        <p>
                            Charges or fees of any sort that you incur via a third-party linked to
                            on {{ config('app.name') }} are your responsibility.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>8. INTELLECTUAL PROPERTY RIGHTS</h2>
                        <p>
                            U.S. and international intellectual property laws protect {{ config('app.name') }} Rights, made
                            up of the Services that we offer and own all right, title, and interest to. As a user of our
                            Services, you agree not to copy, modify, or create derivative works based off of our offerings.
                            Additionally, you will not use any automated or manual process to copy or monitor our content.
                        </p>
                        <p>
                            You are not allowed to use our Service marks, logos, trademarks, trade names, or any other
                            brand features without written permission from us. Third-party content that appears in our
                            Services is not included in {{ config('app.name') }} Rights. Conversely, we are not responsible
                            for any content that you post to our website directly or via a third party. As such, you are
                            responsible for protecting your intellectual property. Your posting of content on our Services
                            constitutes your intent to allow {{ config('app.name') }} a worldwide, non-exclusive,
                            royalty-free license to use such content as we deem appropriate. Content posted via our Services
                            remains posted at our discretion.
                        </p>
                        <p>
                            Information that you self-report, personal or otherwise, is authorized for us to use as
                            outlined in our Privacy Policy. We may also share this information with third parties and call
                            centers for their use. Additionally, your submission of this information authorizes us, third
                            parties, and call centers to use your phone number to contact you. Do not submit your
                            information if you do not wish to be contacted via telephone.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>9. GENERAL COMPLIANCE WITH LAWS</h2>
                        <p>
                            {{ config('app.name') }} operates its services from offices located in the United States. Your
                            use of our Services affirms that you comply with all applicable laws, statutes, ordinances, and
                            regulations.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>10. ENFORCEMENT OF THESE TERMS</h2>
                        <p>
                            We may use any means we feel necessary to enact all terms of service in this agreement. This
                            includes {{ config('app.name') }}'s need to comply with all related legal processes. Your use
                            of {{ config('app.name') }}'s services means you submit to us the right to disclose any
                            volunteered information to law enforcement authorities, municipal entities, or others reasonably
                            necessary for compliance purposes without liability to you.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>11. NO RESPONSIBILITY FOR THIRD-PARTY MATERIALS OR WEB SITES</h2>
                        <p>
                            Third-party content that appears on {{ config('app.name') }} and third-party websites that we
                            link to are not the responsibility of {{ config('app.name') }}. We do not make any
                            representations regarding the accuracy, timeliness, or completeness of any report. Additionally,
                            we will not have any liability or responsibility for third-party collected data or the accuracy,
                            timeliness, or completeness of any report. This includes information that is related to the
                            condition, safety, marketability, merchantability, quality, ownership history, and accident
                            history of any passenger motor vehicle or data contained in or omitted from a passenger motor
                            vehicle ownership or registration document that any state in the United States issues, including
                            the District of Columbia, or any Canadian province. We are in no way responsible for your use of
                            any third-party materials or any purchase decision you make in reliance on the same.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>12. DISCLAIMER OF WARRANTIES - LIABILITY LIMITATIONS</h2>
                        <p>
                            You acknowledge that we may discontinue our Services occasionally and that we may cancel the
                            Services at any time without notifying you.
                        </p>
                        <p>
                            In no way do we provide warranties of any kind, including all implied warranties of
                            merchantability, fitness for a particular purpose, title, and non-infringement. Services are
                            provided “as is” and “as available.” Your jurisdiction may not allow the exclusion of implied
                            warranties. There are also no warranties provided for any vehicle for which information is
                            listed on {{ config('app.name') }} or that we may transmit to you. This includes any information
                            that may be contained in a vehicle history report, auto auction records report, vehicle
                            inspection report, or from either our VIN decode service or vehicle recalls check service. We do
                            not endorse, certify, authorize, authenticate, or otherwise make any representation regarding
                            the accuracy, timeliness, or completeness of any vehicle, vehicle ownership document, or vehicle
                            registration document that you may be provided via any of our Services or that a third-party
                            supplier may send you. Other collected information may not accurately reflect vehicle history,
                            including whether a vehicle was junked, salvaged, dismantled, rebuilt, reconstructed, damaged or
                            tampered with in any way. {{ config('app.name') }} is not liable for any damages resulting from
                            the use of, or non-use of, this information. You assume the risk in relying on
                            any {{ config('app.name') }} report when making a vehicle purchasing decision
                        </p>
                    </div>
                    <div class="mb-4">
                        <p>
                            {{ config('app.name') }} and any of its affiliates may not be held liable for indirect,
                            special, consequential, or punitive damages of any kind, including loss of use, data, or
                            profits, whether in an action in contract, tort, or that arises out of or in any way connected
                            with:
                        </p>
                        <p>
                            An inability to utilize {{ config('app.name') }}, its content, or any services it provides.
                        </p>
                        <p>
                            Inaccurate content due to errors or omissions available through {{ config('app.name') }}, its
                            software, products, or services
                        </p>
                        <p>
                            Costs associated with the procurement of alternative goods and services purchased or obtained
                            via website transactions
                        </p>
                        <p>
                            Alteration of your transmissions or data and unauthorized access
                        </p>
                        <p>
                            Third party conduct or statements that appear on our site
                        </p>
                        <p>
                            Performance failures or delays that are the result of an act of force majeure
                        </p>
                        <p>
                            All other {{ config('app.name') }} related matters, including those
                            that {{ config('app.name') }} and its representatives have been advised of
                        </p>
                        <p>
                            Discontinued use of {{ config('app.name') }} is your sole means of remedying any
                            dissatisfaction with the site and/or site-related services, including any dissatisfaction with a
                            report. Laws that are applicable to you may not allow the limitation of liability, implied
                            warranties, or the exclusion or limitation of certain damages set forth previously. Therefore,
                            this limitation of liability may not be applicable. Our aggregate liability in instances where
                            liabilities would have otherwise been limited shall not be more than $100.
                        </p>
                        <p>
                            As we do not have any control over how you may use information you obtain from our site or the
                            validity of that information, we do not accept any responsibility for any injury or damage that
                            you may cause or be the victim of, including but not limited to those injuries or damages that
                            may arise from or relate to your reliance on an {{ config('app.name') }} report in making a
                            vehicle purchasing decision.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>INDEMNIFICATION</h2>
                        <p>
                            Your use of our Services is affirmation that you will indemnify, defend and hold
                            harmless {{ config('app.name') }} and its affiliates harmless with respect to any claim that may
                            arise out of or relate to your breach of this agreement, how you use our Services and any
                            report, or any action that {{ config('app.name') }} may take due to investigations of potential
                            or actual agreement violations.
                        </p>
                        <p>
                            {{ config('app.name') }} vehicle inspection services terms and conditions
                        </p>
                        <p>
                            Not Experts, No Authentication. {{ config('app.name') }} affiliates who perform vehicle
                            inspections are not experts in any field. They do not have or apply special or specific skills,
                            knowledge, or expertise to provide vehicle inspections. Reports reflect layperson inspections
                            and opinions, arrived at during the time of a personal examination that will not include a test
                            drive of any kind. {{ config('app.name') }} is not liable for any damages resulting from the use
                            of, or non-use of, this information. Should you rely on any {{ config('app.name') }} inspection,
                            you do so at your own risk
                        </p>
                        <p>
                            No Guarantee. Information contained in our reports is not guaranteed. It may not be accurate,
                            timely, or complete. Additionally, as it is atypical for us to take possession of vehicles, we
                            cannot guarantee that substitutions or changes will not be made after our inspection is
                            completed. We offer no guarantee regarding the condition of any vehicle.
                        </p>
                        <p>
                            Authorized Communications. Inspectors may not be communicated with directly. Additionally, only
                            an individual who places an order may contact us regarding said order
                        </p>
                        <p>
                            Scope of Order. We are not required to divulge any information or facts not within the express
                            scope of an order that are not contained in our expressly described services.
                        </p>
                        <p>
                            Order Fulfillment Policy. Our goal is to provide you with your report no later than four
                            business days following your order placement. Due to unforeseeable volume and other factors, we
                            do not guarantee this timeline, it is simply a goal.
                        </p>
                        <p>
                            Cancellation Policy. We will not issue refunds for orders canceled after an inspector begins
                            implementing an order. If an order is canceled prior to an inspector starting to implement the
                            order, we will refund 50% of the order price. We define implementing the order as the inspector
                            having made an appointment with the owner/seller of the vehicle or having arrived at the
                            property where the owner/seller has the vehicle located.
                        </p>
                        <p>
                            Title to Goods or Property. We do not verify, warranty, or guarantee that the person we conduct
                            our inspection with actually owns the vehicle.
                        </p>
                        <p>
                            Use of subcontractors. We reserve the right to subcontract our Services as we see fit
                        </p>
                        <p>
                            Maximum Inspection Time. At most our inspector will spend 15 minutes examining the vehicle for
                            which you have ordered an inspection. The exception to this is any approved custom order that
                            necessitates more time for examination.
                        </p>
                        <p>
                            No Shows. You will be charged the full fee of the inspection if our inspector connects with the
                            owner and sets a time to perform the inspection. The charge will still be applied even if the
                            seller fails to appear at the site of the inspection at the appointed time and we do
                        </p>
                        <p>
                            Entry Upon Private Property. Should we find it necessary to enter private property to complete
                            your order, it will be your responsibility to secure any required consent and provide us with
                            confirmation of that consent. We will not be held responsible for expenses or losses of any sort
                            that we may incur when gaining entry to private property to complete your order
                        </p>
                        <p>
                            No Offer. We provide our Services in the United States only. We do not offer or promise to
                            provide any service or product of ours or any third party available to you. The collection of
                            your self-reported information does not constitute an attempt by us or any third parties to sell
                            services or products in any jurisdiction where they are unauthorized
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>15. CHANGES</h2>
                        <p>
                            We may revise our Terms of Service or services at any time. Such changes are effective
                            immediately, and you show you accept these changes with your continued use of our Services.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h2>16. NOTICES</h2>
                        <p>
                            Notices regarding our Services are effective immediately and may be sent to you via the email
                            address you have entered in your account contact information. Alternatively, we may send you a
                            letter via postal mail to the address that you have entered in your account contact information.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>17. GOVERNING LAW</h2>
                        <p>
                            The internal law of the State of Florida shall govern any questions that concern the validity,
                            construction, and interpretation of these Terms of Service. Suits, actions, or proceedings
                            related to these Terms of Service shall be brought in the court in Miami-Dade County, State of
                            Florida. Parties irrevocably waive, to the fullest extent that the law allows, any objection it
                            may have presently or in the future to the agreed upon venue in any such suit, action, or
                            proceeding. The final judgment resulting from any such suit, action, or proceeding that is
                            brought in any such court shall be binding and enforceable in any court that the party is
                            subject to jurisdiction by a suit upon such judgement.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h2>18. MISCELLANEOUS</h2>
                        <p>
                            Should any portion of these Terms of Service be found invalid or unenforceable, it will not
                            negate the remaining portions, which will still be in full force and effect. These Terms of
                            Service serve as our agreement with you and dictate your use of our Services, excluding any
                            previous agreements between you and us. Our failure to enforce a provision or right contained
                            within the Terms of Service does not negate that provision or right, or any other aspect of
                            these Terms of Service. Bear in mind that you may subject yourself to terms and conditions of
                            others when you access affiliate services, third-party content, or third-party software. We will
                            not be responsible for an inability to fulfill any obligations because of conditions that are
                            not within our control.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>19. Feedback and Information</h2>
                        <p>
                            We are free to use any feedback you submit via this site in any manner we
                            see fit.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>NMVTIS Consumer Access Product Disclaimer</h2>
                        <p>
                            The National Motor Vehicle Title Information System (NMVTIS) is an electronic system that
                            contains information on certain automobiles titled in the United States. NMVTIS is intended to
                            serve as a reliable source of title and brand history for automobiles, but it does not contain
                            detailed information regarding a vehicle’s repair history.
                        </p>
                        <p>
                            All states, insurance companies, and junk and salvage yards are required by federal law to
                            regularly report information to NMVTIS. However, NMVTIS does not contain information on all
                            motor vehicles in the United States because some states are not yet providing their vehicle data
                            to the system. Currently, the data provided to NMVTIS by states is provided in a variety of time
                            frames, while some states report and update NMVTIS data in “real-time” (as title transactions
                            occur), other states send updates less frequently, such as once every 24 hours or within a
                            period of days.
                        </p>
                        <p>
                            Information on previous, significant vehicle damage may not be included in the system if the
                            vehicle was never determined by an insurance company (or other appropriate entity) to be a
                            “total loss” or branded by a state titling agency. Conversely, an insurance carrier may be
                            required to report a “total loss” even if the vehicle’s titling-state has not determined the
                            vehicle to be “salvage” or “junk.”
                        </p>
                        <p>
                            A vehicle history report is NOT a substitute for an independent vehicle inspection. Before
                            making a decision to purchase a vehicle, consumers are strongly encouraged to also obtain an
                            independent vehicle inspection to ensure the vehicle does not have hidden damage. The Approved
                            NMVTIS Data Providers (look for the NMVTIS logo) can include vehicle condition data from sources
                            other than NMVTIS.
                        </p>
                        <p>
                            NMVTIS data INCLUDES (as available by those entities required to report
                            to the System):
                        </p>
                        <p>
                            Information from participating state motor vehicle titling agencies
                        </p>
                        <p>
                            Information on automobiles, buses, trucks, motorcycles, recreational vehicles, motor homes, and
                            tractors. NMVTIS may not currently include commercial vehicles if those vehicles are not
                            included in a state’s primary database for title records (in some states, those vehicles are
                            managed by a separate state agency), although these records may be added at a later time.
                        </p>
                        <p>
                            Information on “brands” applied to vehicles provided by participating state motor vehicle
                            titling agencies. Brand types and definitions vary by state, but may provide useful information
                            about the condition or prior use of the vehicle
                        </p>
                        <p>
                            Most recent odometer reading in the state’s title record
                        </p>
                        <p>
                            Information from insurance companies, and auto recyclers, including junk and salvage yards,
                            that is required by law to be reported to the system, beginning March 31, 2009. This information
                            will include if the vehicle was determined to be a “total loss” by an insurance carrier
                        </p>
                        <p>
                            Information from junk and salvage yards receiving a “cash for clunker” vehicle traded-in under
                            the Consumer Assistance to Recycle and Save Act of 2009 (CARS) Program.
                        </p>
                        <p>
                            Consumers are advised to visit vehiclehistory.bja.ojp.gov for details on how to interpret the
                            information in the system and understand the meaning of various labels applied to vehicles by
                            the participating state motor vehicle titling agencies.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>NVS Data Disclaimer</h2>
                        <p>
                            {{ config('app.name') }} uses the National Vehicle Service (NVS) database to obtain lien
                            information for use in Vehicle History Reports. This information is presented “as is,” and NVS
                            records may not be complete, timely, or accurate. We make no warranty, expressed or implied, as
                            to the validity of this data. Your reliance on any NVS database information included in any
                            report is at your sole risk.
                        </p>
                        <p>
                            {{ config('app.name') }} Vehicle Inspection Report Disclaimer
                        </p>
                        <p>
                            Vehicle Inspection Reports that we prepare should not be considered as a recommendation for
                            making a bid or a purchase as they may not be complete, timely, or accurate. It is not our
                            policy to perform appraisals or issue value opinions of any kind, unless we agree specifically
                            in writing to the contrary when you place your order. {{ config('app.name') }} is not liable for
                            any damages resulting from the use of, or non-use of, this information. Your reliance on
                            any {{ config('app.name') }} report is at your sole risk.
                        </p>
                        <p>
                            {{ config('app.name') }} free services Disclaimer
                        </p>
                        <p>
                            We offer free services--our VIN Decoder, Vehicle Recalls Check, and
                            Auto Auctions Check.
                        </p>
                        <p>
                            Our VIN Decoder validates coded information and presents it in a breakdown that includes: Model
                            Year, Make, Model, Trim, Country of Manufacture, Engine Type, Body Style. We do not guarantee
                            decoded VIN information. {{ config('app.name') }} is not liable for any damages resulting from
                            the use of, or non-use of, this information. Your reliance on any information obtained by using
                            our VIN Decoder is at your sole risk.
                        </p>
                        <p>
                            Our Vehicle Recalls Check uses the year, make, and model of a vehicle to identify open recalls
                            on specific vehicles. Information that the check uses comes “as is” from the National Highway
                            Traffic Safety Administration (NHTSA). Recalls must be remedied at no cost to consumers under
                            federal law. Recalls, except those involving tires, are in effect for the lifetime of a vehicle.
                            The Department of Transportation (DOT) is responsible for updating recall information weekly. We
                            do not guarantee that such information is accurate, timely, or complete and will not be held
                            liable for the accuracy or completeness of this data. {{ config('app.name') }} is not liable for
                            any damages resulting from the use of, or non-use of, this information. Your reliance on any
                            Vehicle Recall Check is at your sole risk.
                        </p>
                        <p>
                            Contact your vehicle’s manufacturer if you have questions about vehicle recall information. The
                            NHTSA Auto Safety Hotline number is 1-888-DASH-2-DOT (1-888-327-4236).
                        </p>
                        <p>
                            Our Auto Auction Check will analyze any VIN you enter to determine if a vehicle has ever been
                            on sale at auto auctions. We do not guarantee this information’s accuracy, timeliness, or
                            completeness. Once our VIN Decoder has verified the VIN, you can get one free vehicle
                            photo. {{ config('app.name') }} is not liable for any damages resulting from the use of, or
                            non-use of, this information. Your reliance on any Auto Auction Check is at your sole risk.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>Dealer Program Terms</h2>
                        <p>
                            This Agreement is established between {{ config('app.name') }} and the subscribing partner and
                            forms the terms and conditions for the partner’s use of the {{ config('app.name') }} Dealer or
                            Reseller. Per the conditions of this program, {{ config('app.name') }} will provide the partner
                            with NMVTIS Vehicle History Reports for resale as the Agreement specifies.
                        </p>
                        <h3>1. Payment &amp; Fees</h3>
                        <p>
                            {{ config('app.name') }} allows the partner to purchase wholesale quantities of its services
                            for use or resale
                        </p>
                        <p>
                            The partner prepays report credits that do not expire, with the cost of each purchase dependent
                            on the quantity of that purchase.
                        </p>
                        <p>
                            {{ config('app.name') }} may charge any transaction fees, taxes, and fees of any other kind to
                            cover the costs associated with delivering payment
                        </p>
                        <p>
                            Payments sent to {{ config('app.name') }} are non-refundable with the following exceptions: (a)
                            unused credits can be refunded within 30 days of payment, (b) accidental payment, (c) as agreed
                            upon by us in writing
                        </p>
                        <p>
                            {{ config('app.name') }} may change its pricing structure without advanced notice. At that time
                            both parties will have the option to reimburse payments for any unused balance of credits.
                        </p>
                        <h3>2. NMVTIS Requirements</h3>
                        <p>
                            To ensure adequate technical and marketing support to end users, eligibility for the partner to
                            begin marketing and reselling services to the public is subject to {{ config('app.name') }} and
                            American Association of Motor Vehicle Administrators’ testing, audit, and approval
                        </p>
                        <p>
                            The partner agrees that any agreements that it may enter into with vendors or sub-partners
                            relating to providing NMVTIS Consumer Access shall include a provision that stipulates vendors
                            of this sort will be subject to AAMVA audit
                        </p>
                        <p>
                            The partner shall have no ownership rights to any NMVTIS data. The exception to this will be if
                            the partner obtains separate authorization.
                        </p>
                        <p>
                            The partner agrees to prominently disclose to all eligible users the NMVTIS Consumer Access
                            Disclaimer. This includes modifications to this disclaimer as are furnished.
                        </p>
                        <h3>3. Relationships</h3>
                        <p>
                            The partner is an independent contractor engaged in purchasing {{ config('app.name') }}products
                            for its own use or for customer resale. The partner has no authority to act for, bind, or commit
                            on our behalf as an agent or legal representative
                        </p>
                        <p>
                            The partner has no authority to make any commitment on {{ config('app.name') }}'s behalf with
                            respect to quantities, delivery, modifications, interfacing capability, suitability of software
                            or suitability in specific applications.
                        </p>
                        <p>
                            The partner has no authority to make any commitment on {{ config('app.name') }}'s behalf with
                            respect to the accuracy, timeliness, or completeness of any {{ config('app.name') }} report or
                            information provided by {{ config('app.name') }} for resale. {{ config('app.name') }} is not
                            liable for any damages resulting from the use of, or non-use of, this information.
                        </p>
                        <p>
                            The partner will not represent itself in any way as an agent or branch
                            of {{ config('app.name') }}. The partner will immediately discontinue any representation or
                            business practice that we find to be misleading or deceptive.
                        </p>
                        <h3>4. Term, Limitations, Termination</h3>
                        <p>
                            This agreement is effective as of acceptance and shall continue in force until either the
                            partner or {{ config('app.name') }} terminates it as provided in this Agreement
                        </p>
                        <p>
                            {{ config('app.name') }} or the partner may terminate this Agreement without cause at any time
                            with written notice. Neither the expiration nor earlier termination of this Agreement shall
                            relieve either party from any obligation that has accrued as of the date of termination
                        </p>
                        <p>
                            {{ config('app.name') }} may provide the partner written notice of amendments to this
                            Agreement. Such amendments will automatically become a part of this Agreement within seven days
                            from the date of the notice, unless otherwise specified in the notice
                        </p>
                        <h3>5. Product Changes</h3>
                        <p>
                            {{ config('app.name') }} does not guarantee that it will provide any particular product or
                            service indefinitely or even a specific period. {{ config('app.name') }} may elect to modify any
                            of the specifications or characteristics of its products, to remove any product from the market,
                            and/or to cease providing or supporting any product at any time
                        </p>
                        <p>
                            The partner is encouraged to advertise and promote the sales of {{ config('app.name') }}
                            products via all appropriate media. This includes trade show exhibits, catalogs and direct
                            mailings, space advertising, educational meetings, sales aids, web advertising,
                            etc. {{ config('app.name') }} must approve all such materials that use its name or trademarks.
                        </p>
                        <h3>6. Limitation of Liability</h3>
                        <p>
                            {{ config('app.name') }} shall not, under any circumstances, including any infringement claims,
                            be liable to the partner or any other party for any re-procurement costs, lost revenue or
                            profits or for any other special, incidental or consequential damages. This includes even
                            if {{ config('app.name') }} has been informed of such potential loss or damage
                        </p>
                        <p>
                            The partner agrees to indemnify, defend, and hold harmless {{ config('app.name') }} and its
                            affiliates with respect to any liability, claim or loss, whether the partner, any customer of
                            the partner, or any third party, arising in connection with the connection to or provision of
                            information from NMVTIS or any other relevant third-party. This indemnification shall survive
                            the termination of this Agreement
                        </p>
                        <p>
                            Neither {{ config('app.name') }} or the partner shall have any liability to any party by reason
                            of any delay or failure to perform any obligation or event occasioned by any force majeure,
                            storm, fire, casualty, work stoppage, equipment failure, riot, national emergency, act of
                            government, act of public enemy, or other causes of similar or dissimilar nature beyond its or
                            their control
                        </p>
                        <h3>7. Use of {{ config('app.name') }} LLC Trademarks</h3>
                        <p>
                            The partner acknowledges that: (a) {{ config('app.name') }} owns all rights, title and interest
                            in the {{ config('app.name') }} names and logotypes. (b) The partner will acquire no interest in
                            any such trademarks or trade names by virtue of this Agreement, its activities under it, or any
                            relationship with {{ config('app.name') }}
                        </p>
                        <p>
                            The partner, who may indicate to the public that it is an “Authorized Partner” during the term
                            of this Agreement, may also use {{ config('app.name') }}’s trademarks and tradenames to promote
                            and solicit sales or licensing of {{ config('app.name') }} products if done so in strict
                            accordance with {{ config('app.name') }}’s approval
                        </p>
                        <p>
                            Once this Agreement is terminated, the partner shall immediately discontinue any use of the
                            product and {{ config('app.name') }} names or trademarks
                        </p>
                        <h3>8. Proprietary Information</h3>
                        <p>
                            {{ config('app.name') }} and the partner shall each exercise due diligence to maintain in
                            confidence and not disclose to any third-party any proprietary information furnished by the
                            other to it on a confidential basis and identified as such when furnished. As used in this
                            paragraph, “due diligence” means the same precaution and standard of care which that party uses
                            to safeguard its own proprietary data, but in no event less than reasonable care. The provisions
                            of this Section shall survive for five years beyond the termination of this Agreement. Except in
                            accordance with this Agreement, neither party shall use such information without permission of
                            the party that furnished it
                        </p>
                        <p>
                            This Agreement does not grant any license under any patents or other intellectual property
                            rights that {{ config('app.name') }} owns, controls, or holds licenses to
                        </p>
                        <h3>9. Compliance with Laws</h3>
                        <p>
                            he partner will indemnify, defend and hold {{ config('app.name') }} blameless for all
                            liability or damages that the partner’s failure to comply with the terms of this provision
                            causes. Additionally, the partner asserts that it will comply with all laws and regulations that
                            are applicable to the business that the partner transacts.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h2>REFUND TERMS AND CONDITIONS</h2>
                        <p>
                            If you are not 100% satisfied with your purchase from us, you can submit a request to obtain a
                            full or partial refund of your vehicle history report within 7 days after your purchase. If the
                            refund request is not received within this timeframe then you will not be eligible for a refund.
                            Please note, the reliance on any vehicle history report when purchasing a vehicle is at your own
                            risk. We cannot be held liable for any purchases you make in reliance on our reports.
                        </p>
                        <p>
                            Valid refund reasons
                        </p>
                        <p>
                            You received an empty report
                        </p>
                        <p>
                            You can't open your report or receive an error message
                        </p>
                        <p>
                            You were charged twice for the same report
                        </p>
                        <p>
                            Invalid refund reasons
                        </p>
                        <p>
                            Inaccuracies in a report
                        </p>
                        <p>
                            Incomplete report
                        </p>
                        <p>
                            Untimely report
                        </p>
                        <p>
                            To submit a refund request please fill out the form below or email the following information
                            to
                        </p>
                        <p>
                            Email Subject: Refund request
                        </p>
                        <p>
                            Your email
                        </p>
                        <p>
                            Vehicle VIN number
                        </p>
                        <p>
                            Reason for the refund
                        </p>
                        <p>
                            Your Name
                        </p>
                        <p>
                            Your Last Name
                        </p>
                        <p>
                            Date of purchase
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection