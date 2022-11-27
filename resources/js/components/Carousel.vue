<template>
    <div class="home">

       
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="sign-in">
                <h5>
                    Sei un dottore?
                </h5>
                <a href="/register"><button class="btn btn-primary">REGISTRATI</button></a>
                <a href="/login"><button class="btn btn-primary">LOGIN</button></a>
            </div>
            <div class="carousel-inner custom-item">
                <div class="carousel-item active">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/001/624/696/original/dna-background-free-video.jpg"
                        class="d-block w-100 image-fluid" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://www.mec2pc.it/wp-content/uploads/2017/06/banner22-2.jpg" class="d-block w-100"
                        alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://wallpapercave.com/wp/wp2217871.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://saocamilo-sp.br/assets/uploads/topo-medicina-diagnostica-01.jpg"
                        class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://images3.alphacoders.com/203/thumb-1920-203679.jpg" class="d-block w-100"
                        alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://wallpaperaccess.com/full/1267758.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://pennystocks.news/wp-content/uploads/2020/07/geo.jpg" class="d-block w-100"
                        alt="..." />
                </div>
            </div>
        </div>
    </div>


    <!-- fine carousel -->


</template>

<script>

export default {
    name: "Carousel",


};
</script>

<style lang="scss" scoped>
.home {
    margin-bottom: 50px;
    min-height: calc(100vh - 25.1rem);
}

.input-form {
    width: 50%;
    margin-right: 20px;
}

::placeholder {
    font-style: italic;
}

.carousel {
    height: 80vh;
    width: 100%;
    margin-bottom: 50px;
    position: relative;
}

.sign-in {
    position: absolute;
    z-index: 999;
    top: 50%;
    left: 25%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.7);
    padding: 25px;
    border-radius: 20px;
    box-shadow: 3px 7px 5px #888888;

    h5 {
        text-align: center;
        color: #3575fc;
        margin-bottom: 20px;
    }
}

.custom-item {
    width: 100%;

    img {
        height: 80vh;
    }
}

a {
    text-decoration: none;
}

button {
    border: none;
    background-image: linear-gradient(135deg, #3575fc 45%, #39c3fc);

    &:hover {
        background: linear-gradient(135deg, #39c3fc 45%, #3575fc);
        transition: 0.3s;
        box-shadow: 3px 7px 5px #888888;
    }
}
</style>