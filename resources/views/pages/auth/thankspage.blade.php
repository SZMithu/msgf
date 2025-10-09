@include('layout.master')

  
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
   /*      h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        } */
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
 .card {
    background: white;
    padding: 27px;
    border-radius: 16px;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
}
      @keyframes loadIn {
    0%{
        opacity: 0;
        transform: translateX(-10deg);
    }
    100%{
        opacity: 1;
        transform: translateX(0deg);
    }
    
}

.bg-success{
    background-color: rgb(111, 255, 111);
    color: white;
}
.numberStep {
    border-radius: 50%;
    width: 38px;
    height: 38px;
}
.stepsToSubmit{
    font-size: 15px;
}
.w-15{
    width: 8%;
}
.w-85{
    width: 90%;
}
.disclaimer{
    font-size: 12px;
}

@media (max-width: 767px) {
    h3{
        font-size: 19px;
    }
    .textResponseContainer{
        max-width: 500px;
        min-height: 100%;
    }
    .trustpilot-widget{
        display: none;
    }
	
.custom_card{
	width: 94%;
}

}
.text-header {
    color: #071437 !important;
}

.fw-bolder {
    font-weight: 700 !important;
}

.btn-primary {
    background: #22b04d !important;
	border: none;
    font-size: 17px;
    font-weight: 700;
    background: #8180e0;
    color: #fff;
    height: 55px;
    text-align: center;
    padding: 20px 46.1px;
    display: inline-block;
    line-height: .8;
    letter-spacing: 0;
    position: relative;
    border-radius: 3px;
    z-index: 1;
    cursor: pointer;
    outline: none;
    transition: all 0.4s ease-out;
    -moz-transition: all 0.4s ease-out;
    -webkit-transition: all 0.4s ease-out;
    -ms-transition: all 0.4s ease-out;
    -o-transition: all 0.4s ease-out;
}
.numberStep.p-2.btn.btn-primary.text-center.me-2 {
    color: #fff;
    background-color: #8180e0 !important;
    border-color: #8180e0 !important;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    line-height: 20px;
}
a.btn.btn-primary.mb-2:hover{
	    background-color: #8180e0 !important;

}
h3 {
    color: #22b04d;
}
.text-start.d-flex.flex-column.stepsToSubmit {
    margin-left: 4%;
}
.w-85 {
    text-align-last: center;
}


    </style>
    <body>      
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVPCLSL3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	
<h2 class="text-header fw-bolder mb-3">{!!$form->thanks_title!!} </h2>

{!!$form->thanks_text!!}
      <!-- <div class="card">

      
        <h3>Thank You!</h3> 
        <h4>Form submitted successfully</h4> 
        <div class="text-start d-flex flex-column stepsToSubmit"> 
            <div class="pb-2 d-flex align-items-center"><div class="w-85"><div>Within 24 hours our underwriting team will review the deal and reach out to discuss</div>
        </div></div></div>
<a class="btn btn-primary mb-2" type="button" href="{{URL::to('/')}}">Go To Home</a>
      </div> -->
	  
    </body>
    @include('layout.footer')
    </html>