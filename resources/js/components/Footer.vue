<template>
    <div>
        <footer>
            <div class="footer bg_dark_blue padding_top_60 padding_bottom_60 pt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 white_opacity_color text-center">
                            <p class="margin_top_10">
                                
                                &copy; bDoctors. All rights reserved.<br />
                            </p>

                        </div>
                        <div class="col-xs-12 col-md-6 text-center ">
                            <h3 class="white_color">Contatti</h3>
                            <ul class="vertical_menu">
                                <li>
                                    <a target="_blank" href="#"
                                        class="grey_white_link text-decoration-none">Nigel</a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"
                                        class="grey_white_link text-decoration-none">Filippo</a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"
                                        class="grey_white_link text-decoration-none">Bryan</a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"
                                        class="grey_white_link text-decoration-none">Fabrizio</a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"
                                        class="grey_white_link text-decoration-none">Davide</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- /footer -->
</template>

<script>
export default {
    name: "Footer"
};
</script>

<style lang="scss" scoped>
footer {
    background-image: linear-gradient(to right, #3575fc, #39c3fc);
    justify-content: space-between;
}

ul.vertical_menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

ul.vertical_menu li {
    margin-bottom: 10px;
}

ul.social-icon {
    color: #fff;
    list-style-type: none;
    margin: 0;
    padding: 0;

    &:hover {
        color: #ff6600;
    }
}

ul.social-icon li {
    display: inline-block;
    margin-right: 10px;
    font-size: 1.5em;
}

a {
    color: #fff;

    &:hover {
        color: #ff6600;
    }
}

h3,
p {
    color: #fff;
    text-align: center;
}

img {
    width: 70px;
}
</style>