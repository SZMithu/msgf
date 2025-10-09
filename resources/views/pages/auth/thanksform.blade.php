<html>
  <head>
  <title>Congrats - Main Street Finance Group LLC</title>
    <!-- Google Tag Manager -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WVPCLSL3');</script>
<!-- End Google Tag Manager -->  
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  
    <style>
      body {
        text-align: center;
        
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
    </style>
    <body>  
@include('layout.header')    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVPCLSL3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	
	<!-- <h1 class="text-header fw-bolder mb-3">Qualification Form Complete </h1> -->
	<h1 class="text-header fw-bolder mb-3">{!!$form->congrats_title!!} </h1>

      <div class="card custom_card">

      
        <h3>Congratulations!</h3> 
        <h4>You're Pre-Approved! </h4> 
        <div class="text-start d-flex flex-column stepsToSubmit"> <div class="pb-2 d-flex align-items-center"> <div class="w-15"> <div class="numberStep p-2 btn btn-primary text-center me-2">1</div></div><div class="w-85"><div>Click the "Continue" button below</div></div></div><div class="pb-2 d-flex align-items-center"><div class="w-15"> <div class="numberStep p-2 btn btn-primary text-center me-2">2</div></div><div class="w-85"> <iv>Fill out the one page form and attach most recent 4 months of business banks statements </iv></div></div><div class="pb-2 d-flex align-items-center"><div class="w-15"> <div class="numberStep p-2 btn btn-primary text-center me-2">3</div></div><div class="w-85"> <div>Within 24 hours our underwriting team will review the deal and reach out to discuss options </div></div></div></div>
<h4>Apply and continue with your application</h4><br>
<a class="btn btn-primary mb-2" type="button" href="{{URL::to('/applynow?id=').collect(explode('/', Request::path()))->last()}}" target="">Continue</a>
      </div>
    </body>
</html>

<script>
setInterval(function() { 
    window.location.href = "{{URL::to('/applynow?id=').collect(explode('/', Request::path()))->last()}}";
}, 4000); 



</script>

@include('layout.footer')
