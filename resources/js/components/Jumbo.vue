<template>
    <div class="jumbotron-container">
        <div class="title">
            <div class="left-jumbo">
                <div class="container-img">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/001/624/696/original/dna-background-free-video.jpg"
                        class="d-block w-100 image-fluid" alt="..." />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Jumbo"
};
</script>


<style lang="scss" scoped>
.jumbotron-container {
    height: 100%;
}
.container-img {
    width: 100%;
    height: 80%;
    background-size: cover;
}
img {
    height: 100%;
    background-size: contain;
}

</style>