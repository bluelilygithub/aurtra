<?php
require_once "facebook/facebook.php";
/*
 * "appId" and "secret" values get from your Facebook application settings
 */
$config = array (
	"appId" => "1410512249257567",
	"secret" => "fb88a267eb1ef6b00ab80050fa843ad4"
);
$isFan = 0;
$facebook = new Facebook ($config);
{
	$signed_request = $facebook->getSignedRequest ();
	if ($signed_request)
	{
		if (isset ($signed_request ["page"] ["liked"]) && $signed_request ["page"] ["liked"])
		{
			//Place your secret content here
            $isFan = 1;
		}
	}
}

$tab1="<em>What We Do</em><br/>A full service agency<br/>
Our team work with startup groups to established organisations looking for an edge";
$tab2="<em>Our Services</em><br/>We provide a range of services to meet your requirements<br/>
Services include all aspects of branding, design, web development and consulting.";
$tab3="<em>Our Gallery</em><br/>Just a sample of our work<br/>
To get a more comprehensive look at our work, visit our website.";
$tab4="<em> Contact Us</em><br/>You need to talk to us<br/>
If you've come this far, you need to take the next step and contact us.";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facebook site</title>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css">
<link rel="stylesheet" href="css/extras.css">
<link rel="stylesheet" href="css/tooltipster.css">
<link rel="stylesheet" href="css/tooltipster-light.css">

<script>
var isFan = "<? echo $isFan; ?>";
</script>
<script src="js/html5.js"></script>
<script src="js/jquery.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.color.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.transform-0.9.3.min.js"></script>
<script src="js/paralax.js"></script>
<script src="js/googleMap.js"></script>
<script src="js/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/jquery.roundabout.min.js"></script>
<script src="js/jquery.tooltipster.min.js"></script>

<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>  
<!--[if lt IE 8]> 
	  <div style=' clear: both;  height: 59px; padding:0 0 0 15px; position: relative;'> 
	  <a  href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
	  <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"  border="0" height="42" width="820" alt="You are using an outdated browser. For a  faster,   	safer browsing experience, upgrade for free today." /></a></div>  
<![endif]-->
<!--[if lt IE 9]> 
    <link rel="stylesheet" href="css/ie.css">
	<script src="js/html5.js"></script>
  <![endif]-->
  
 <script>
jQuery(function () {
    jQuery("#webdesign").click(function () {
   		$('#dialogMessage1').fadeIn('Slow');
	});
    jQuery("#branding").click(function () {
   		$('#dialogMessage2').fadeIn('Slow');
	});
    jQuery("#logos").click(function () {
   		$('#dialogMessage3').fadeIn('Slow');
	});	
    jQuery("#seo").click(function () {
   		$('#dialogMessage4').fadeIn('Slow');
	});	
    jQuery("#social").click(function () {
   		$('#dialogMessage5').fadeIn('Slow');
	});	
    jQuery("#responsive").click(function () {
   		$('#dialogMessage6').fadeIn('Slow');
	});
    jQuery("#copywriting").click(function () {
   		$('#dialogMessage7').fadeIn('Slow');
	});	
    jQuery("#businesscards").click(function () {
   		$('#dialogMessage8').fadeIn('Slow');
	});					
   jQuery("#webprogramming").click(function () {
   		$('#dialogMessage9').fadeIn('Slow');
	});	
    jQuery("#consulting").click(function () {
   		$('#dialogMessage10').fadeIn('Slow');
	});
    jQuery("#webhosting").click(function () {
   		$('#dialogMessage11').fadeIn('Slow');
	});	
    jQuery("#contracting").click(function () {
   		$('#dialogMessage12').fadeIn('Slow');
	});	
	
    jQuery("#web").click(function () {
   		$('#dialogMessage20').fadeIn('Slow');
	});
    jQuery("#graphic").click(function () {
   		$('#dialogMessage21').fadeIn('Slow');
	});	
    jQuery("#consult").click(function () {
   		$('#dialogMessage22').fadeIn('Slow');
	});			
			
	jQuery(".modal_close").click(function () {
   		$('[id^="dialogMessage"]').fadeOut('Slow');
	});
});


</script> 
</head>
<body>

<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1410512249257567', // App ID
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });
        // Additional initialization code here
        FB.Canvas.setSize({ width: 810, height: 800});
      };
      // Load the SDK Asynchronously
      (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";		
         ref.parentNode.insertBefore(js, ref);
       }(document));
    </script>
        <script>
	    $(document).ready(function() {
            $('#tooltip,#tooltip1,#tooltip2').tooltipster({
  			 animation: 'fade',
 			 theme: 'tooltipster-light',
			 position: 'top-left',
			 offsetX: '10',
			 offsetY: '-3',			 
			 delay: '0',
			 contentAsHTML: true	
			});
        });
    </script>
<div id="loadingHolder"><img id="loading" src="images/loading.gif" width="50" height="50" alt="loading" title=""/></div>
<!-- content -->
<div id="content">
<!-- header -->
    <header>  
        <div class="headermain">    
            <h1>Blue Lily Studios</h1>
            <div id="likeus">
                    <img class="imglike" src="images/imglike.png" alt="" data-href="https://www.facebook.com/bluelilystudios/app_1410512249257567">
                    <span class="liketext1">
                    Click Like to stay connected</span>
            </div>    
        </div> 
    </header>

<!-- end header -->
	<div id="pxs_container" class="pxs_container">
		<div class="pxs_bg">
			<div class="pxs_bg1"></div>
			<div class="pxs_bg2"></div>
			<div class="pxs_bg3"></div>
		</div>
		<div class="pxs_loading">Loading images...</div>
		<div class="pxs_slider_wrapper">
			<ul class="pxs_slider">
				<li>
					<img class="blank" src="images/blank.png" alt="">
					<article class="box2">
                        <span class="title1">We specialise in</span>
                        <span class="title2">awesome<br>design</span>
                        <p class="center">Our design studios provide clients with<br/> complete online marketing services.</p>
                	</article>
				</li>
				<li>
					<img src="images/blank.png" alt="">
					<article class="box1">
                        <div class="title3"><div class="star"></div><h2>What We Do</h2><div class="star"></div></div> 
                        <ul class="list1">
                			<li ><a href="#" id="web"><img src="images/img1.png" alt=""/></a><div class="description">Design<br><span>Graphic & Web</span></div></li>            
                			<li ><a href="#" id="graphic"><img src="images/img2.png" alt=""/></span></a><div class="description">Consulting<br><span>Online Strategy</span></div></li>            
                			<li class="last"><a href="#" id="consult"><img src="images/img3.png" alt=""/></a><div class="description">Technology<br><span>Web Programming</span></div></li>      
                        </ul>                       
                	</article>				
				</li>
				<li>
					<img class="blank" src="images/blank.png" alt="">
					<article class="box2">
                        <div class="title3"><div class="star"></div><h2>Our Services</h2><div class="star"></div></div> 
                        <div class="col1 m_right1">
                            <figure class="margin1"><img src="images/icon1.png" alt=""></figure>
                            <ul class="list2">
                                <li>
                                    <a href="#" id="webdesign">Website Design</a>
                                </li>
                                <li>
                                    <a href="#" id="seo">SEO</a>
                                </li>
                                <li>
                                    <a href="#" id="social">Social Media</a>
                                </li>
                                <li class="last">
                                    <a href="#" id="responsive">Responsive Designs</a>
                                </li>
                            </ul>
                        </div> 
                        <div class="col1 m_right1">
                            <figure class="margin1"><img src="images/icon2.png" alt=""></figure>
                            <ul class="list2">
                                <li>
                                 <a href="#" id="branding">Corporate Branding</a>
                                 
                                </li>
                                <li>
                                    <a href="#" id="logos">Logo Design</a>
                                </li>
                                <li>
                                    <a href="#" id="copywriting">Copy Writing</a>
                                </li>
                                <li class="last">
                                    <a href="#" id="businesscards">Business Cards</a>
                                </li>
                            </ul>
                        </div> 
                        <div class="col1">
                            <figure class="margin1"><img src="images/icon3.png" alt=""></figure>
                            <ul class="list2">
                                <li>
                                    <a href="#" id="webprogramming">Web Programming</a>
                                </li>
                                <li>
                                    <a href="#" id="consulting">Strategy Consulting</a>
                                </li>
                                <li>
                                    <a href="#" id="webhosting">Web Hosting</a>
                                </li>
                                <li class="last">
                                    <a href="#" id="contracting">Support Contracting</a>
                                </li>
                            </ul>
                        </div>
                	</article>                
                </li>
				<li>
					<img class="blank" src="images/blank.png" alt="">
					<article class="box3">
                            <div class="title3"><div class="star"></div><h2>Our Gallery</h2><div class="star"></div></div>
                            <!--roundabout gallery-->
                                <div class="roundabout-holder">
                                  <div class="round_box">
                                    <div class="inner-slider">
                                      <ul class="round">
                                        <li> 
                                           <a href="http://www.emclarity.com.au" target="_blank"><img src="images/emclarity.jpg" alt=""/></a>
                                        </li>
                                        <li> 
                                              <a href="http://www.naturebridgeweddings.com.au" target="_blank"><img src="images/nbweddings.jpg" alt=""/></a>
                                        </li>
                                        <li> 
                                             <a href="http://www.journeyoflifephotography.com.au" target="_blank"> <img src="images/journey.jpg" alt=""/></a>
                                        </li>
                                         <li> 
                                            <a href="http://www.safetywatch.com.au" target="_blank">  <img src="images/safetywatch.jpg" alt=""/></a>
                                        </li>
                                         <li> 
                                            <a href="http://www.brookwaterresort.com.au" target="_blank">  <img src="images/brookwater.jpg" alt=""/></a>
                                        </li>                                                                              
                                      </ul>
                                      <div class="under-descr"></div>
                                    </div>
                                    <a href="#" class="round_prev"></a> <a href="#" class="round_next"></a> </div>
                                    <div class="bgroundabaout"></div>
                                    </div>
                            <!--end roundabout gallery-->  
                	</article>    
                </li>
				<li>
					<img class="blank" src="images/blank.png" alt="">
					<article class="box3">
                            <div class="title3"><div class="star"></div><h2>Contact Info</h2><div class="star"></div></div>
                            <figure class="map"><div class="google_map"></div></figure>
                            <div class="address">
                                <h3>Bluelily Studios</h3>
                                <p class="contactText_1">101 Monmouth St, Morningside, Queensland.</p>
                                <p class="c1 mp_clear">
                                    <span class="phone">Telephone:</span>3901 5593<br>
                                    <span class="phone mp_clear">E-mail:</span><a class="contactText_2" href="mailto:">ask@bluelily.com.au</a>
                                </p>
                            </div>
                	</article>    
                </li>
                
			</ul>
			<div class="pxs_navigation">
				<span class="pxs_next"></span>
				<span class="pxs_prev"></span>
			</div>
			<ul class="pxs_thumbnails">
				<li class="first"><img src="images/blank.png" alt="" /></li>
				<li id="tooltip" title="<?=$tab1?>"><div><img src="images/button1.png" alt="" /></div></li>
				<li id="tooltip" title="<?=$tab2?>"><div><img src="images/button2.png" alt="" /></div></li>
				<li id="tooltip" title="<?=$tab3?>"><div><img src="images/button3.png" alt="" /></div></li>
				<li id="tooltip" title="<?=$tab4?>"><div><img src="images/button4.png" alt="" /></div></li>
			</ul>
		</div>
         <!-- footer --> 
        <footer>
            <div class="mainfooter">
                <ul id="follow-icon">
                    <li><a href="https://twitter.com/bluelilytwit" target="_blank"><img src="images/foll-icon1.png" alt=""><img src="images/foll-icon1_active.png" alt="" class="img_act"></a></li>
                    <li><a href="http://www.bluelily.com.au" target="_blank"><img src="images/foll-icon2.png" alt=""><img src="images/foll-icon2_active.png" alt="" class="img_act"></a></li>
                    <li><a href="#"><img src="images/foll-icon3.png" alt=""><img src="images/foll-icon3_active.png" alt="" class="img_act"></a></li>
           	    </ul>  
            </div>
          <!-- {%FOOTER_LINK} --> 
        </footer>
        <!-- end footer -->
	</div>
</div>
<!-- end content --> 
    <div id="dialogMessage1" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Web Design</h4><div class="star"></div></div>
<h3>Why is the design of your website important?</h3>
<p>
There is a saying that a well designed website may not win you business but there is a very strong likelihood that a poorly designed website will cost you business.<br/>
Every business aims to have a point of difference that distinguishes it from it's competitors.<br/>
As such, your website is an excellent vehicle for illustrating your company's points of difference.<br/>
By engaging a professional group such as Bluelily Studios you can have peace of mind that your website will effectively communicate to your customers the message that you are a company that they should do business with.  We take the time to talk to you about your business and help you identify the key factors that make your business stand out.  Once we have gathered all of the relevant information, our designers will get to work creating a website that meet your business requirements and is sure to help generate enquiries. <br/>
<h3>What Bluelily Studios will do for your Business?</h3>
We work with you to clearly identify what is unique about your organisation and what the key objectives of a website should be for your business.<br/>
We develop state of the art design concepts that support your business objectives.
We advise on strategies that will drive commercial traffic to your website, such as social media and search engine optimisation.<br/>
We conduct regular reviews of your website to ensure we are meeting your KPIs  (key performance indicators). </p>                   
	</div>

    <div id="dialogMessage2" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Branding</h4><div class="star"></div></div>
<P>Blue Lily Studios have developed complete branding identities for many businesses and projects.
Starting a new business can be daunting.  So much energy needs to be dedicated to defining and redefining the opportunity that it is a relief for business owners to be able to have a professional organisation help them visualise how the company will look.<br/>
Our experienced design team know the questions to ask so we can clearly understand your business and develop marketing collateral that will appeal to your customers  Whether you are a startup company with no existing marketing material, or an established company trying to reposition themselves, we can provide the solutions for you.</P>
 
<h3>Branding Approach</h3>
<p>
We get to understand your business, your customers, your competition and your expectations so we can create a suite of complimentary visible marketing elements designed to tell a complete story, including:<br/>
Logo, Business cards, Websites, Brochures & Communication style guides.
</p>
 
<h3>Branding Deliverables</h3>
<p>
At the end of process we provide our clients with the complete set of raw artwork so they aren't compelled to work exclusively with us into the future.<br/>
We have strong relationships with a number of print providers and can manage the entire print process if required. </p>                    
	</div>
    <div id="dialogMessage3" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Logo Design</h4><div class="star"></div></div>
          <p>  Your logo is one of the first pieces of marketing material your client will see and come to recognise. Before your client reads any of your marketing material they may have already formed an impression about your ability to work with them based on their perception of your logo. Ask yourself "What does your logo communicate about your brand?". </p>
<h3>Logo Design Approach</h3>
<p>Over the years we've developed logos for hundreds of companies in Brisbane.  Our customers rely on us to develop logos that support and promote their businesses.  Our customers will tell you, they love their logos.<br/>
We think it’s important to get your design input and feedback when designing your logo and so when designing logos we take a collaborative approach and encourage you to be as actively involved as you can.<br/>
As such, after consultation, we offer a variety of logo concept, each with it's own strengths.  Because of the collaborative nature of the design process, we often work with clients to merge aspects of the various options to create their logo of choice.</p>
<h3>Logo Design Deliverables</h3>
<p>At the end of your logo design process we provide the logo artwork which can be supplied in a variety of formats.</p>

               
	</div>
     <div id="dialogMessage4" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Search Engine Optimisation</h4><div class="star"></div></div>
<h3>What we do for you?</h3>
<p>
Develop a site that is specifically engineered to support Google indexing.  Make no mistake, not all websites are the same.  A poorly constructed website will discourage Google from indexing it on the first page of search results.<br/><br/>
Perform a technical and marketing audit on your current website.  We can quickly identify issues that are causing Google to bypass your website for profitable key search phrases.<br/><br/>
Design and implement keyword strategies to identify and promote the most effective keyword phrases for driving commercial traffic to your site.  We can give you a roadmap of the type of content you should have on your website to promote yourself.<br/><br/>
Manipulate site content to support Google indexing and still effectively communicate to your customer.  Whilst content is King, unless Google understands the relevancy of it, it could be lost in cyberspace.
Constantly monitoring Google's updates to ensure you site consistently ranks well on Google.  This is an ongoing process as we massage your content to comply with Google's changing nature.<br/><br/>
Monthly progress reports where you can see tangible results.  Without data you can't know if your efforts are paying off and make informed decisions.    </p>                 
	</div> 
         <div id="dialogMessage5" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Social Media</h4><div class="star"></div></div>
<h3>What can Social Media do for your business?</h3>
<p>
Share 'real-time' information about your products & services with your contacts and encourage them to share it with their contacts<br/><br/>
Control flow of 'real-time' information across the internet, so you are the one spreading positive news.<br/><br/>
Communicate with customers using whatever online medium they prefer to engage with.  Not everyone thinks, works or behaves exactly like you do, so be proactive in communicating to your  audience.<br/><br/>
Promote your company to potential employees and investors.<br/><br/>
Grow your sphere of influence and authority by participating in online discussions and other activities
Increase the authority of your website and in so doing, promote your SEO traffic potential.</p>                     
	</div> 
         <div id="dialogMessage6" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Responsive Designs</h4><div class="star"></div></div>
<h3>Does your website work on all mobile devices?</h3><p>
A quick review of the traffic to any existing website (using free tools such as Google Analytics) will confirm industry figures that roughly 25% of visits to a websites today is via a mobile device such as a smart phone or tablet.<br/><br/>
It is becoming increasingly important that your website supports 'responsive' design.<br/>
Put simply, this means that your website will change in appearance depending on the device that is being used to view your website.<br/><br/>
The content stays the same but the layout changes so that the user's experience enhanced specifically for the screen size of the device being used.<br/><br/>
Don't make your users pinch and zoom to find the content that they are searching for.<br/>
If people can't find the information they want quickly and easily, there are thousands of other websites for them to go to for the information.  </p>                  
	</div>  
    
         <div id="dialogMessage7" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Copy Writing</h4><div class="star"></div></div>
<h3>We provide professional online copy writing services.</h3>
<p>
We have helped many of our customers develop website content that effectively communicates their message to customers, whilst at the same time, is subtly structured to meet the needs of search engines.<br/>
Blue Lily Studios can help you craft your message in such a way that customers who are reading it would have no idea that content they are enjoying has also been structured to ensure the best possible Search Engine Page Ranking.<br/>
Most companies under-value the positive influence that a skillfully composed message can have on potential customers.<br/>
Many believe that they can save money by writing the content themselves.<br/>
However, the advantages to your business will far offset the initial cost, particularly when that content can be applied numerous times across various platforms.
<br/><br/>
Let us work with you to create effective content that will impress your customers and at the same time assist search engines to rank your website prominently on page one of Google for relevant search terms.</p>                
	</div> 
    
         <div id="dialogMessage8" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Business Cards</h4><div class="star"></div></div><p>
Whilst more and more business is being conducted digitally, business cards are still a very relevant means of promoting your business. The exchange of cards is still considered a vital part of the business development relationship process.  The look and feel of your business card still conveys important information about you and your company, far beyond simply stating your name, position and contact details.</p>
<h3>Business Card Design Approach</h3>
<p>
Generally we develop business cards as part of an overall branding strategy.  As such, the design may rely heaving on the company logo.<br/><br/>
However, there are times we are asked to design set of cards for a specific marketing campaign or for a spin-off group.  Our team of designers will sit with down with you to determine who exactly  is going to see the card and action would you like them to take as a result of receiving the card. <br/>
Beyond design and colour the use of QR cards or unique URLs in business card design can help you monitor and track the impact of particular activities.<br/></p>                
	</div>      
    
         <div id="dialogMessage9" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Web Programming</h4><div class="star"></div></div>
<h3>Needs analysis, Project management, Application development & delivery</h3><p>
The variety of technologies available to provide solutions across internet is vast and complex.  There are many tools available, each uniquely suited to particular tasks.<br/><br/>
Our developers have dealt with many challenges over the years and have gained a vast amount of real life industry experience and as such are capable of bringing together the various disparate tools and programming languages to make provide complete solutions.
We have a proven analysis, development, testing and documentation methodology that ensures your project is successfully developed on time and within budget.</p>                     
	</div> 
         <div id="dialogMessage10" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Consulting</h4><div class="star"></div></div>
<h3>Strategic advise and guidance to maximise your online marketing</h3><p>
During the past decade, many companies have relied on Bluelily Studios to develop online databases and applications for a variety of purposes.<br/><br/>
If you have a business process that could be handled effectively over the internet we can provide the solution.
We will come to your business, talk to you about your requirements and put together a needs analysis document that will clearly outline the requirements and the benefits of a solution .  We then detail all the components and steps involved in developing a solution and then help you identify the potential cost advantages of delivering the solution.<br/><br/>
As part of the solution, we will document, develop, deliver and train your staff to use the application effectively.<br/>
Our programmers have developed many:<br/><br/>
Business to customer applications, including shopping carts and help desks,<br/>
Business to business applications, including supply chain ordering systems and project feedback databases.<br/>
Internal systems, including Internal ordering systems, knowledge management systems and content management systems  </p>                  
	</div>  
    
         <div id="dialogMessage11" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Web Hosting</h4><div class="star"></div></div>
<h3>Cloud based, Dedicated Solutions, Email Management</h3><p>
Blue Lily Studios run a number of dedicated servers at a leading data centre in Brisbane.<br/>
Cheaper hosting providers use 'shared servers', where the physical server is shared with as many people as possible.<br/>
Using shared servers, it is quite common to experience disruption to your services as others draw on the resources of the server with potentially massive SPAMMing programs. Or even worse, one of your unknown shared customer’s poorly designed websites might be hacked and as a result infect your website and email services with Malicious Spyware or Viruses.<br/><br/>
Typically the shared server software is outdated, hosted abroad (USA, India or China) full of security holes and inflexible. Using our dedicated servers, we only work with 'our customers'.  This means we know who they are and what their website is being used for.</p>                
	</div> 
    
         <div id="dialogMessage12" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Ongoing Contracts</h4><div class="star"></div></div><p>
<h3>3rd party contract support providers</h3><p>
Your website, social media plaftorms and search engine optimisation strategies are essential aspects for promoting your business and products.<br/><br/>
Bluelily provide contract services that allow you to focus on your business confident in the knowledge that a team of professionals are looking after all aspects of your online marketing activity.<br/><br/>
We create regular content for your website, engage your customers on social media and create authorative backlinks to your website and manage your Google ranking.<br/><br/>
We can offer fee for service contracts that suit most budgets</p>                
	</div>       
          
          <div id="dialogMessage20" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Web & Graphic Design</h4><div class="star"></div></div>
<p>
<img src="images/img1.png" style="float:left; margin-right:10px"><h3>Web & Graphic Design</h3>
There is a saying that a well designed website may not win you business but there is a very strong likelihood that a poorly designed website will cost you business.<br/>
Every business aims to have a point of difference that distinguishes it from it's competitors.<br/>
As such, your website is an excellent vehicle for illustrating your company's points of difference.<br/>

<h3>Corporate Branding</h3>
<p>
Blue Lily Studios have developed complete branding identities for many businesses and projects.
Starting a new business can be daunting. 
Whether you are a startup company with no existing marketing material, or an established company trying to reposition themselves, we can provide the solutions for you. </p>                  
	</div>  
    
         <div id="dialogMessage21" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Support & Consulting</h4><div class="star"></div></div>
<p><img src="images/img2.png" style="float:right; margin-left:10px">
<h3>Consulting</h3>
During the past decade, many companies have relied on Bluelily Studios to develop online databases and applications for a variety of purposes.<br/>
If you have a business process that could be handled effectively over the internet we can provide the solution.<br/>
We will come to your business, talk to you about your requirements and put together a needs analysis document that will clearly outline the requirements and the benefits of a solution .  
</p>
<p> 
<h3>Contract support providers</h3>
Your website, social media plaftorms and search engine optimisation strategies are essential aspects for promoting your business and products.<br/>
Bluelily provide contract services that allow you to focus on your business confident in the knowledge that a team of professionals are looking after all aspects of your online marketing activity.<br/>
We create regular content for your website, engage your customers on social media and create authorative backlinks to your website and manage your Google ranking.<br/>

</p>                
	</div> 
    
         <div id="dialogMessage22" class="lean_overlay">
    	<a class="modal_close" id="modal_close" href="#"></a>
			<div style="text-align:center"><div class="star"></div><h4>Technology</h4><div class="star"></div></div><p>
<h3>3rd party contract support providers</h3><p>
<img src="images/img3.png" style="float:left; margin-right:10px">
Your website, social media plaftorms and search engine optimisation strategies are essential aspects for promoting your business and products.<br/><br/>
Bluelily provide contract services that allow you to focus on your business confident in the knowledge that a team of professionals are looking after all aspects of your online marketing activity.<br/><br/>
We create regular content for your website, engage your customers on social media and create authorative backlinks to your website and manage your Google ranking.<br/><br/>
We can offer fee for service contracts that suit most budgets</p>                
	</div>       
           
</body>
</html>