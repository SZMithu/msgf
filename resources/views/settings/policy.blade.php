<?php
$dynamic=\App\Models\FormSetting::where('setting','General')->first();

?>

@include('layout.master')
@include('layout.header')

<div class="col-md-10">
{!!$dynamic->policy !!}
                      </div>
   