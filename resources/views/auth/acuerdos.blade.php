@extends('Web.Layout')

@section('Main')
    <div class="bg-white shadow-sm mt-3 p-5 rounded">
        <div class="py-4">
            <h1 class="text-title text-center">Terms and Conditions of Service</h1>
        </div>

        <h2 class="text-subtitle">1. General</h2>
        <p>
            Duolingo websites (“Websites”) and mobile applications, including the Tinycards application (“Apps”) and related services (together with the Websites, the “Service”) are operated by Duolingo, Inc. (“Duolingo,” “us,” or “we”). Access and use of the Service is subject to the following Terms and Conditions of Service (“Terms and Conditions”). By accessing or using any part of the Service, you represent that you have read, understood, and agree to be bound by these Terms and Conditions including any future modifications. Duolingo may amend, update or change these Terms and Conditions. If we do this, we will post a notice that we have made changes to these Terms and Conditions on the Websites for at least 7 days after the changes are posted and will indicate at the bottom of the Terms and Conditions the date these terms were last revised. Any revisions to these Terms and Conditions will become effective the earlier of (i) the end of such 7-day period or (ii) the first time you access or use the Service after such changes. If you do not agree to abide by these Terms and Conditions, you are not authorized to use, access or participate in the Service.
            <br>
            <br>
            PLEASE NOTE THAT THESE TERMS AND CONDITIONS CONTAIN A MANDATORY ARBITRATION OF DISPUTES PROVISION THAT REQUIRES THE USE OF ARBITRATION ON AN INDIVIDUAL BASIS TO RESOLVE DISPUTES IN CERTAIN CIRCUMSTANCES, RATHER THAN JURY TRIALS OR CLASS ACTION LAWSUITS. VIEW THESE TERMS HERE.
        </p>

        <br>
        <br>

        <h2 class="text-subtitle">2. Description of Website and Service</h2>
        <p>
            The Service allows users to access and use a variety of educational services, including learning or practicing a language, and creating and viewing flashcards on the Tinycards App. Duolingo may, in its sole discretion and at any time, update, change, suspend, make improvements to or discontinue any aspect of the Service, temporarily or permanently.
        </p>
    </div>
@endsection


@section('css')
    <style>
        .bg-blue{
            background:  #105EAB !important;
            background-color: #105EAB !important;
            color: #fff !important;
        }
        .text-title{
            font-size: 32px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
        .text-subtitle{
            font-size: 28px;
            line-height: 1.125;
            font-weight: 600;
            letter-spacing: .004em;
            font-family: "SF Pro Display","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
        }
    </style>
@endsection
