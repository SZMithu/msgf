<x-default-layout>

    @section('title')
    MCA Report Settings
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('mca.reports.settings') }}
    @endsection

    @if (Session::has('success'))
    @push('scripts')
    <script>
        Swal.fire('MCA Settings Saved Successfully', '', 'success');
    </script>
    @endpush
    @endif

    <div class="row">
        <div class="col-lg-8 col-md-12 col-xm-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <form action="{{ route('mca.reports.settings.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-1 special-shadow">
                            <div class="card-body">
                                <h6 class="fs-12 font-weight-bold mb-4"><img src="{{asset('img/openai.png')}}" alt="" width="16px" class="mr-2">{{ __('Open AI') }}</h6>
                                <div class="row">
                                    <div class="col-sm-12 input-box">
                                        <h6>{{ __('Open Ai API Key') }}</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('openai_key') is-danger @enderror" id="openai_key" name="openai_key" value="{{ config('services.openai.mca_key') }}" autocomplete="off">
                                            @error('openai_key')
                                            <p class="text-danger">{{ $errors->first('openai_key') }}</p>
                                            @enderror
                                        </div>
                                    </div> <!-- END ACCESS KEY -->
                                </div>
                            </div>
                        </div>

                        <div class="card border-1 special-shadow">
                            <div class="card-body">
                                <h6 class="fs-12 font-weight-bold mb-4"><img src="{{asset('img/email.png')}}" alt="" width="20px" class="mr-2">{{ __('Email') }}</h6>
                                <div class="row">
                                    <div class="form-group mb-4 col-sm-12 col-md-6">
                                        <label class="form-check form-switch">
                                            <input class="form-check-input" name="enable_email_fetch" type="checkbox" @if ( config('services.mca_email_fetch.enable')=='ON' ) checked @endif>
                                            <span class="form-check-label">{{ __('Allow Fetch Doc From Email') }}</span>
                                        </label>
                                    </div>
                                    <div class="input-box col-sm-12 col-md-6">
                                        <h6>{{ __('Email to fetch doc') }}</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('email') is-danger @enderror" id="email" name="email" value="{{ env('IMAP_USERNAME') }}" autocomplete="off">
                                            @error('email')
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 input-box">
                                        <h6>{{ __('Password') }}</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('password') is-danger @enderror" id="password" name="password" value="{{ env('IMAP_PASSWORD') }}" autocomplete="off">
                                            @error('password')
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 input-box mt-4">
                                        @php $email_timing= env('EMAIL_FOR_MCA_REPORT_FETCH_TIMING'); @endphp
                                        <div class="input-box ">
                                            <h6>{{__('Pick Your Time To Fetch Email Doc') }}<span class="text-danger">*</span></h6>
                                            <select class="form-select" name="email_time" id="email_time" style="font-size: 14px;">
                                                <option value="" selected>{{__('Please Select')}}</option>
                                                <option value="everyMinute" @if($email_timing=='everyMinute' ) selected @endif>{{__('Every Minute')}}</option>
                                                <option value="everyTwoMinutes" @if($email_timing=='everyTwoMinutes' ) selected @endif>{{__('Every Two Minute')}}</option>
                                                <option value="everyThreeMinutes" @if($email_timing=='everyThreeMinutes' ) selected @endif>{{__('Every Three Minute')}}</option>
                                                <option value="everyFourMinutes" @if($email_timing=='everyFourMinutes' ) selected @endif>{{__('Every Four Minute')}}</option>
                                                <option value="everyFiveMinutes" @if($email_timing=='everyFiveMinutes' ) selected @endif>{{__('Every Five Minute')}}</option>
                                                <option value="everyTenMinutes" @if($email_timing=='everyTenMinutes' ) selected @endif>{{__('Every Ten Minute')}}</option>
                                                <option value="everyFifteenMinutes" @if($email_timing=='everyFifteenMinutes' ) selected @endif>{{__('Every Fifteen Minute')}}</option>
                                                <option value="everyThirtyMinutes" @if($email_timing=='everyThirtyMinutes' ) selected @endif>{{__('Every Thirty Minute')}}</option>
                                                <option value="hourly" @if($email_timing=='hourly' ) selected @endif>{{__('Hourly')}}</option>
                                                <option value="everyOddHour" @if($email_timing=='everyOddHour' ) selected @endif>{{__('Every Odd Hourly')}}</option>
                                                <option value="everyTwoHours" @if($email_timing=='everyTwoHours' ) selected @endif>{{__('Every Two Hour')}}</option>
                                                <option value="everyThreeHours" @if($email_timing=='everyThreeHours' ) selected @endif>{{__('Every Three Hour')}}</option>
                                                <option value="everyFourHours" @if($email_timing=='everyFourHours' ) selected @endif>{{__('Every Four Hour')}}</option>
                                                <option value="everySixHours" @if($email_timing=='everySixHours' ) selected @endif>{{__('Every Six Hour')}}</option>
                                                <option value="daily" @if($email_timing=='daily' ) selected @endif>{{__('Daily')}}</option>
                                                <option value="mondays" @if($email_timing=='mondays' ) selected @endif>{{__('Every Monday')}}</option>
                                                <option value="tuesdays" @if($email_timing=='tuesdays' ) selected @endif>{{__('Every Tuesday')}}</option>
                                                <option value="wednesdays" @if($email_timing=='everyFourwednesdaysMinutes' ) selected @endif>{{__('Every Wednesday')}}</option>
                                                <option value="thursdays" @if($email_timing=='thursdays' ) selected @endif>{{__('Every Thursday')}}</option>
                                                <option value="fridays" @if($email_timing=='fridays' ) selected @endif>{{__('Every Friday')}}</option>
                                                <option value="saturdays" @if($email_timing=='saturdays' ) selected @endif>{{__('Every Saturday')}}</option>
                                                <option value="sundays" @if($email_timing=='sundays' ) selected @endif>{{__('Every Sunday')}}</option>
                                                <option value="weekly" @if($email_timing=='Weekly' ) selected @endif>{{__('Weekly')}}</option>
                                                <option value="monthly" @if($email_timing=='monthly' ) selected @endif>{{__('Monthly')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-1 special-shadow">
                            <div class="card-body">
                                <h6 class="fs-12 font-weight-bold mb-4"><img src="{{asset('img/email.png')}}" alt="" width="20px" class="mr-2">{{ __('Email to send report') }}</h6>
                                <div class="row">
                                    <div class="input-box col-sm-12 col-md-6">
                                        <h6>{{ __('Email') }}</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('email_report') is-danger @enderror" id="email_report" name="email_report" value="{{ env('EMAIL_FOR_MCA_REPORT') }}" autocomplete="off">
                                            @error('email_report')
                                            <p class="text-danger">{{ $errors->first('email_report') }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SAVE CHANGES ACTION BUTTON -->
                        <div class="border-0 text-right mb-2 mt-1">
                            <a href="{{ route('mca.reports') }}" class="btn btn-cancel mr-2">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
