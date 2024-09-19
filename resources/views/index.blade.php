<!DOCTYPE html>
<html>
    <head>
        @include('header')
    </head>
    <body>
        <div class="container">
            <div id="success-message" class="p-3 mb-2"></div>
            <div id="error-message" class="p-3 mb-2"></div>
            <div class="card bg-light mt-5">
                <div class="card-header">
                    <strong>Trafic Signal</strong>
                </div>
                <div class="card-body">
                    <form id="traffic-form">
                        <input type="hidden" name="action" id="action_name" value="{{ route('store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light-name" id="label-a"><b>A</b></span>
                                </center>
                            </div>
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light-name" id="label-b"><b>B</b></span>
                                </center>
                            </div>
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light-name" id="label-c"><b>C</b></span>
                                </center>
                            </div>
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light-name" id="label-d"><b>D</b></span>
                                </center>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light red" id="traffic_light_a"><span class="countdown" id="traffic_count_a"></span></span>
                                </center>
                            </div>
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light red" id="traffic_light_b"><span class="countdown" id="traffic_count_b"></span></span>
                                    
                                </center>
                            </div>
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light red" id="traffic_light_c"><span class="countdown" id="traffic_count_c"></span></span>
                                </center>
                            </div>
                            <div class="col-sm-3">
                                <center>
                                    <span class="traffic-light red" id="traffic_light_d"><span class="countdown" id="traffic_count_d"></span></span>
                                </center>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input type="number" class="form-control traffic-sequence" id="sequence_a" 
                                    name="sequence_a" placeholder="Sequence A" 
                                    value="{{isset($signals->sequence_a) && !empty($signals->sequence_a) ? $signals->sequence_a : ''}}" data-id="a">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control traffic-sequence" 
                                    id="sequence_b" name="sequence_b" placeholder="Sequence B" 
                                    value="{{isset($signals->sequence_b) && !empty($signals->sequence_b) ? $signals->sequence_b : ''}}" data-id="b">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control traffic-sequence" 
                                    id="sequence_c" name="sequence_c" placeholder="Sequence C" 
                                    value="{{isset($signals->sequence_c) && !empty($signals->sequence_c) ? $signals->sequence_c : ''}}" data-id="c">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control traffic-sequence" 
                                    id="sequence_d" name="sequence_d" placeholder="Sequence D" 
                                    value="{{isset($signals->sequence_d) && !empty($signals->sequence_d) ? $signals->sequence_d : ''}}" data-id="d">
                            </div>
                        </div>
                        <div class="setting-div">
                            <div class="form-group row">
                                <label for="green_light_intervals" class="col-sm-2 col-form-label">Green Light Intervals <span class="error">*</span></label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="green_light_intervals" name="green_light_intervals" value="{{isset($signals->green_light_intervals) && !empty($signals->green_light_intervals) ? $signals->green_light_intervals : ''}}">
                                </div>
                            </div>
                            <div class="form-group row yellow-int-div">
                                <label for="yellow_light_intervals" class="col-sm-2 col-form-label">Yellow Light Intervals <span class="error">*</span></label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="yellow_light_intervals" name="yellow_light_intervals" value="{{isset($signals->yellow_light_intervals) && !empty($signals->yellow_light_intervals) ? $signals->yellow_light_intervals : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="button-group">
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary col-sm-1" id="start-btn">Start</button>
                                <button type="button" disabled class="btn btn-danger col-sm-1" id="stop-btn">Stop</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="{{asset('js/traffic.js')}}"></script>