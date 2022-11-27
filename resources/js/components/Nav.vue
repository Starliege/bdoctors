<template>
    <header>
        <div class="container ">
            <nav>
                <div class="left home">
                    <router-link :to="{ name: 'home' }"> Homepage </router-link>
                    
                    <span>bdoctors</span>
                </div>

                <div class="right">
                    <div class="dropdown hamburger menu">
                        <button class="btn btn-custom btn-secondary dropdown-toggle" type="button"
                            id="#dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          
                        </button>
                        <ul class="dropdown-menu width" aria-labelledby="dropdownMenuButton1">

                            <li>
                                <a href="/register">Registrati</a>
                            </li>
                            <li>
                                <a href="/login">Accedi</a>
                            </li>
                        </ul>
                    </div>

                    <div class="links">
                        <ul class="list-style-none list">

                            <li class="d-inline ">
                                <a href="/register">Registrati</a>
                            </li>
                            <li class="d-inline ">
                                <a href="/login">Accedi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: "Nav"
};
</script>

<style lang="scss" scoped>
header {
    display: flex;
    align-items: center;
    color: white;
    height: 60px;
    line-height: 60px;
    background-image: linear-gradient(to right, #3575fc, #39c3fc);

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: inherit;

        img {
            width: 50px;
        }

        .home {
            font-size: 2rem;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        .btn-custom {
            border: none;
            background: none;

            &:focus {
                border: 1px solid #fff;
            }
        }

        i {
            font-size: 20px;
        }

        img {
            width: 50px;
            padding: 0 5px;
            border-right: 1px solid rgb(255, 255, 255);
        }

        .home {
            font-size: 2rem;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        .btn-custom {
            border: none;
            background: none;

            &:focus {
                border: 1px solid #fff;
            }
        }

        i {
            font-size: 20px;
        }

        .right {
            display: flex;
            align-items: center;

            .list {
                margin-bottom: 0;
                font-size: 22px;

                a {
                    color: white;

                    &:hover {
                        color: #ff6600;
                    }
                }

                li::after {
                    display: block;
                    position: absolute;
                    content: "";
                    top: 50px;
                    left: 0;
                    height: 1px;
                    width: 0%;
                    background-color: white;
                    -webkit-transition: width 0.3s;
                }

                li {
                    font-size: 15px;
                    position: relative;
                    height: 100%;
                    padding: 25px;

                    &:hover {
                        &::after {
                            width: 100%;
                            transition: ease-in-out 0.3s;
                        }
                    }

                }
            }
        }
    }

    .link-hamburger {
        display: block;
    }

    .hamburger {
        display: none;
    }

    .dropdown-menu {
        background-image: linear-gradient(to right, #1e6650, #63987a);
        transform: translate(0px, 54px);
        border: 2px solid black;

        li {
            text-align: center;
            cursor: pointer;

            &:first-child {
                border-bottom: 1px solid black;
            }
        }
    }

    .dropdown-item-custom:hover {
        background-color: none;
    }

    @media all and (max-width: 776px) {
        .hamburger {
            display: block;
        }

        .links {
            display: none;
        }
    }
}
</style>