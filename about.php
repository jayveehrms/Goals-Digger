<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT US</title>
    <link rel="stylesheet" href="css/aboutus.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include("UI\header.php"); ?>
    <div class="container">
        <div class="service-wrapper">
            <div class="service">
                <h1>ABOUT US</h1>
                <div class="cards">
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-car"></i>
                        <h2>EMBER TRANSPORT SERVICES</h2>
                        <p class="hidden">Ember Transport Services stands as a testament to entrepreneurial vision, emerging in 2016 under the guidance of its founder, Mr. Moises Simyunn. Since its inception, the company has carved a niche for itself within the National Capital Region, providing comprehensive transportation solutions. Serving a broad spectrum of clientele, Ember Transport Services caters to the diverse needs of businesses and individuals alike, ensuring seamless mobility for all purposes.
<br><br>
Over the span of more than six years, Ember Transport Services has steadfastly pursued a singular goal: to surpass customer expectations at every turn. With an unwavering commitment to excellence, the company continually strives to deliver unparalleled service characterized by both affordability and quality. This dedication to customer satisfaction permeates every aspect of its operations, driving Ember Transport Services to constantly innovate and refine its offerings.
<br><br>
Through a combination of cutting-edge technology, well-maintained vehicles, and a highly-trained team of professionals, Ember Transport Services has established itself as a trusted partner in transportation solutions. Whether it's facilitating business logistics or catering to personal travel needs, the company remains dedicated to providing reliable and efficient service that exceeds expectations.
<br><br>
As Ember Transport Services looks towards the future, its commitment to excellence remains unwavering. With a firm focus on customer satisfaction and a track record of reliability, the company continues to set the standard for transportation services within the National Capital Region and beyond.</p>
                    </div>
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-layer-group"></i>
                        <h2>MISSION</h2>
                        <p class="hidden">Our mission is to become synonymous with excellence in transportation operations within the bustling metropolis. We endeavor to achieve this by consistently delivering timely and efficient services alongside clear and informative communication channels. Our commitment extends to ensuring convenience for all, offering accessible transportation solutions tailored to meet the diverse needs of our customers. We prioritize reliability and courtesy in our shuttle services, striving to exceed expectations at every opportunity. Additionally, we aim to provide high-quality vehicle leasing options that are not only cost-effective but also reflect our dedication to meeting the highest standards of performance and comfort. Through these efforts, we seek to establish ourselves as the premier choice for transportation services in the metropolis, trusted for our unwavering commitment to excellence and customer satisfaction.</p> 
                    </div>
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-eye"></i>
                        <h2>VISION</h2>
                        <p class="hidden">Our vision is to create an unparalleled transportation network that stands as a beacon of safety, reliability, efficiency, environmental responsibility, and customer satisfaction. We aspire to establish a transport system that not only meets but exceeds the expectations of our customers, drivers, and operators alike. Through a relentless commitment to excellence, we aim to cultivate an environment where safety is paramount, reliability is assured, and efficiency is optimized. Moreover, we endeavor to integrate environmentally friendly practices into every aspect of our operations, minimizing our ecological footprint while maximizing our positive impact on the planet. Ultimately, our goal is to craft a transport system that not only meets the practical needs of our stakeholders but also enhances their overall satisfaction and well-being, setting a new standard of excellence in the industry.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("UI/footer.php"); ?>
</body>
<script>
    function toggleParagraph(card) {
    var paragraph = card.querySelector('p');
    paragraph.classList.toggle('hidden');
}
</script>
</html>
