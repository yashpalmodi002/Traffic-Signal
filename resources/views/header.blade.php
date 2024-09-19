<title>Traffic Signal</title>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    .error {
        color:red;
    }
    .traffic-light {
        height: 32px;
        width: 32px;
        border-radius: 50%;
        display: inline-block;
    }
    .red {
        background-color: red;
    }
    .yellow {
        background-color: yellow;
    }
    .green {
        background-color: green;
    }
    .setting-div {
        margin-top: 35px;
    }
    .yellow-int-div{
        margin-top: 10px;
    }
    .button-group {
        margin-top: 50px;
        margin-left: 200px;
    }
    #stop-btn {
        margin-left: 30px;
    }
    .countdown {
        color: white;
        font-weight: bold;
    }
    #success-message, #error-message {
        display: none;
    }
</style>