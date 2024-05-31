<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\aboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>About Us</title>
</head>
<body>
    <div class="about-container" id="about">
        <div class="service-wrapper">
            <h1><span></span>About Us</h1>
            <div class="service">
                <div class="cards">
                <div class="card">
                        <div class="hover-content">
                            <i class="fa-solid fa-car"></i>
                            <h2>EMBER TRANSPORT SERVICES</h2>
                            <p class="hidden">Ember Transport Services stands as a testament to entrepreneurial vision, emerging in 2016 under the guidance of its founder, Mr. Moises Simyunn. Since its inception, the company has carved a niche for itself within the National Capital Region, providing comprehensive transportation solutions. Serving a broad spectrum of clientele, Ember Transport Services caters to the diverse needs of businesses and individuals alike, ensuring seamless mobility for all purposes.</p>
                        </div>
                    </div>
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-layer-group"></i>
                        <h2>MISSION</h2>
                        <p class="hidden">Our mission is to become synonymous with excellence in transportation operations within the bustling metropolis. We endeavor to achieve this by consistently delivering timely and efficient services alongside clear and informative communication channels. Our commitment extends to ensuring convenience for all, offering accessible transportation solutions tailored to meet the diverse needs of our customers.</p>
                    </div>
                    <div class="card" onclick="toggleParagraph(this)">
                        <i class="fa-solid fa-eye"></i>
                        <h2>VISION</h2>
                        <p class="hidden">Our vision is to create an unparalleled transportation network that stands as a beacon of safety, reliability, efficiency, environmental responsibility, and customer satisfaction. We aspire to establish a transport system that not only meets but exceeds the expectations of our customers, drivers, and operators alike. Through a relentless commitment to excellence, we aim to cultivate an environment where safety is paramount, reliability is assured, and efficiency is optimized.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleParagraph(card) {
            var paragraph = card.querySelector('p');
            paragraph.classList.toggle('hidden');
        }
    </script>
</body>
</html>
