<?php include('nav.php');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
   exit;
}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Best Online Food Delivery Service in India | MyOnlineMeal.com</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="phone.css">
<body>
    <section id="home" >
        <h1 class="h-primary">Welcome to &lt;/<span> Take </span> A <span> Bite </span>\&gt;</h1>
        <p> </p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
        <button class="btn">Admin</button>
    </section>

    <section id="services-container">
        <h1 class="h-primary center">Our Services</h1>
        <div id="services">
            <div class="box">
                <img src="img/1.png" alt="">
                <h2 class="h-secondary center">Food Quality</h2>
                <p class="center">
                    Without offering great quality food, it is practically impossible to draw crowds to your canteen. It is the single most aspect that trumps every other aspect of customer service and canteen restaurant management. Quality control is for canteen restaurant what cheese is for pizza – it enhances the final result. This happens because quality control measures ensure high-quality food is served to the customers which can significantly increase your restaurant’s demand.
                    <br>
                    Canteen restaurant Quality Control (QC) is not just about food. It entails many other factors that contribute to the entire dining environment. All these factors combined make the customer experience at your restaurant safe, superior, and worthwhile. Ultimately it improves customer satisfaction which is the end goal for every canteen owner. To help you out, we have put together a list of ten QC procedures that are a must to follow for every canteen owner:
                </p>
            </div>
            <div class="box">
                <img src="img/2.png" alt="">
                <h2 class="h-secondary center">Diligent temperature monitoring</h2>
                <p class="center">Not keeping your raw materials at the right temperature can make it prone to bacteria growth. This is why temperature control is highly important for a canteen restaurant to maintain food consistency.Continuous temperature monitoring is necessary not just to retain food freshness but also to prevent food wastage.
                    <br>
                Automating the process of temperature checks by investing in storage devices that come with <a href="https://hospitalitytech.com/four-reasons-why-continuous-temperature-monitoring-sensors-will-transform-your-restaurant">temperature sensors</a> can save your canteen restaurant from serving guests substandard food.</p>
            </div>
           
            <div class="box">
                <img src="img/5.png" alt="">
                <h2 class="h-secondary center">Sanitize the FOH and BOH</h2>
                <p class="center">Offering a highly sanitized and clean dining environment has become a necessity in 2021. Everything from the glasses to the dinnerware to the linens – everything has to be spotless and germ-free. But cleanliness doesn’t relate to the FOH alone. Your BOH too needs to maintain high levels of hygiene to prevent any contamination.
                    <br>
                    Your staff symbolizes your restaurant’s standards. So they should be well-groomed at all points. Educate your FOH as well as BOH staff about the cleanliness standards to ensure the health and safety of your guests. Share a restaurant hygiene checklist with them detailing every single aspect so there are lesser chances of staff ignorance. 
                </p>
            </div>
        </div>
    </section>
</body>
</html>