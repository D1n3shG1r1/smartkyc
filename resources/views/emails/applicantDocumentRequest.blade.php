<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requesting Documents for Verification Process</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-spacing: 0;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Email container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Header section */
        .email-header {
            background-color: #004c97;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }

        .email-header img {
            width: 120px; /* Adjust this size based on your logo */
            margin-bottom: 10px;
        }

        .email-header h1 {
            font-size: 24px;
            margin: 0;
        }

        /* Body content */
        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }

        .email-body p {
            margin: 0 0 15px 0;
        }

        .email-body a {
            color: #004c97;
            text-decoration: none;
        }

        /* Special Note */
        .special-note {
            background-color: #fffbf1;
            padding: 15px;
            border: 1px solid #ffdb99;
            margin-top: 20px;
            border-radius: 5px;
        }

        .special-note h3 {
            margin-top: 0;
            color: #f39c12;
        }

        /* Footer section */
        .email-footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }

        /* Button */
        .btn {
            background-color: #004c97;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }

            .email-header h1 {
                font-size: 20px;
            }

            .email-body {
                padding: 15px;
            }

            .btn {
                padding: 12px 25px;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" class="email-container">
        <tr>
            <td class="email-header">
                <!-- Replace 'logo-url.png' with the actual logo URL -->
                <img style="margin:auto;" src="{{ url('assets/img/walls-logo-web2.png') }}" alt="SmartKYC Logo">
                <!--<h1 style="text-align:center;">SmartKYC</h1>-->
                <p style="text-align:center;">Requesting Documents for Verification Process</p>
            </td>
        </tr>
        <tr>
            <td class="email-body">
                <p>Dear {{ ucwords($customerName) }},</p>
                
                <!-- Check if it's a New Application or Existing Application -->
                @if($newApplication > 0)  
                    <!-- New application -->
                    <p>
                        <!--<strong>New Application (Application Ref No: {{ $applicationRef }}):</strong>  We are excited to begin the verification process for your new application. To proceed, we kindly request the following documents: -->
                        
                        <strong>(Application Ref No: {{ $applicationRef }}):</strong>We are reviewing your application and require the following documents for verification:
                    </p>
                    <ul>
                        @php foreach($documentType as $docTyp){ @endphp
                        <li>{{$docTyp}}</li>
                        @php } @endphp
                    </ul>
                    <p>Please upload the requested documents at your earliest convenience to avoid any delays in your verification process.</p>

                @else 
                    <!-- Existing application -->
                    <p><strong>Existing Application (Application Ref No: {{ $applicationRef }}):</strong> We are reviewing your existing application and require the following additional documents for verification:</p>
                    <ul>
                        @php foreach($documentType as $docTyp){ @endphp
                        <li>{{$docTyp}}</li>
                        @php } @endphp
                    </ul>
                    <p>These documents are needed to complete the verification process and update your application. Please upload the requested documents as soon as possible.</p>

                @endif

                <!-- Special Note Section -->
                <div class="special-note" style="display: {{ $additionalMessage ? 'block' : 'none' }}">
                    <h3>Special Note:</h3>
                    <p>{{ $additionalMessage }}</p>
                </div>
                
                <p><strong>Important:</strong> Please submit your required documents before {{$lastDate}}.</p>

                <p>You can upload the documents using the link below:
                    <a href="{{$uploadLink}}">{{$uploadLink}}</a>
                </p>
                <p>If you have any questions or need assistance, feel free to contact us at <a href="mailto:support@smartkyc.ng">support@smartkyc.ng</a>.</p>
                <p>Thank you for choosing SmartKYC!</p>
                
                <!--<a href="[Upload_Link]" class="btn">Upload Documents</a>-->
            </td>
        </tr>
        <tr>
            <td class="email-footer">
                <p style="text-align:center;">&copy; {{date('Y')}} SmartKYC. All Rights Reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
