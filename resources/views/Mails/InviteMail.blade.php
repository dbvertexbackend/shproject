<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Vifeducation</title>
    <style>
        .bold_line {
            font-weight: 700;
        }
        
        .color_red {
            color: red;
        }
        
        .image_in_div {
            height: 70px;
            padding-bottom: 10px;
            padding-top: 10px;
        }
        
        .border_outline {
            border: 2px solid black;
        }
        
        .socialiconbox {
            width: fit-content;
            font-size: 16px;
            color: rgb(17, 82, 204);
            border-bottom: 4px solid rgb(36, 108, 218);
        }
        
        .socialicon {
            height: 50px;
            width: 50px;
        }
        
        .border_blue_box {
            width: fit-content;
            margin-top: 10px;
            padding-bottom: 10px;
            border-bottom: 4px solid rgb(36, 108, 218);
        }
        
        .viflogo_png {
            height: 60px;
        }
        
        .locationicon {
            height: 40px;
        }
        
        .locatioinfo {
            padding-left: 20px;
        }
        .col-md-6-custom{
            width: 50%;
        }

       

        .row{
        
            display:flex;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12-custom">
                    <span>Dear {{$employee_name}},</span><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    I hope my mail find you well
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    <span class="bold_line">Virginia institute of Finance is inviting you to a scheduled <span class="color_red">"{{$course_name}}" {{$training_type}}</span> Course</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    Please follow below joining instructions :
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    Registration Link : <span class="color_red">{{$registration_link}}</span>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row ">
                <div class="col-md-6-custom border_outline">
                    <img src="{{ URL::asset('mailassets/clock.png')}}" class="image_in_div" alt="" srcset="">
                    <ul>
                        <li>Course Duration : <span class="color_red">{{$course_duration}}</span></li>
                        <li>Start Date : <span class="color_red">{{date('d M Y', strtotime($start_date))}}</span></li>
                        <li>End Date : <span class="color_red">{{date('d M Y', strtotime($end_date))}}</span></li>
                        <li>Timing : <span class="color_red">{{date('h:ia', strtotime($start_time)).' - '.date('h:ia', strtotime($end_time)).' (KSA Time)'}}</span></li>
                        <li>Instructor : <span class="color_red">{{$instructor_name}}</span></li>
                        <li>Language of Material : <span class="color_red">{{$language_of_material}}</span></li>
                        <li>Language of Facilitation : <span class="color_red">{{$language_of_facilitation}}</span></li>
                        <li>Type : <span class="color_red">{{$class_type}}</span></li>
                        <li>Location : <span class="color_red">{{$location}}</span></li>
                        <li>Have High-speed Internet</li>
                        <li>Your Laptop & any other smart devices</li>
                        <li>Windows Operating System & Office 2016+, No Mac Please</li>
                        <li>Require a minimum 90% of attendance</li>
                        <li>Delegate contribution in class discussion, exercise, and workshops are integral to the success of this course.</li>
                    </ul>
                </div>
                <div class="col-md-6-custom border_outline">
                    <img src="{{ URL::asset('mailassets/download.png')}}" class="image_in_div" alt="" srcset="">
                    <ul>
                        <li>Please find attachment of <span class="bold_line">Course Intro</span></li>
                        <li>Download Workshop exercise files before joining the meeting using this link : <a href="{{$workshop_link}}">{{$workshop_link}}</a></li>
                        <li>Fill the intro sheet and submit it to receive your course certificate using this link:
                            <a href="{{$infosheet_link}}">Info-sheet</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6-custom border_outline">
                    <img src="{{ URL::asset('mailassets/zoom_video.png')}}" class="image_in_div" alt="" srcset="">
                    <ul>
                        <li>Download Zoom Client for Meeting on your laptop for free using the following link:
                            <a href="https://zoom.us/download">Zoom Download</a>
                        </li>
                        <li>Sign up a basis FREE account with your email.</li>
                        <li>Watch Zoom Tutorial in the following <a href="{{$zoom_link}}">link</a>.</li>
                    </ul>
                </div>
                <div class="col-md-6-custom border_outline">
                    <img src="{{ URL::asset('mailassets/teaching.png')}}" class="image_in_div" alt="" srcset="">
                    <ul>
                        <li>Virtual Training Log in :
                            <ul>
                                <li>Using Meeting ID (<span class="color_red">0000 0000 0000</span>) and Password <span class="color_red">******</span> OR</li>
                                <li>Clicking on
                                    <a href="{{$joining_link}}">"Join Your Training Course"</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12-custom">
                    For support, please contact <a href="mailto:course@viftraining.com">course@viftraining.com</a> and our team wil assist you.
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    Best Regards,
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    <div class="socialiconbox">
                        ALAA JUBAIN <img class="socialicon" src="{{ URL::asset('mailassets/twitter.png')}}"><img class="socialicon" src="linkedin.png">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12-custom">
                    <div class="border_blue_box">
                        Operation Supervisor <br> +971 44308394 | <a href="mailto:example@viftrainig.com">example@viftrainig.com</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12-custom">
                        <div class="border_blue_box">
                            www.vifeducation.com
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12-custom">
                        <div class="border_blue_box">
                            <img class="viflogo_png" src="{{ URL::asset('mailassets/viflogo.png')}}" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12-custom">
                        <div class="border_blue_box">
                            <div class="row">
                                <div class="col-1">
                                    <img class="locationicon" src="{{ URL::asset('mailassets/location.png')}}" alt="" srcset="">
                                </div>
                                <div class="col-sm-11 locatioinfo">
                                    Goldcest Executive Tower JLT - Clustor C <br>Sulte 305 PO Box 34171 Dubai - UAE
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>