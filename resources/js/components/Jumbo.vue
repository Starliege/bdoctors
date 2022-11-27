<template>
    <div class="jumbotron-container container">
        <div class="title">
            <div class="left-jumbo ">
                <h3>
                    testo 1
                </h3>
                <p>
                    testo 2
                </p>
                <span>
                    <img class="img-fluid"
                        src="https://ciaologo.com/timthumb.php?src=upload/247/1496/0_orig_20150617110608_3ef7b796e3.png&h=250&w=400&zc=2&b=15"
                        alt="" />
                </span>
                <p>
                    testo 3
                </p>
            </div>
        </div>
        <div class="right-jumbo">
            <div class="container-img">
                <img class="img-fluid" src="https://www.idoctors.it/images/frontend/recensioni-dei-pazienti.svg"
                    alt="" />
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
    height: 500px;

    .left-jumbo {
        width: 56%;

        .title {
            width: 90%;
            margin: 0 auto;
            margin-top: 30px;

            h3 {
                margin: 40px 0;
                font-family: "Ubuntu", sans-serif;
                font-size: 40px;
                color: #333;
            }

            span {
                display: flex;
                justify-content: center;
                align-items: center;

                img {
                    width: 160px;
                }
            }
        }
    }

    .left-jumbo,
    .right-jumbo {
        float: left;
        height: 100%;
    }

    .right-jumbo {
        width: 42%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-img {
        /*        position: relative; */
        width: 100%;
        height: 80%;
        background-size: cover;

        img {
            height: 100%;
            background-size: contain;
        }
    }

    /*     .sign-in {
        position: absolute;
        background-color: rgba(6, 6, 6, 0.4);
        padding: 20px;
        border-radius: 10px;
    } */
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

@media all and (min-width: 1100px) {
    .jumbotron-container {
        height: 500px;
    }
}

@media all and (min-width: 768px) and (max-width: 1100px) {
    .jumbotron-container {
        height: 568px;
    }
}

@media all and (min-width: 400px) and (max-width: 767px) {
    .jumbotron-container .title .left-jumbo {
        width: 100%;
    }

    .jumbotron-container .right-jumbo {
        width: 100%;
    }

    .jumbotron-container {
        text-align: center;
        margin-bottom: 600px;
    }

    .doctor {
        justify-content: center;
    }
}
</style>